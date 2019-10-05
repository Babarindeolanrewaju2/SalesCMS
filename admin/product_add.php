<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$catid = $_POST['cat_id'];
		$productName = $_POST['product_name'];
		$costPrice = $_POST['cost_price'];
		$sellingPrice = $_POST['selling_price'];
		$expireDate = $_POST['expire_date'];

		//creating student
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 7; $i++){
			$numbers .= $i;
		}
		$product_id = substr(str_shuffle($letters), 0, 2).substr(str_shuffle($numbers), 0, 5);
		//
		$sql = "INSERT INTO products (product_id, cat_id, product_name, cost_price, selling_price, expire_date, created_on)
		 VALUES ('$product_id', '$catid', '$productName', '$costPrice', '$sellingPrice', '$expireDate', NOW())";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Product added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: product.php');
?>