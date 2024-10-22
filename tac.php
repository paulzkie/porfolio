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

	    <title>|Terms and Conditions</title>

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
				
				<h1>Terms and Conditions</h1>

				
			</div>

			<div class="col-xs-12 col-sm-12 col-md-12 about">
				
				<h4>The Website</h4>


				<p>
					<span>
						1.This page, together with the other documents referred to on it, tells you the terms and conditions (the “Terms”) through which you may make use of our website: www.bulaonhandicrafts.com (the “Website” or “Site”) whether as a guest or as a registered user. Please read these Terms carefully before ordering any Products from the Site. By using the Website, you indicate that you accept these Terms and that you agree to abide by them.
					</span>
				</p>
				<p>
					<span>
						2.We can be reached via e-mail at bulaonhandicrafts@gmail.com and through mobile numbers 0942550804.
					</span>
				</p>
				<p>
					<span>
						3.	The prices of the products via our website may vary from our company’s existing and physical stores, which, in turn, may independently implement promotional campaigns and activities to improve sales to cover its respective operating costs and expenses. The company shall not be held liable for any price difference of the products between our website and our physical stores.
					</span>
				</p>

				<p>
					<span>
						4.	We reserve the right to change these Terms at any time without notice to you by posting changes online. You are responsible for regularly reviewing information posted online to obtain timely notice of such changes. Your continued use of the Website after changes are posted constitutes your acceptance of the amended Terms.
					</span>
				</p>

				<p>
					<span>
						5.	You are responsible for all access to the Website through your Internet connection and for bringing these Terms to the attention of all such persons.
					</span>
				</p>
					
			</div>

					<div class="col-xs-12 col-sm-12 col-md-12 about">
				
				<h4>Registration for the service</h4>


				<p>
					<span>
						1.	If you would like to submit an order to the Website to purchase any of the products, listed on the Website, you will need to choose first the item/items that you are interested in. Upon finalizing your order, you will need to proceed to Check-Out for the creation of an account or for Registration purposes.
					</span>
				</p>
				<p>
					<span>
						2.	Our Registration will require personal information such as your complete name, billing and delivery addresses, email address, and contact number(s).
					</span>
				</p>
				<p>
					<span>
						3.	Once you have completed the personal details that are necessary in our Registration, you will be asked to create an account, wherein you will need to provide a username and password.
					</span>
				</p>

				<p>
					<span>
						4.	Our Check-Out will show your personal account including your chosen item(s) with the corresponding price(s) and shipping costs.
					</span>
				</p>

				<p>
					<span>
						5.	Creating your personal account will provide easy access every time you want to make a purchase through our website. You must ensure the confidentiality and protection of your password. Immediately notify us if any unauthorized third party becomes aware of your password or if there is any unauthorized use of your email address or your Account, for security purposes.
					</span>
				</p>
					
			</div>

			<div class="col-xs-12 col-sm-12 col-md-12 about">
				
				<h4>Ordering and Payment</h4>


				<p>
					<span>
						1.	As a registered client, you agree that our company shall not be held liable for any price difference between the products via our website and products available from our existing physical stores.
					</span>
				</p>
				<p>
					<span>
						2.	As registered client, you have the option to select products from the different categories for single purchase or bulk purchase.
					</span>
				</p>
				<p>
					<span>
						3.	Inquiries on bulk orders shall be directed to our physical stores through our Sales Executives or can be e-mailed to bulaonhandicrafts@gmail.com or mobile nos. 0942550804.
					</span>
				</p>

				<p>
					<span>
						4.	As a registered client, you have the option to create an account, which will require a personal username and password. This mechanism will ensure easy access to your next transaction.
					</span>
				</p>

				<p>
					<span>
						5.	All sales transactions are considered official if and only if it has been processed through this Site.
					</span>
				</p>
				<p>
					<span>
						6.	As of now payment for online purchases shall be subjected to verification thru cash on delivery basis. A confirmation notice will be sent to you once the payment is settled.
				</p>
				<p>
					<span>
					7.	Confirmation of order is within 24 hours. Should the client place the order during a weekend, the Confirmation of order shall take place on the succeeding business day—that is, Monday.
					</span>
				</p>
				<p>
					<span>
						8.	If you discover that there is an error in your Order after it has been submitted via the Site, please contact our Customer Service Agent immediately at bulaonhandicrafts@gmail.com  However, this measure will not guarantee that we will be able to make the necessary change in your Order in accordance with your instructions.
					</span>
				</p>
					
			</div>

			<div class="col-xs-12 col-sm-12 col-md-12 about">
				
				<h4>Delivery of Items</h4>


				<p>
					<span>
						1.	All items will be delivered through LBC. Below are the transit time for your reference.
					</span>
				</p>
				<p>
					<span>
						1 to 3 days – Metro Manila
					</span>
				</p>
				<p>
					<span>
						2 to 7 days – Outside Metro Manila
					</span>
				</p>

				<p>
					<span>
						(Note : Items will be delivered after your payment has been credited to our account).
.
					</span>
				</p>

		
					
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 about">
				
				<h4>Promotional Discounts</h4>


				<p>
					<span>
						1.	The company’s Promotional Discount are not valid to purchase products from our Website.
				</p>
				
					
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 about">
				
				<h4>Damaged item(s) upon delivery</h4>


				<p>
					<span>
						1.	If the items were delivered with damage (ie, broken, with stain, and with scratch), this incident must be reported within 24 hours.
					</span>
				</p>
				<p>
					<span>
						2.	Photos of the damaged item(s) should be forwarded to our Customer Service Agent through email address: bulaonhandicrafts@gmail.com, within 24 hours.
					</span>
				</p>
				
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 about">
				
				<h4>Refund of Items</h4>


				<p>
					<span>
						1.	Refund of payment is not acceptable
					</span>
				</p>
				
		
		
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