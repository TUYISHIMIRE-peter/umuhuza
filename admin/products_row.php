<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, products.id AS prodid, products.name AS prodname, category.catname AS catname, store.name AS name, products.type AS ptype, products.description AS pdescription  FROM products LEFT JOIN category ON category.id=products.category_id LEFT JOIN store ON store.id=products.storeid WHERE products.id=:id");
		$stmt->execute(['id'=>$id]);
		$row = $stmt->fetch();
		
		$pdo->close();

		echo json_encode($row);
	}
?>