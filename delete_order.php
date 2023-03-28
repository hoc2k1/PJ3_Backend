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
    $sql1 = "DELETE FROM bill_detail WHERE id_bill = '$id'";
    $result1 = $mysqli->query($sql1);
    $sql2 = "DELETE FROM bill WHERE id = '$id'";
    $result2 = $mysqli->query($sql2);

    echo "XOA THANH CONG";
}

catch(Exception $e){
	echo 'LOI';
}



?>