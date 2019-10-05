<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$sch_yr = $_POST['title'];

		$sql = "INSERT INTO region (region_name) VALUES ('$sch_yr')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'New region added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	

	elseif(isset($_POST['edit'])){
		$id = $_POST['id'];
		$title = $_POST['title'];

		$sql = "UPDATE region SET region_name = '$title' WHERE region_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Region updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	
	elseif(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM region WHERE region_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Season deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: region.php');
	
?>