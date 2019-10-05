<?php
	$conn = new mysqli('localhost', 'root', '', 'sales_dashboard');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>