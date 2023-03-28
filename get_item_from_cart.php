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

        $sql = "SELECT * from bill_detail where id_bill='$id_bill'";
		$result = $mysqli->query($sql);
        // $items = mysqli_fetch_assoc($result);
        while ($row = $result->fetch_object()){
            $items[] = $row;
        }
		print_r(json_encode($items));
}
catch(Exception $e){
	echo 'TOKEN_KHONG_HOP_LE';
}
?>