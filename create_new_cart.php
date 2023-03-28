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
    $email = $obj['email'];
    $sql = "SELECT * FROM users where email = '$email'";
    $result = $mysqli->query($sql);
    $user = mysqli_fetch_assoc($result);
    $id_user = $user['id'];

    $tongtien = 0;
    $sql = "INSERT INTO bill(id_customer, total) VALUES ($id_user, $tongtien)";
    $mysqli->query($sql);
    echo 'THEM_THANH_CONG';
}
catch(Exception $e){
	echo 'THEM_THAT_BAI';
}
?>