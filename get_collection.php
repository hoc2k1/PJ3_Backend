<?php
//collection
	include('connect/connect.php');

	$limit = 3;
	$page = isset($_GET['page'])?$_GET['page']:1;
	settype($page, "int");
	$offset = ($page - 1) * $limit;

	$collection = $mysqli->query("SELECT p.*, GROUP_CONCAT(Distinct i.link) AS images, GROUP_CONCAT(Distinct c.color) AS colors, GROUP_CONCAT(Distinct s.size) AS sizes FROM ((images i inner join product p ON i.id_product = p.id) inner join colors c on c.id_product = p.id) inner join size s on s.id_product = p.id where inCollection=1  group by p.id ");
	
	while ($row = $collection->fetch_object()){
		$assignees1 = explode(',', $row->images);
		$assignees2 = explode(',', $row->colors);
		$assignees3 = explode(',', $row->sizes);
		$row->images = $assignees1;
		$row->colors = $assignees2;
		$row->sizes = $assignees3;
	    $product[] = $row;
	}

	echo (json_encode($product));
	
?>