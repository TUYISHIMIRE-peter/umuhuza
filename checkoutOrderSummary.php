<?php
	include 'includes/session.php';
	$conn = $pdo->open();

	$output = '';
	$output2 = '';

	if(isset($_SESSION['user'])){
		if(isset($_SESSION['cart'])){
			foreach($_SESSION['cart'] as $row){
				$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM cart WHERE user_id=:user_id AND product_id=:product_id");
				$stmt->execute(['user_id'=>$user['id'], 'product_id'=>$row['productid']]);
				$crow = $stmt->fetch();
				if($crow['numrows'] < 1){
					$stmt = $conn->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)");
					$stmt->execute(['user_id'=>$user['id'], 'product_id'=>$row['productid'], 'quantity'=>$row['quantity']]);
				}
				else{
					$stmt = $conn->prepare("UPDATE cart SET quantity=:quantity WHERE user_id=:user_id AND product_id=:product_id");
					$stmt->execute(['quantity'=>$row['quantity'], 'user_id'=>$user['id'], 'product_id'=>$row['productid']]);
				}
			}
			unset($_SESSION['cart']);
		}

		try{
			$total = 0;
			$stmt = $conn->prepare("SELECT *, cart.id AS cartid, cart.quantity AS quant FROM cart LEFT JOIN products ON products.id=cart.product_id WHERE user_id=:user");
			$stmt->execute(['user'=>$user['id']]);
			foreach($stmt as $row){
				$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
				$subtotal = $row['price']*$row['quant'];
				$total += $subtotal;
        $output .= "
                <div class='media mb-2 border-bottom'>
                  <div class='media-body'> <a href='cart.php'> ".$row['name']."</a>
                      <div class='small text-muted'>Price: &#82;&#87;&#70; ".number_format($row['price'], 2)." <span class='mx-2'>|</span> Qty: ".$row['quant']." <span class='mx-2'>|</span> Subtotal: &#82;&#70; ".number_format($subtotal, 2)."</div>
                  </div>
                </div>
        ";
			}
		

		}
		catch(PDOException $e){
			$output .= $e->getMessage();
		}

	}
	else{
		if(count($_SESSION['cart']) != 0){
			$total = 0;
			foreach($_SESSION['cart'] as $row){
				$stmt = $conn->prepare("SELECT *, products.name AS prodname, category.catname AS catname FROM products LEFT JOIN category ON category.id=products.category_id WHERE products.id=:id");
				$stmt->execute(['id'=>$row['productid']]);
				$product = $stmt->fetch();
				$image = (!empty($product['photo'])) ? 'images/'.$product['photo'] : 'images/noimage.jpg';
				$subtotal = $product['price']*$row['quantity'];
				$total += $subtotal;
        $output .= "
                <div class='media mb-2 border-bottom'>
                  <div class='media-body'> <a href='cart.php'> ".$product['name']."</a>
                      <div class='small text-muted'>Price: &#82;&#87;&#70; ".number_format($product['price'], 2)." <span class='mx-2'>|</span> Qty: ".$row['quantity']." <span class='mx-2'>|</span> Subtotal: &#82;&#70;".number_format($subtotal, 2)."</div>
                  </div>
                </div>
        ";
				
			}
		}
		// onchange='compute()'

		else{
			$output .= "
				<tr>
					<td colspan='6' align='center'>Shopping cart empty</td>
				<tr>
			";
		}
		
	}

	$pdo->close();
	echo json_encode($output);

?>

