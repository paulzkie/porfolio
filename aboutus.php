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

	    <title>|About Us</title>

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
				
				<h1>COMPANY BACKGROUND</h1>

				<p>
					<span>
						Bulaon Handicrafts previously known as In Excelsis Deo, established in 1994, is a small business enterprise manufacturing and retailing Home and Holiday decor and Novelty items originally to Metro Manila's household market only through leasing and participating trade exhibits in leading shopping mall. Greta Bulaon, a bank employee and a senior university student at that time, decided to leave her job and partner with a friend to start a business. A year later, seeing the business potential and a need for more capitalization. Greta invited her immediate family members to join the business.
					</span>
				</p>

				
					

				<p>
					<span>
						In February 1999, the company expanded into supplying novelty items to local exporters during non-peak season and in 2000 diversify into RTW children's wear and lady sleepwear, using the trade name Pink & Purple.
						Over the years, the company had grown from the initial 2 trade exhibit participation, to an average of 25 trade exhibition a year and 3 permanent stalls at SM Supermalls. Other than exporting its product to Japan, Singapore, Tahiti, and Macau the company also venture into supplying Holiday Decor and speciality gift wrapping accesories to  SM Department Store both in Metro Manila and in the province.
					</span>
				</p>

			</div>

			<div class="col-xs-12 col-sm-12 col-md-12 about">
				
				<h1>MISSION AND VISION STATEMENTS</h1>


				<p>
					<span>
						To become one of the best provider of highly differentiated quality of home and holiday decor and novelty items in yhe local and international market.
					</span>
				</p>
				<p>
					<span>
						To create products that will meet consumer utmost satisfaction.
					</span>
				</p>
				<p>
					<span>
						To extend service beyond customer expectation, to further enhance  consumer producer relationship.
					</span>
				</p>

				<p>
					<span>
						To continuouslys improve management strategy and procedure to provide quality work environment for both employees and associate.
					</span>
				</p>

				<p>
					<span>
						Improve business operation to contribute responsibly towardss nations economic growth.
					</span>
				</p>

				<p>
					<span>
						To maximize earnings from existing business and allocate capital towards growth and profiability.
					</span>
				</p>
					

			
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