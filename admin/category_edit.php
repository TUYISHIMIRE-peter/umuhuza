<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$slug = slugify($name);
		$description = $_POST['description'];

		try{
			$stmt = $conn->prepare("UPDATE category SET catname=:catname, cat_slug=:cat_slug, description=:description WHERE id=:id");
			$stmt->execute(['catname'=>$name, 'cat_slug'=>$slug, 'description'=>$description, 'id'=>$id]);
			$_SESSION['success'] = 'Category updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit category form first';
	}

	header('location: category.php');

?>