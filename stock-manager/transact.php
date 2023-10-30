<?php
	include 'includes/session.php';

	$id = $_POST['id'];

	$conn = $pdo->open();

	$output = array('list'=>'');

	$stmt = $conn->prepare("SELECT *, s.quantity as quantity, p.name as Pname, p.type as Ptype, p.price as Pprice FROM sales AS s INNER JOIN products AS p ON s.prod_id = p.id WHERE s.transactionId = :id");
	$stmt->execute([':id'=>$id]);

	$total = 0;
	foreach($stmt as $row){
		$output['transaction'] = $row['transactionId'];
		$output['date'] = date('M d, Y', strtotime($row['sales_date']));
		$subtotal = $row['Pprice']*$row['quantity'];
		$total += $subtotal;
		$output['list'] .= "
			<tr class='prepend_items'>
				<td>".$row['Pname']."</td>
				<td>Rwf ".number_format($row['Pprice'], 2)."</td>
				<td>".$row['quantity']."</td>
				<td>Rwf ".number_format($subtotal, 2)."</td>
			</tr>
		";
	}
	
	$output['total'] = '<b>Rwf '.number_format($total, 2).'<b>';
	$pdo->close();
	echo json_encode($output);

?>