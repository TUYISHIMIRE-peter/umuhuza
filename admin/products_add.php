<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$slug = slugify($name);
		$ptype = $_POST['type'];
		$category = $_POST['category'];
		$store = $_POST['store'];
		$price = $_POST['price'];
		$quantity = $_POST['quantity'];
		$status = 'new';
		$description = $_POST['description'];
		$filename = $_FILES['photo']['name'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM products WHERE slug=:slug");
		$stmt->execute(['slug'=>$slug]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Product already exist';
		}
		else{
			if(!empty($filename)){
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				$new_filename = $slug.'.'.$ext;
				move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$new_filename);	
			}
			else{
				$new_filename = '';
			}

			try{
				$stmt = $conn->prepare("INSERT INTO products (name, category_id, type, storeid, description, slug, price, quantity, photo, status) VALUES (:name, :category, :type, :store, :description, :slug, :price, :quantity, :photo, :status)");
				$stmt->execute(['name'=>$name, 'category'=>$category, 'type'=>$ptype, 'store'=>$store,'description'=>$description, 'slug'=>$slug, 'price'=>$price, 'quantity'=>$quantity,'photo'=>$new_filename, 'status'=>$status]);
				$_SESSION['success'] = 'Product added successfully';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up product form first';
	}

	header('location: products.php');

?>