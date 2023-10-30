<?php 
include 'includes/session.php'; 
$conn = $pdo->open();

$loginres = 'Login';
$loginlink = 'login.php';

if(isset($_SESSION['user'])){
    $loginres = 'Logout';
    $loginlink = 'logout.php';

}
?>

<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<?php include 'includes/header.php'; ?>

<body>
    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="custom-select-box">
                        <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
							<option>F RWF</option>
							<option>$ USD</option>
						</select>
                    </div>
                    <div class="right-phone-box">
                        <p>Call US :- <a href="#"> 0787254817</a></p>
                    </div>
                    <div class="our-link">
                        <ul>
                            <li><a href="#"><i class="fa fa-user s_color"></i> My Account</a></li>
                            <li><a href="#"><i class="fas fa-location-arrow"></i> Our location</a></li>
                            <li><a href="#"><i class="fas fa-headset"></i> Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="login-box">
						<!-- <select id="basic" class="selectpicker show-tick form-control" data-placeholder="Sign In">
							<option>Register Here</option>
							<option ><a href="login.php">Sign In</a></option>
						</select> -->
                        <div id="basic" class="special-menu text-center">
                            <a  href="signup.php" style="color:#f5f5f5;" class="btn hvr-hover form-group">Register Here</a>
                            <a  href="<?= $loginlink ?>" style="color:#f5f5f5;" class="btn hvr-hover"><?= $loginres ?></a>
                        </div>
					</div>
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                                <li>
                                    <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT80
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 50% - 80% off on Vegetables
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 10%! Shop Vegetables
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 50%! Shop Now
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 10%! Shop Vegetables
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 50% - 80% off on Vegetables
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT30
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 50%! Shop Now 
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="index.php"><img src="images/umuhuzalogo.png" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                        <li class="dropdown active">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">SHOP</a>
                            <ul class="dropdown-menu">
								<li><a href="shop.php">Sidebar Shop</a></li>
                                <li><a href="cart.php">Cart</a></li>
                                <li><a href="checkout.php">Checkout</a></li>
                                <li><a href="my-account.php">My Account</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="contact-us.php">Contact Us</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= $loginlink ?>"><?= $loginres ?></a></li>
                        <li class="side-menu"><a href="#">
						<i class="fa fa-shopping-bag"></i>
                            <span class="badge cart_count"></span>
							<p>My Cart</p>
					</a></li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list" id="cart_menu"></ul>
                    <ul class="cart-list">
                        <!-- <li>
                            <a href="#" class="photo"><img src="images/img-pro-01.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Delica omtantur </a></h6>
                            <p>1x - <span class="price">$80.00</span></p>
                        </li> -->
                        <!-- <li class="total">
                            <a href="cart.php" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                            <span class="float-right"><strong>Total</strong>: $180.00</span>
                        </li> -->
                    </ul>
                </li>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Shop</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Shop</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">
                                <div class="toolbar-sorter-right">
                                    <span>Sort by </span>
                                    <select id="basic" class="selectpicker show-tick form-control" data-placeholder="RF RWF">
									<option data-display="Select">Nothing</option>
									<option value="1">Popularity</option>
									<option value="2">High Price → High Price</option>
									<option value="3">Low Price → High Price</option>
									<option value="4">Best Selling</option>
								</select>
                                </div>
                                    <?php
                            
                                        $conn = $pdo->open();

                                        try{
                                            $inc = 3;	
                                            $stmt = $conn->prepare("SELECT COUNT(*) FROM products");
                                            $stmt->execute();
                                            foreach ($stmt as $row) {
                                                echo "<p>Showing all ".$row['COUNT(*)']." results</p>";
                                            }
                                            }
                                            catch(PDOException $e){
                                                echo "There is some problem in connection: " . $e->getMessage();
                                            }
    
                                            $pdo->close();
    
                                        ?> 
                                
                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-right">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#list-view" data-toggle="tab"> <i class="fa fa-list-ul"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Start product-categorie-box -->
                        <div class="product-categorie-box">
                            <div class="tab-content">
                                <!-- Start grid view area -->
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <?php
                            
                                        $conn = $pdo->open();

                                        try{
                                            $inc = 3;	
                                            $stmt = $conn->prepare("SELECT * FROM products ORDER BY id DESC");
                                            $stmt->execute();
                                            foreach ($stmt as $row) {
                                                $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
                                                $inc = ($inc == 3) ? 1 : $inc + 1;
                                                if($inc == 1) echo "<div class='row'>";
                                                echo "
                                                    <div class='col-sm-6 col-md-6 col-lg-4 col-xl-4'>
                                                        <div class='products-single fix'>
                                                          <form id='productForm'>
                                                            <div class='box-img-hover'>
                                                                <div class='type-lb'>
                                                                    <p class='".$row['status']."'>".$row['status']."</p>
                                                                </div>
                                                                <img style='height:220px;width:320px;' src='".$image."' class='img-fluid' alt='Image'>
                                                                <div class='mask-icon'>
                                                                    <ul>
                                                                        <li><a href='#' data-toggle='tooltip' data-placement='right' title='View'><i class='fas fa-eye'></i></a></li>
                                                                        <li><a href='#' data-toggle='tooltip' data-placement='right' title='Compare'><i class='fas fa-sync-alt'></i></a></li>
                                                                        <li><a href='#' data-toggle='tooltip' data-placement='right' title='Add to Wishlist'><i class='far fa-heart'></i></a></li>
                                                                    </ul>
                                                                    <a class='cart' href='shop-detail.php?product=".$row['slug']."'> Select for Cart</a>
                                                                </div>
                                                            </div>
                                                            <div class='why-text'>
                                                                <h4><a href='shop-detail.php?product=".$row['slug']."'>".$row['name']."</a> ( ".$row['type']." )</h4>
                                                                <h5> &#82;&#87;&#70; ".number_format($row['price'], 2)."</h5><input type='hidden' value='". $row['id']."' name='pid'>
                                                            </div>
                                                          </form>
                                                        </div>
                                                    </div>
                                                ";
                                                if($inc == 3) echo "</div>";
                                            }
                                            if($inc == 1) echo "<div class='col-sm-6 col-md-6 col-lg-4 col-xl-4'></div><div class='col-sm-6 col-md-6 col-lg-4 col-xl-4'></div></div>"; 
                                            if($inc == 2) echo "<div class='col-sm-6 col-md-6 col-lg-4 col-xl-4'></div></div>";
                                        }
                                        catch(PDOException $e){
                                            echo "There is some problem in connection: " . $e->getMessage();
                                        }

                                        $pdo->close();

                                    ?> 
                                </div>
                                <!-- End grid view area -->
                                <!-- Start list view area -->
                                <div role="tabpanel" class="tab-pane fade" id="list-view">
                                    <div class="list-view-box">
                                        <?php
                            
                                            $conn = $pdo->open();

                                            try{
                                                $inc = 3;	
                                                $stmt = $conn->prepare("SELECT * FROM products ORDER BY id DESC");
                                                $stmt->execute();
                                                foreach ($stmt as $row) {
                                                    $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
                                                    $inc = ($inc == 3) ? 1 : $inc + 1;
                                                    if($inc == 1) echo "<div class='row'>";
                                                    echo "
                                                        <div class='col-sm-6 col-md-6 col-lg-4 col-xl-4'>
                                                            <div class='products-single fix'>
                                                                <div class='box-img-hover'>
                                                                    <div class='type-lb'>
                                                                        <p class='".$row['status']."'>".$row['status']."</p>
                                                                    </div>
                                                                    <img src='".$image."' style='height:220px;width:340px;' class='img-fluid' alt='Image'>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class='col-sm-6 col-md-6 col-lg-8 col-xl-8'>
                                                            <div class='why-text full-width'>
                                                                <h4><a href='product.php?product=".$row['slug']."'></a> ".$row['name']." ( ".$row['type']." )</h4>
                                                                <h5> &#82;&#87;&#70; ".$row['price']."</h5><input type='hidden' value='". $row['id']."' name='pid'>
                                                                <p>".$row['description']."</p>
                                                                <a class='btn hvr-hover' href='shop-detail.php?product=".$row['slug']."'> Select for Cart</a>
                                                            </div>
                                                        </div>
                                                    ";
                                                    if($inc == 3) echo "</div>";
                                                }
                                                if($inc == 1) echo "<div class='col-sm-6 col-md-6 col-lg-4 col-xl-4'></div><div class='col-sm-6 col-md-6 col-lg-4 col-xl-4'></div></div>"; 
                                                if($inc == 2) echo "<div class='col-sm-6 col-md-6 col-lg-4 col-xl-4'></div></div>";
                                            }
                                            catch(PDOException $e){
                                                echo "There is some problem in connection: " . $e->getMessage();
                                            }

                                            $pdo->close();

                                        ?> 
                                    </div>
                                </div>
                                <!-- End list view area -->
                            </div>
                        </div>
                        
                        <!-- End product-categorie-box -->
                    </div>
                </div>
				<div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                        <div class="search-product">
                            <form action="#">
                                <input class="form-control" placeholder="Search here..." type="text">
                                <button type="submit"> <i class="fa fa-search"></i> </button>
                            </form>
                        </div>
                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Categories</h3>
                            </div>
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                                <div class="list-group-collapse sub-men">
                                    <?php
             
                                        $conn = $pdo->open();
                                        try{
                                        $stmt = $conn->prepare("SELECT * FROM category");
                                        $stmt->execute();
                                        $ct=1;
                                        foreach($stmt as $row){
                                            $catid=$row['id'];
                                            echo "
                                            <a class='list-group-item list-group-item-action' href='#sub-men".$ct."' data-toggle='collapse' aria-expanded='true' aria-controls='sub-men1'>
                                                ".$row['catname']." <small class='text-muted'>
                                                ";
                                                $conn2 = $pdo->open();

                                                try{	
                                                    $stmt2 = $conn2->prepare("SELECT COUNT(*) FROM products WHERE products.category_id=:catid");
                                                    $stmt2->execute(['catid'=>$catid]);
                                                    foreach ($stmt2 as $row2) {
                                                        echo "(".$row2['COUNT(*)'].")";
                                                    }
                                                    }
                                                    catch(PDOException $e){
                                                        echo "There is some problem in connection: " . $e->getMessage();
                                                    }
            
                                                    $pdo->close();
                                                    echo "</small>
                                             </a>";   
                                             echo "                                    
                                             <div class='collapse' id='sub-men".$ct."' data-parent='#list-group-men'>
                                                 <div class='list-group'>";
                                                 $conn3 = $pdo->open();
 
                                                 try{	
                                                     $stmt3 = $conn3->prepare("SELECT * FROM products WHERE products.category_id=:catid");
                                                     $stmt3->execute(['catid'=>$catid]);
                                                     foreach ($stmt3 as $row3) {
                                                         echo "<a href='#' class='list-group-item list-group-item-action'>
                                                            ".$row3['name']." <small class='text-muted'></small></a>";
                                                     }
                                                     }
                                                     catch(PDOException $e){
                                                         echo "There is some problem in connection: " . $e->getMessage();
                                                     }
             
                                                     $pdo->close();
                                                     
                                                     echo " </div>
                                             </div>";  
                                             $ct++;            
                                        }
                                        }
                                        catch(PDOException $e){
                                        echo "There is some problem in connection: " . $e->getMessage();
                                        }

                                        $pdo->close();

                                    ?>
                                </div>
                                <!-- <a href="#" class="list-group-item list-group-item-action"> Grocery  <small class="text-muted">(150) </small></a>
                                <a href="#" class="list-group-item list-group-item-action"> Grocery <small class="text-muted">(11)</small></a>
                                <a href="#" class="list-group-item list-group-item-action"> Grocery <small class="text-muted">(22)</small></a> -->
                            </div>
                        </div>
                        <div class="filter-price-left">
                            <!-- <div class="title-left">
                                <h3>Price</h3>
                            </div>
                            <div class="price-box-slider">
                                <div id="slider-range"></div>
                                <p>
                                    <input type="text" id="amount" readonly style="border:0; color:#fbb714; font-weight:bold;">
                                    <button class="btn hvr-hover" type="submit">Filter</button>
                                </p>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->

    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-01.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-02.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-03.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-04.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-06.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-07.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-08.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-09.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Instagram Feed  -->


    <!-- Start Footer  -->
    <footer>
        <div class="footer-main">
            <div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="footer-top-box">
							<h3>Business Time</h3>
							<ul class="list-time">
								<li>Monday - Friday: 08.00am to 05.00pm</li> <li>Saturday: 10.00am to 08.00pm</li> <li>Sunday: <span>Closed</span></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="footer-top-box">
							<!-- <h3>Newsletter</h3>
							<form class="newsletter-box">
								<div class="form-group">
									<input class="" type="email" name="Email" placeholder="Email Address*" />
									<i class="fa fa-envelope"></i>
								</div>
								<button class="btn hvr-hover" type="submit">Submit</button>
							</form> -->
						</div>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="footer-top-box">
							<h3>Social Media</h3>
							<p>Find Us via.</p>
							<ul>
                                <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                            </ul>
						</div>
					</div>
				</div>
				<hr>
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h4>About UMUHUZA</h4>
                            <p>Umuhuza EAB started in the evolution of technology iindustry in east african and all over the earth, the rising of this technology is leading to the virtual Job creation</p> 
							<p>That is why UMUHUZA started to bring any possible way a person can buy a product while is home or other none mentioned places inside the country. </p> 							
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link">
                            <h4>Information</h4>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Customer Service</a></li>
                                <li><a href="#">Our Sitemap</a></li>
                                <li><a href="#">Terms &amp; Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Delivery Information</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>Contact Us</h4>
                            <ul>
                                <li>
                                    <p><i class="fas fa-map-marker-alt"></i>Address: Musanze  <br>kisiramu Street Kamashashi,<br> KS 67213 </p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+1-888705770">+250 787 489 460</a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope"></i>Email: <a href="mailto:munyanezasam10@gmail.com">munyanezasam10@gmail.com</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">All Rights Reserved. &copy; 2021 <a href="#">M.M Project</a> 
    </div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>
    
    <!-- this helps to send the products value to the cart  -->
    <?php include 'includes/scripts.php'; ?>
    <!-- ALL JS FILES -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/jquery.superslides.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/inewsticker.js"></script>
    <script src="js/bootsnav.js."></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/baguetteBox.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>