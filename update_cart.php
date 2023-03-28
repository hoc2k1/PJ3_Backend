<?php
//thay đổi thông tin user
use \Firebase\JWT\JWT;
require __DIR__ . '/vendor/autoload.php';
include('function.php');
include('connect/connect.php');

$key = "example_key";
$json = file_get_contents('php://input');
$obj = json_decode($json, true);
try{
    $id = $obj['id'];
	$qty = $obj['qty'];
    $price = $obj['price'];
    if($qty == 0){
        $sql = "DELETE FROM bill_detail WHERE id = '$id'";
        $result = $mysqli->query($sql);
        echo "XOA THANH CONG";
    } else {
        $sql = "UPDATE bill_detail SET quantity='$qty', price='$price' WHERE id = '$id'";
        $result = $mysqli->query($sql);
        echo "CAP NHAT THANH CONG";
    }
}

catch(Exception $e){
	echo 'LOI';
}



?>