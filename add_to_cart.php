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
    $id_bill = $obj['id_bill'];
    $id_product = $obj['id_product'];
    $price = $obj['price'];
    $color = $obj['color'];
    $size = $obj['size'];

    $sql = "INSERT INTO bill_detail(id_bill, id_product, quantity, price, color, size) VALUES ($id_bill, $id_product, 1, $price, '$color', $size)";
    // echo $sql;
    $mysqli->query($sql);
    echo 'THEM_THANH_CONG';
}
catch(Exception $e){
	echo 'THEM_THAT_BAI';
}
?>