<?php
	include('connect/connect.php');
	$id = $_GET['id'];

	$products = $mysqli->query("SELECT p.id,p.name as nameProduct ,p.id_type as idType, t.name as nameType, p.price, p.material, p.description, GROUP_CONCAT(Distinct i.link) AS images, GROUP_CONCAT(Distinct c.color) AS colors, GROUP_CONCAT(Distinct s.size) AS sizes FROM ((product p LEFT JOIN images i ON p.id = i.id_product inner join product_type t ON t.id = p.id_type) inner join colors c on c.id_product = p.id) inner join size s on s.id_product = p.id where p.new = 1 and p.id=$id");
	while ($row = $products->fetch_object()){
		$assignees = explode(',', $row->images);
		$row->images = $assignees;
	    $product[] = $row;
	}

	echo json_encode($product);


?>