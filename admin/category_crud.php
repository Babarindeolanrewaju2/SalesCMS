<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$title = $_POST['title'];
		//creating user
		$sql = "INSERT INTO product_category (cat_name, created_on) VALUES ('$title', NOW())";
		if($conn->query($sql)){
			$_SESSION['success'] = 'New category added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}	

	elseif(isset($_POST['save'])){
		$id = $_POST['id'];
		$edittitle = $_POST['title'];
			$sql = "UPDATE product_category SET cat_name = '$edittitle' WHERE cat_id = '$id' ";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Product category updated successfully';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
	}	
	
	elseif(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM product_category WHERE cat_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Category deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
    }
	else{
		$_SESSION['error'] = 'Fill up required details first';
	}	
	header('location: category.php');

?>