<?php
//search
use \Firebase\JWT\JWT;
	require __DIR__ . '/vendor/autoload.php';
	include('function.php');
	include('connect/connect.php');
	$json = file_get_contents('php://input');

	// if(isset($_GET['key']) && strlen($_GET['key'])>z2){
	// 	$keyword = $_GET['key'];
	// 	$product = array();
	// 	$products = $mysqli->query("SELECT p.*, GROUP_CONCAT(i.link) AS images FROM product p INNER JOIN images i ON p.id = i.id_product where name like '%$keyword%' group by p.id");
	// 	while ($row = $products->fetch_object()){
	// 		$assignees = explode(',', $row->images);
	// 		$row->images = $assignees;
	// 	    $product[] = $row;
	// 	}
	// 	echo (json_encode($product));

	// }
	// else{
	// 	echo 'NHAP_TU_KHOA';
	// }

	$obj = json_decode($json, true);

	try{
		$keyword =$obj['keyword'];
		$products = $mysqli->query("SELECT p.*, GROUP_CONCAT(i.link) AS images FROM product p INNER JOIN images i ON p.id = i.id_product where name like '%$keyword%' group by p.id");
		while ($row = $products->fetch_object()){
			$assignees = explode(',', $row->images);
			$row->images = $assignees;
			$product[] = $row;
		}
		echo (json_encode($product));
	}
	catch(Exception $e){
		echo 'NHAP_TU_KHOA';
	}
?>
	