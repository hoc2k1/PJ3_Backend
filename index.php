<?php
	include('connect/connect.php');
	
	$products = $mysqli->query('SELECT p.id,p.name as name ,p.id_type as idType, t.name as nameType, p.price, p.material, p.description, GROUP_CONCAT(Distinct i.link) AS images, GROUP_CONCAT(Distinct c.color) AS colors, GROUP_CONCAT(Distinct s.size) AS sizes FROM product p LEFT JOIN images i ON p.id = i.id_product inner join product_type t ON t.id = p.id_type inner join colors c on c.id_product = p.id inner join size s on s.id_product = p.id where p.new = 1 group by p.id LIMIT 0,6');
	while ($row = $products->fetch_object()){
		$assignees1 = explode(',', $row->images);
		$assignees2 = explode(',', $row->colors);
		$assignees3 = explode(',', $row->sizes);
		$row->images = $assignees1;
		$row->colors = $assignees2;
		$row->sizes = $assignees3;
	    $product[] = $row;
	}


	$product_types = $mysqli->query("Select * from product_type");
	while ($type = $product_types->fetch_object()){
	    $product_type[] = $type;
	}
	
	$array = array('type'=>$product_type,'product'=>$product);
	echo json_encode($array);


?>