<?php
	// function getTransactionId() {
	// 	$n=30;
	// 	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-/:$#@^*(_!&-';
	// 	$randomString = '';
	// 	for ($i = 0; $i < $n; $i++) {
	// 		$index = rand(0, strlen($characters) - 1);
	// 		$randomString .= $characters[$index];
	// 	}
	// 	return $randomString;
	// }
	// $phoneNumber = $_POST['momophone'];
	// $amount = $_POST['totalcheckout'];
	// #### organization is defined by the 2
	// ## [shortCode] => 80816
	// ## [merchantId] => dc5c0218-b115-4552-9f0d-ea022c25cb0c
	// $orgId = "b6e8ae5a-74a4-4786-a022-94cfd410406e";
	// $transId = getTransactionId();
	// //Url location to send payment request
	// $url = 'https://opay-api.oltranz.com/opay/paymentrequest';
	// $data = array(
	// 'telephoneNumber' => $phoneNumber,
	// 'amount' => $amount,
	// 'organizationId' => $orgId,
	// 'description' => "payment",
	// 'callbackUrl' => "http://127.0.0.1:180/onlinePayment/payments.php",
	// 'transactionId' => $transId
	// );
	
	// function submit_pay_request($url, $data) {
	// 	$ch = curl_init($url);
	// 	# Setup request to send json via POST.
	// 	$payload = json_encode($data);
	// 	curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
	// 	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
	// 	# Return response instead of printing.
	// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// 	# Send request.
	// 	$result = curl_exec($ch);
	// 	curl_close($ch);
	// 	# Print response.
	// 	return $result;
	// }
	// $response = json_decode(submit_pay_request($url, $data), TRUE);
	// //print_r($response);
	// $trasid = $transId;
    // if($response['code'] == 200) {
    //     echo "<script>alert('".$response['description']."'); history.back();</script>";
    //     include 'includes/session.php';
	//     $conn = $pdo->open();
	// 	$stmt = $conn->prepare("INSERT INTO sales(user_id, prod_id, quantity) SELECT user_id, product_id, quantity FROM cart WHERE user_id = :id");
    //     $exec = $stmt->execute(['id'=>$_SESSION['user']]);
    //     if($exec) {
    //         $add1 = $_POST['address1'];
    //         $add2 = $_POST['address2'];
    //         $stmt = $conn->prepare("INSERT INTO shipaddress VALUES(:add1, :add2, :saler)");
    //         $stmt->execute(['add1'=>$add1, 'add2'=>$add2, 'saler'=>$_SESSION['user']]);
    //         $stmt = $conn->prepare("DELETE FROM cart WHERE user_id = :id");
    //         $stmt->execute([':id'=>$_SESSION['user']]);
    //     }
    //     return false;
    // }
    // else {
    //     echo "<script>alert('".$response['description']."'); history.back();</script>";
    //     return false;
    // }
	
	  
		$phoneNumber = $_POST['momophone'];
		$amount = $_POST['totalcheckout'];
	
		include 'pay.php';
		//generate unique transaction reference without using payment class
		$transaction_ref = "umuhuza".rand(100000,999999);
		
		//REQUEST PAYMENT 
		$pay = hdev_payment::pay($phoneNumber,$amount,$transaction_ref,"");
		// check if payment is successful
		if ($pay->status == "success") {
		} else {
			echo "<script>alert('".$pay->message."')</script>";
			exit();
		}
	
	if($pay->status == "success") {
		echo "<script>window.location.href='wait.php?pay_ref=".$transaction_ref."'</script>";
		    include 'includes/session.php';
		    $conn = $pdo->open();
			$stmt = $conn->prepare("INSERT INTO sales(user_id, prod_id, quantity) SELECT user_id, product_id, quantity FROM cart WHERE user_id = :id");
		    $exec = $stmt->execute(['id'=>$_SESSION['user']]);
		    if($exec) {
		        $add1 = $_POST['address1'];
		        $add2 = $_POST['address2'];
		        $stmt = $conn->prepare("INSERT INTO shipaddress VALUES(:add1, :add2, :saler)");
		        $stmt->execute(['add1'=>$add1, 'add2'=>$add2, 'saler'=>$_SESSION['user']]);
		        $stmt = $conn->prepare("DELETE FROM cart WHERE user_id = :id");
		        $stmt->execute([':id'=>$_SESSION['user']]);
		    }
		    return false;
		}
		else {
		    
			echo "<script>alert('Booking request failed')</script>";
		    return false;
		}

?>