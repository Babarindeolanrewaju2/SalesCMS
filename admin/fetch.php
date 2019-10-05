<?php
    include 'includes/session.php';
    
	if(isset($_POST['product_id'])) {
        $id = $_POST['product_id'];
        $sql = "SELECT * FROM products WHERE product_id = '$id' ";

        $query = $conn->query($sql);
        $row = $query->fetch_assoc();

        echo json_encode($row);
    }
?>