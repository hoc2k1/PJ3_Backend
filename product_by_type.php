<?php

	include('connect/connect.php');
	$id_type = $_GET['id_type'];

	$limit = 10;
	$page = isset($_GET['page'])?$_GET['page']:1;
	settype($page, "int");
	$offset = ($page - 1) * $limit;
	
	$products = $mysqli->query("SELECT p.*, t.name as nameType, GROUP_CONCAT(Distinct i.link) AS images, GROUP_CONCAT(Distinct c.color) AS colors, GROUP_CONCAT(Distinct s.size) AS sizes FROM product p inner join product_type t ON t.id = p.id_type INNER JOIN images i ON i.id_product = p.id inner join colors c on c.id_product = p.id inner join size s on s.id_product = p.id WHERE id_type = $id_type group by p.id");
	
	while ($row = $products->fetch_object()){
	    $assignees1 = explode(',', $row->images);
		$assignees2 = explode(',', $row->colors);
		$assignees3 = explode(',', $row->sizes);
		$row->images = $assignees1;
		$row->colors = $assignees2;
		$row->sizes = $assignees3;
	    $product[] = $row;
	}

	echo json_encode($product);


?>