<?php


	if(isset($_POST['add'])){
		$hotelName = test_input($_POST["hotelname"]);
		$rating = test_input($_POST["rating"]);
		$category = test_input($_POST["category"]);
		$city_id = test_input($_POST["city_id"]);
		$price = $_POST["price"];
		$reputation = test_input($_POST["reputation"]);
		$availability = $_POST["availability"];
		$zipCode = test_input($_POST["zipcode"]);
		//creating user
		$sql = "INSERT INTO hotel (hotelname, rating, category, citu_id, reputation, price, availability)
                      VALUES('$hotelName','$rating','$category','$city_id', '$reputation',' $price','$availability')";

		if($conn->query($sql)){
			$_SESSION['success'] = 'New user added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}	

	elseif(isset($_POST['save'])){
		$id = $_POST['id'];
		$editusername = $_POST['username'];
		$editfirstname = $_POST['firstname'];
		$editlastname = $_POST['lastname'];
		$cid = $_POST['city_id'];
			$sql = "UPDATE admin SET username = '$editusername', firstname = '$editfirstname', lastname = '$editlastname', city_id = '$cid' WHERE id = '$id' ";
			if($conn->query($sql)){
				$_SESSION['success'] = 'User profile updated successfully';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
	}	
	
	elseif(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM admin WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'User deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up required details first';
	}	

	header('location: users.php');

?>