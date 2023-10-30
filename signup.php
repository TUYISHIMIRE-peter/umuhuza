<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: cart.php');
  }

  // if(isset($_SESSION['captcha'])){
  //   $now = time();
  //   if($now >= $_SESSION['captcha']){
  //     unset($_SESSION['captcha']);
  //   }
  // }

?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition register-page" style="background:url(./images/all-bg-title.jpg); background-position:center 0;">
<div style="background: #00000099; position: fixed; top: 0; width: 100vw; min-height: 100vh; display: grid; justify-content: center; align-content: center;">
<div class="register-box">
  	<?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }

      if(isset($_SESSION['success'])){
        echo "
          <div class='callout callout-success text-center'>
            <p>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>
    <div class="row">
  	<div class="register-box-body col-md-8" style="background:#e1f2ee; width: 100vw; margin: auto auto; padding:20px 20px;">
    	<div class="row">
        <div class="col-md-12" style="text-align:center;">
          <p class="login-box-msg" style="font-weight:700; font-size:19px; padding: 5px 5px;text-decoration: underline;">Register a new membership</p>
          <hr>
        </div>
      </div>

    	<form action="register.php" method="POST" enctype="multipart/form-data">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group has-feedback">
                <input type="text" class="form-control" name="firstname" placeholder="Firstname" value="<?php echo (isset($_SESSION['firstname'])) ? $_SESSION['firstname'] : '' ?>" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input type="text" class="form-control" name="lastname" placeholder="Lastname" value="<?php echo (isset($_SESSION['lastname'])) ? $_SESSION['lastname'] : '' ?>"  required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input type="password" class="form-control" name="repassword" placeholder="Retype password" required>
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
              </div>
            </div>
            <!-- part 2 of address and contacts -->
            <div class="col-md-6">
              <div class="form-group has-feedback">
                <label for="photo" style="font-weight:700; font-size:16px; text-decoration:underline;" class="col-md-12 control-label">
                  Photo, Contacts & Address
                </label>
              </div>
              <div class="form-group has-feedback">
                <input  type="file" id="photo" name="photo" class="form-control" placeholder="Profile" value="<?php echo (isset($_SESSION['firstname'])) ? $_SESSION['firstname'] : '' ?>" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input type="text" class="form-control" id="contact" name="contact" placeholder="Contacts" value="<?php echo (isset($_SESSION['lastname'])) ? $_SESSION['lastname'] : '' ?>"  required>
                <span class="glyphicon glyphicon-book form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <textarea class="form-control" id="address" name="address" placeholder="Address" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" required></textarea>
                <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
              </div>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-12" style='text-align:center; '>
                <button type="submit" style="font-weight:700;" class="btn btn-warning ml-auto btn-block btn-flat" name="signup"><i class="fa fa-pencil"></i> Sign Up</button>
            </div>
          </div>
        </div>
    	</form>
      		<div class="row">
            <div class="col-md-12" style='text-align:center; font-weight:700; font-size:16px; '>
              <a  href="login.php"><i class="fa fa-user"></i> I already have a membership</a><br>
              <a href="index.php"><i class="fa fa-home"></i> Home</a>
            </div>
      		</div>
  	</div>
  </div>
</div>
</div>
<?php include('includes/scripts.php'); ?>
</body>
</html>