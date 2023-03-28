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
    $total = $obj['total'];
    $name = $obj['name'];
    $email = $obj['email'];
    $address = $obj['address'];
    $phone = $obj['phone'];
    $todate = date('Y-m-d h:i:s');
    $sql = "UPDATE bill SET cart_status=1, total='$total', name_order='$name', email_order='$email', address_order='$address', phone_order='$phone', date_order='$todate' WHERE id = '$id'";
    $result = $mysqli->query($sql);
    echo "CHECKOUT";
}

catch(Exception $e){
	echo 'LOI';
}



?>