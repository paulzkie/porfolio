<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
			header('location:index.php');
		}else{
			$message="Product ID is invalid";
		}
	}
}


?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>|FAQ's</title>

	    <!-- Bootstrap Core CSS -->
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    
	   
	    <!-- Customizable CSS -->
	     
	    <link rel="stylesheet" href="assets/css/main.css">
	   <link rel="stylesheet" href="assets/css/green.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

		<!-- Demo Purpose Only. Should be removed in production -->
		<link rel="stylesheet" href="assets/css/config.css">

		
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/images/favicon.ico">

		

	</head>
    <body class="cnt-home">
	
		
	
		<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">
<?php include('includes/top-header.php');?>
<?php include('includes/main-header.php');?>
<?php include('includes/menu-bar.php');?>
</header>


<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-xs" id="top-banner-and-menu">
	<div class="container">
		<div class="homepage-container">
		<div class="row">
		
			<div class="col-xs-12 col-sm-12 col-md-12 about">
				
				<h1>Frequently Asked Questions</h1>
				
				<div class="col-xs-6 col-sm-6 col-md-6">
				
				<h4>How Long Will I Wait For the Confirmation of My Order?</h4>

				<p>
					<span>
						Order(s) will be confirmed within 24 hours. However, items, which are ordered during the weekend, will be confirmed in the succeeding business day—that is, Monday. The site is closed during special and regular holidays.
					</span>
				</p>


			</div>

			<div class="col-xs-6 col-sm-6 col-md-6">
				
				<h4>How Long Will It Take To Get My Package?</h4>

				<p>
					<span>
						Upon receipt of the payment, the processing and delivery of your order will take about two (2) to three (3) working days for destination within Metro Manila, three (3) to seven (7) working days for destination outside Metro Manila.
					</span>
				</p>


			</div>

<div class="col-xs-6 col-sm-6 col-md-6">
				
				<h4>Do You Ship Internationally?</h4>

				<p>
					<span>
						No, we do not accept international shipments as of now especially in website right now. International orders shipping must shouldered by costumers. We will just drop by in specified area or location what they just ordered.
					</span>
				</p>


			</div>
			<div class="col-xs-6 col-sm-6 col-md-6">
				
				<h4>What Shipping Methods Are Available?</h4>

				<p>
					<span>
						As of now the website only have a cash on delivery payment method.
					</span>
				</p>


			</div>
			<div class="col-xs-6 col-sm-6 col-md-6">
				
				<h4>I do not stay in the house most of the time. Will you still deliver and leave my purchased item(s) even if I am not around?</h4>

				<p>
					<span>
						Yes, we will still deliver your purchased item(s). However, for security purposes, we will need an authorization letter from you as our client that you are allowing your relative, neighbor, or housemate to receive your package and the cash for payments.
					</span>
				</p>


			</div>
			<div class="col-xs-6 col-sm-6 col-md-6">
				
				<h4>Are you open on weekends and holidays?</h4>

				<p>
					<span>
						This Site is open and operates from Monday to Friday except during special or legal holidays. All orders, which have been placed during weekends, will be confirmed in the succeeding business day —that is, Monday.
					</span>
				</p>


			</div>
			<div class="col-xs-6 col-sm-6 col-md-6">
				
				<h4>Do you have a customer service number?</h4>

				<p>
					<span>
						You can directly reach us at cellphone nos. 0942550804 or at e-mail address: bulaonhandicrafts@gmail.com.
					</span>
				</p>


			</div>
		

			</div>

			
		</div>
		</div>
   </div>
</div>


<?php include('includes/footer.php');?>
	
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	
	<script src="assets/js/bootstrap.min.js"></script>
	
	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	
	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>

	

	

</body>
</html>