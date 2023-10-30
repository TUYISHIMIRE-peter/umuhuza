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
								<tr>
									<td class='thumbnail-img'>
										<a href='#'>
											<img class='img-fluid' width='50px' height='50px' src='".$image."' alt='' />
										</a>
									</td>
									<td class='name-pr'>
										<a href='#'>
											".$row['name']."
										</a>
									</td>
									<td class='price-pr'>
										<p> &#82;&#87;&#70; ".number_format($row['price'], 2)."</p>
									</td>
									<td class='quantity-box'>
										<input type='number' data-id='".$row['cartid']."' id='qty_".$row['cartid']."' size='4' value='".$row['quant']."' min='1' class='c-input-text qty text qtychange'></td>
									<td class='total-pr'>
										<p> &#82;&#87;&#70; ".number_format($subtotal, 2)."</p>
									</td>
									<td class='remove-pr'>
										<button type='button' data-id='".$row['cartid']."' class='btn btn-danger btn-flat cart_delete'>
											<i class='fas fa-times'></i>
										</button>
									</td>
								</tr>
				";
			}
			$output .= "
				<tr>
					<td colspan='5' align='right'><b>Total</b></td>
					<td><b>&#82;&#87;&#70; ".number_format($total, 2)."</b></td>
				<tr>
			";

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
					<tr>
						<td class='thumbnail-img'>
							<a href='#'>
								<img class='img-fluid' width='50px' height='50px' src='".$image."' alt='' />
							</a>
						</td>
						<td class='name-pr'>
							<a href='#'>
								".$product['name']."
							</a>
						</td>
						<td class='price-pr'>
							<p> &#82;&#87;&#70; ".number_format($product['price'], 2)."</p>
						</td>
						<td class='quantity-box'>
							<input type='number' data-id='".$row['productid']."' id='qty_".$row['productid']."' size='4' value='".$row['quantity']."' min='0' step='1' class='c-input-text qty text qtychange'></td>
						<td class='total-pr'>
							<p> &#82;&#87;&#70; ".number_format($subtotal, 2)."</p>
						</td>
						<td class='remove-pr'>
							<button type='button' data-id='".$row['productid']."' class='btn btn-danger btn-flat cart_delete'>
								<i class='fas fa-times'></i>
							</button>
						</td>
					</tr>
				";
				
			}

			$output .= "
				<tr>
					<td colspan='5' align='right'><b>Total</b></td>
					<td>
					<b>&#82;&#87;&#70; ".number_format($total, 2)."</b></td>
				<tr>
			";
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

