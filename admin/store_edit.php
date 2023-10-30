<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$address = $_POST['address'];
		$contacts = $_POST['contacts'];

		try{
			$stmt = $conn->prepare("UPDATE store SET name=:name, address=:address, contact=:contact WHERE id=:id");
			$stmt->execute(['name'=>$name, 'address'=>$address, 'contact'=>$contacts, 'id'=>$id]);
			$_SESSION['success'] = 'Store updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit Store form first';
	}

	header('location: stores.php');

?>