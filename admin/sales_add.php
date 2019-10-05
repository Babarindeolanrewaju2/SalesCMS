<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$product_id = $_POST['product_id'];
		$unit_price = $_POST['unit_price'];
		$cost_price = $_POST['cost_price'];
		$qty = $_POST['qty'];
		$tot_sales = $cost_price * $qty;
		$total = $_POST['total'];
		$profit = $total - $tot_sales;
		$odate = date('Y-m-d');
		$uid = $user['id'];
		$city_id = $user['city_id'];

		//creating student
		$numbers = '';
		
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$order_id = substr(str_shuffle($numbers), 0, 5);
		//
		$sql = "INSERT INTO orders (order_id, order_date, city_id, product_id, unit_price, qty, total, profit, user_id)
		 VALUES ('$order_id', '$odate', '$city_id', '$product_id', '$unit_price', '$qty', '$total', '$profit', '$uid')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Sales added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: sales.php');
?>