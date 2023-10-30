<?php
	include '../includes/conn.php';
	session_start();

	if(!isset($_SESSION['manager']) || trim($_SESSION['manager']) == ''){
		header('location: ../index.php');
		exit();
	}

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
	$stmt->execute(['id'=>$_SESSION['manager']]);
	$admin = $stmt->fetch();

	$pdo->close();

?>