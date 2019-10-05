<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$city = $_POST['title'];
		$region_id = $_POST['city_region'];

		$sql = "INSERT INTO city (city_name, region_id) VALUES ('$city', '$region_id')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'City added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: city.php');

?>