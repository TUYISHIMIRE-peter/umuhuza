<?php
	include 'includes/session.php';
	$conn = $pdo->open();

	$output = array('list'=>'','count'=>0);

	if(isset($_SESSION['user'])){
		try{
			$stmt = $conn->prepare("SELECT *, products.name AS prodname, category.catname AS catname FROM cart LEFT JOIN products ON products.id=cart.product_id LEFT JOIN category ON category.id=products.category_id WHERE user_id=:user_id");
			$stmt->execute(['user_id'=>$user['id']]);
			$tot = 0;
			$finalTotal = 0;
			foreach($stmt as $row){
				$output['count']++;
				$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
				$productname = (strlen($row['prodname']) > 30) ? substr_replace($row['prodname'], '...', 27) : $row['prodname'];
				$tot = $row['price'] * $row['quantity'];
				$finalTotal += $tot;
				$output['list'] .= "
					<li>
						<a href='#' class='photo'><img src='".$image."' class='cart-thumb' alt='' /></a>
						<h6><a href='#'>".$productname." </a></h6>
						<p>1x - <span class='price'>&#82;&#87;&#70; ".$row['price']."</span> : <span id='quantityb'>".$row['quantity']." Kg</span></p>
					</li>
				";
			}
			$output['list'] .= "
			<li class='total btn-group btn-group-justified'>
				<a href='cart.php' class='btn btn-default hvr-hover btn-cart'>VIEW CART</a>
				<span class='float-right'><strong>Total</strong>: &#82;&#87;&#70; ".number_format($finalTotal, 2)."</span>
			</li>
			";
		}
		catch(PDOException $e){
			$output['message'] = $e->getMessage();
		}
	}
	else{
		if(!isset($_SESSION['cart'])){
			$_SESSION['cart'] = array();
		}

		if(empty($_SESSION['cart'])){
			$output['count'] = 0;
		}
		else{
			$tot = 0;
			$finalTotal = 0;
			foreach($_SESSION['cart'] as $row){
				$output['count']++;
				$stmt = $conn->prepare("SELECT *, products.name AS prodname, category.catname AS catname FROM products LEFT JOIN category ON category.id=products.category_id WHERE products.id=:id");
				$stmt->execute(['id'=>$row['productid']]);
				$product = $stmt->fetch();
				$image = (!empty($product['photo'])) ? 'images/'.$product['photo'] : 'images/noimage.jpg';
				$tot = $product['price'] * $row['quantity'];
				$finalTotal += $tot;
				$output['list'] .= "
					<li>
						<a href='#' class='photo'><img src='".$image."' class='cart-thumb' alt='' /></a>
						<h6><a href='#'>".$product['prodname']." </a></h6>
						<p>1x - <span class='price'>&#82;&#87;&#70; ".$product['price']."</span> : <span id='quantityb'>".$row['quantity']." Kg</span></p>
					</li>
				";
				
			}
			$output['list'] .= "
			<li class='total btn-group btn-group-justified'>
				<a href='cart.php' class='btn btn-default hvr-hover btn-cart'>VIEW CART</a>
				<span class='float-right'><strong>Total</strong>: &#82;&#87;&#70; ".$finalTotal."</span>
			</li>
			";
		}
	}

	$pdo->close();
	echo json_encode($output);

?>

