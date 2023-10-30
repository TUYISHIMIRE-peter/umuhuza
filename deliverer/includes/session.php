<?php
	include '../includes/conn.php';
	session_start();

	if(!isset($_SESSION['deliverer']) || trim($_SESSION['deliverer']) == ''){
		header('location: ../index.php');
		exit();
	}

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
	$stmt->execute(['id'=>$_SESSION['deliverer']]);
	$admin = $stmt->fetch();

	$pdo->close();

?>