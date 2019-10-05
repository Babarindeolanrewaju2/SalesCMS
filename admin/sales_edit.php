<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$prid = $_POST['id'];
		$productName = $_POST['product_name'];
		$costPrice = $_POST['cost_price'];
		$sellingPrice = $_POST['selling_price'];
		$expireDate = $_POST['expire_date'];
		
		$sql = "UPDATE products SET product_name = '$productName', cost_price = '$costPrice', selling_price = '$sellingPrice', 
				expire_date = '$expireDate' WHERE product_id = '$prid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Student updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Select student to edit first';
	}

	header('location: product.php');
?>