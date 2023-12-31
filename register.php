<?php
	include 'includes/session.php';

	if(isset($_POST['signup'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$status = 1;
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];
		$address = $_POST['address'];
		$contact = $_POST['contact'];
		$filename = $_FILES['photo']['name'];
		$now = date('Y-m-d');
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], './images/'.$filename);	
		}

		$_SESSION['firstname'] = $firstname;
		$_SESSION['lastname'] = $lastname;
		$_SESSION['email'] = $email;
		$_SESSION['contact'] = $contact;

		if($password != $repassword){
			$_SESSION['error'] = 'Passwords did not match';
			header('location: signup.php');
		}
		else{
			$conn = $pdo->open();

			$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE email=:email");
			$stmt->execute(['email'=>$email]);
			$row = $stmt->fetch();
			if($row['numrows'] > 0){
				$_SESSION['error'] = 'Email already taken';
				header('location: signup.php');
			}
			else{
				$now = date('Y-m-d');
				$password = password_hash($password, PASSWORD_DEFAULT);

				//generate code
				$set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$code=substr(str_shuffle($set), 0, 12);

				try{
					$stmt = $conn->prepare("INSERT INTO users (email, password, firstname, lastname,address, contact_info, photo, status, activate_code, created_on) VALUES (:email, :password, :firstname, :lastname, :address, :contact, :photo, :status, :code, :now)");
					$stmt->execute(['email'=>$email, 'password'=>$password, 'firstname'=>$firstname, 'lastname'=>$lastname, 'address'=>$address, 'contact'=>$contact, 'photo'=>$filename, 'status'=>$status,'code'=>$code, 'now'=>$now]);
					$userid = $conn->lastInsertId();

					$_SESSION['success'] = 'Account created Successfully.';
					header('location: login.php');

                          
				    // try {
				    //     unset($_SESSION['firstname']);
				    //     unset($_SESSION['lastname']);
				    //     unset($_SESSION['email']);
				    // } 
				    // catch (Exception $e) {
				    //     $_SESSION['error'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
				    //     header('location: signup.php');
				    // }


				}
				catch(PDOException $e){
					$_SESSION['error'] = $e->getMessage();
					header('location: register.php');
				}

				$pdo->close();

			}

		}

	}
	else{
		$_SESSION['error'] = 'Fill up signup form first';
		header('location: signup.php');
	}

?>