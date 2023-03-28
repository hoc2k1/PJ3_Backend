<?php
//cart
use \Firebase\JWT\JWT;
require __DIR__ . '/vendor/autoload.php';
include('function.php');
include('connect/connect.php');
	$json = file_get_contents('php://input');
	$obj = json_decode($json, true);
	$key = "example_key";

try{

		$id_product = $obj['id_product'];        
        $sql = "SELECT p.*, GROUP_CONCAT(Distinct i.link) AS images, GROUP_CONCAT(Distinct c.color) AS colors, GROUP_CONCAT(Distinct s.size) AS sizes FROM ((images i inner join product p ON i.id_product = p.id) inner join colors c on c.id_product = p.id) inner join size s on s.id_product = p.id where p.id='$id_product' group by p.id";
		$result = $mysqli->query($sql);
        while ($row = $result->fetch_object()){
            $assignees1 = explode(',', $row->images);
            $assignees2 = explode(',', $row->colors);
            $assignees3 = explode(',', $row->sizes);
            $row->images = $assignees1;
            $row->colors = $assignees2;
            $row->sizes = $assignees3;
            $product = $row;
        }
        // $items = mysqli_fetch_assoc($result);
		echo (json_encode($product));
}
catch(Exception $e){
	echo 'TOKEN_KHONG_HOP_LE';
}
?>