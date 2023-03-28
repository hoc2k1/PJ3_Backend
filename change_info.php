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
	$name = $obj['name'];
	$phone = $obj['phone'];
	$address = $obj['address'];
	$email = $obj['email'];
	$sql = "UPDATE users SET name='$name', phone='$phone', address='$address' WHERE email ='$email'";
	$user = $mysqli->query($sql);
	if($user){
		$result = $mysqli->query("SELECT u.email, u.name, u.address, u.phone FROM users u where email = '$email'");

		$user = mysqli_fetch_assoc($result);
		print_r(json_encode($user));
	}
	else{
		echo 'KHONG_THANH_CONG';
	}
}

catch(Exception $e){
	echo 'LOI';
}



?>