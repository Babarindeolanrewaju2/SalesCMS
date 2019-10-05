<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$title = $_POST['title'];
		$city_region = $_POST['city_region'];

		$sql = "UPDATE city SET city_name = '$title', region_id = '$city_region' WHERE city_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'City updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location: city.php');

?>