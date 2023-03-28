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

        $sql = "SELECT * from bill where id_customer='$id_user' and cart_status=1 ";
		$cart = $mysqli->query($sql);
		while ($row = $cart->fetch_object()){
			$cart1[] = $row;
		}
        // $cart1 = mysqli_fetch_assoc($cart);
		// $cart1 = $cart->fetch_array(MYSQLI_ASSOC)
		echo json_encode($cart1);
}
catch(Exception $e){
	echo 'TOKEN_KHONG_HOP_LE';
}
?>