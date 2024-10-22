<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit'])){
		if(!empty($_SESSION['cart'])){
		foreach($_POST['quantity'] as $key => $val){
			if($val==0){
				unset($_SESSION['cart'][$key]);
			}else{
				$_SESSION['cart'][$key]['quantity']=$val;
				
			}
		}
			echo "<script>alert('Your Cart hasbeen Updated');</script>";
		}
	}
// Code for Remove a Product from Cart
if(isset($_POST['remove_code']))
	{

if(!empty($_SESSION['cart'])){
		foreach($_POST['remove_code'] as $key){
			
				unset($_SESSION['cart'][$key]);
		}
			echo "<script>alert('Your Cart has been Updated');</script>";
	}
}
// code for insert product in order table


if(isset($_POST['ordersubmit'])) 
{
	
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{

	$quantity=$_POST['quantity'];
	$pdd=$_SESSION['pid'];
	$value=array_combine($pdd,$quantity);
	$shipadd = $_POST["cartshipadd"];
	$shipcity = $_POST["cartshipcity"];
	$billadd = $_POST["cartbillingadd"];
	$billcity = $_POST["cartbillingcity"];

		foreach($value as $qty=> $val34){
$query=mysqli_query($con,"select * from products where id='$qty'");
$result=mysqli_fetch_array($query);

if($result['quantity']>=$val34){
mysqli_query($con,"update  products set  quantity = quantity-".$val34." where id='$qty'");
mysqli_query($con,"insert into orders(userId,productId,quantity,shipaddress,shipcity,billaddress,billcity) values('".$_SESSION['id']."','$qty','$val34','$shipadd','$shipcity','$billadd','$billcity')");
mysqli_query($con,"update orders set 	paymentMethod='COD' where userId='".$_SESSION['id']."' and paymentMethod is null ");
		unset($_SESSION['cart']);
		echo "<script>
		alert('Successfully purchased the item(s).');
		window.location.href='order-history.php';
		</script>";	
		//header('location:order-history.php');

}else
echo "<script>alert('Stocks not Available');</script>";


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

	    <title>My Cart</title>
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/green.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

		<!-- Demo Purpose Only. Should be removed in production -->
		<link rel="stylesheet" href="assets/css/config.css">

		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<!-- Demo Purpose Only. Should be removed in production : END -->

		
		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!-- Fonts --> 
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/images/favicon.ico">

		<!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		<style type="text/css">
			/* The Modal (background) */
			.modal {
			  display: none; /* Hidden by default */
			  position: fixed; /* Stay in place */
			  z-index: 1; /* Sit on top */
			  padding-top: 100px; /* Location of the box */
			  left: 0;
			  top: 0;
			  width: 100%; /* Full width */
			  height: 100%; /* Full height */
			  overflow: auto; /* Enable scroll if needed */
			  background-color: rgb(0,0,0); /* Fallback color */
			  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
			}

			/* Modal Content */
			.modal-content {
			  background-color: #fefefe;
			  margin: auto;
			  padding: 20px;
			  border: 1px solid #888;
			  width: 80%;
			}

			/* The Close Button */
			.close {
			  color: #aaaaaa;
			  float: right;
			  font-size: 28px;
			  font-weight: bold;
			}

			.close:hover,
			.close:focus {
			  color: #000;
			  text-decoration: none;
			  cursor: pointer;
			}
		</style>
	</head>
    <body class="cnt-home">
	
		
	
		<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">
<?php include('includes/top-header.php');?>
<?php include('includes/main-header.php');?>
<?php include('includes/menu-bar.php');?>
</header>
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Shopping Cart</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<script type="text/javascript">
			function regions(){
				var regionid = $('#regionid').val();
				var cityid = $('#cityid').val();
				$.ajax({
					type: "GET",
					url: "getcity.php",
					data:'regionid='+regionid,
					success: function(data){
						$('#city').html(data);
					}
				});

				$.ajax({
					type: "GET",
					url: "getbrgy.php",
					data:'regionid='+regionid+'cityid='+cityid,
					success: function(data){
						$('#barangay').html(data);
					}
				});
			}

			function citys(){

				var cityid = $('#cityid').val();

				$("#cityid1").val(cityid);

				 $.ajax({
					type: "GET",
					url: "getbrgy.php",
					data:'cityid='+cityid,
					success: function(data){
						$('#barangay').html(data);
					}
				});
			}

			function brgy(){

				var brgyid = $('#brgyid').val();

				$("#brgyid1").val(brgyid);

				$.ajax({
					type: "GET",
					url: "getshiprate.php",
					data:'brgyid='+brgyid,
					success: function(data){
						alert(data);
						// $('#barangay').html(data);
					}
				});

			}

		</script>
<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row inner-bottom-sm">
			<div class="shopping-cart">
				<div class="col-md-12 col-sm-12 shopping-cart-table ">
	<div class="table-responsive">
<form name="cart" method="post">	
<?php
if(!empty($_SESSION['cart'])){
	?>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th class="cart-romove item">Remove</th>
					<th class="cart-description item">Image</th>
					<th class="cart-product-name item">Product Name</th>
					<th class="cart-product-name item">Available Stocks</th>
					<th class="cart-qty item">Quantity</th>
					<th class="cart-sub-total item">Price Per unit</th>
					<th class="cart-sub-total item">Shipping Charge</th>
					<th class="cart-total last-item">Grandtotal </th>
					<th class="cart-total last-item"><?php echo var_dump($_SESSION['pid']) ;echo "<br>";?></th>
				</tr>
			</thead><!-- /thead -->
			<tfoot>
				<tr>
					<td colspan="7">
						<div class="shopping-cart-btn">
							<span class="">
								<a href="index.php" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
								<input type="submit" name="submit" value="Update shopping cart" class="btn btn-upper btn-primary pull-right outer-right-xs">
							</span>
						</div><!-- /.shopping-cart-btn -->
					</td>
				</tr>
			</tfoot>
			<tbody>
 <?php
 $pdtid=array();
    $sql = "SELECT * FROM products WHERE id IN(";
			foreach($_SESSION['cart'] as $id => $value){
			$sql .=$id. ",";
			}
			$sql=substr($sql,0,-1) . ") ORDER BY id ASC";
			$query = mysqli_query($con,$sql);
			$totalprice=0;
			$totalqunty=0;
			if(!empty($query)){
			while($row = mysqli_fetch_array($query)){
				$quantity=$_SESSION['cart'][$row['id']]['quantity'];
				$subtotal= $_SESSION['cart'][$row['id']]['quantity']*$row['productPrice']+$row['shippingCharge'];
				$totalprice += $subtotal;
				$_SESSION['qnty']=$totalqunty+=$quantity;

				array_push($pdtid,$row['id']);
//print_r($_SESSION['pid'])=$pdtid;exit;
	?>

				<tr>
					<td class="romove-item"><input type="checkbox" name="remove_code[]" value="<?php echo htmlentities($row['id']);?>" /></td>
					<td class="cart-image">
						<a class="entry-thumbnail" href="detail.html">
						    <img src="admin/productimages/<?php echo $row['id'];?>/<?php echo $row['productImage1'];?>" alt="" width="114" height="146">
						</a>
					</td>
					<td class="cart-product-name-info">
						<h4 class='cart-product-description'><a href="product-details.php?pid=<?php echo htmlentities($pd=$row['id']);?>" ><?php echo $row['productName'];

$_SESSION['sid']=$pd;
						 ?></a></h4>
						
						
					</td>
					<td class="cart-product-name-quantity">
						<h4 class='cart-product-description' ><?php echo $row['quantity'];

$_SESSION['sid']=$pd;
						 ?></h4>
						
						
					</td>
					<td class="cart-product-quantity">
						<div class="quant-input">
				                <div class="arrows">
				                  <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
				                  <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
				                </div>
				             <input type="text" value="<?php echo $_SESSION['cart'][$row['id']]['quantity']; ?>" name="quantity[<?php echo $row['id']; ?>]">
				             
			              </div>
		            </td>
					<td class="cart-product-sub-total"><span class="cart-sub-total-price"><?php echo "PHP"." ".$row['productPrice']; ?>.00</span></td>
<td class="cart-product-sub-total"><span class="cart-sub-total-price"><?php echo "PHP"." ".$row['shippingCharge']; ?>.00</span></td>

					<td class="cart-product-grand-total"><span class="cart-grand-total-price"><?php echo ($_SESSION['cart'][$row['id']]['quantity']*$row['productPrice']+$row['shippingCharge']); ?>.00</span></td>
				</tr>

				<?php } }
$_SESSION['pid']=$pdtid;
				?>
				
			</tbody><!-- /tbody -->
		</table><!-- /table -->
		
	</div>
</div><!-- /.shopping-cart-table -->			

<div class="col-md-4 col-sm-12 estimate-ship-tax">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>
					<span class="estimate-title">Shipping Address</span>
				</th>
			</tr>
		</thead>
		<tbody>
				<tr>
					<td>
						<div class="form-group">
							<div class="row">
								<div class="row">
									<div class="col-sm-3">
									Select Region: 	
									</div> 
									<div class="col-sm-3">
										<select name="region" id="regionid" onchange="regions()">
											<?php
												$query = mysqli_query($con, "select * from region order by region asc");
													while($row=mysqli_fetch_array($query)){ ?>
														<option value="<?php echo $row["regionid"]?>"><?php echo $row["region"]?></option>
											<?php } ?>	
										</select>
									</div> 
								</div>
								<div class="row">
									<div class="col-sm-3">
									Select City: 	
									</div> 
									<div class="col-sm-3">
										<input type="hidden" name="cityid1" id="cityid1">
										<div id="city">
											<select class="select" name="region">
												<option>select region</option>
											</select>	
										</div>
									</div> 
								</div>
								<div class="row">
									<div class="col-sm-3">
									Select Barangay: 	
									</div> 
									<div class="col-sm-3">
										<input type="hidden" name="brgyid1" id="brgyid1">
										<div id="barangay">
											<select class="select" name="brgy">
												<option>select barangay</option>
											</select>	
										</div>
									</div> 
								</div>
								<div class="row">
									<div class="col-sm-3">
									Shipping Address: 	
									</div> 
									<div class="col-sm-3">
									<textarea name="cartshipadd"></textarea>	
									</div> 
								</div>
								<div class="row">
									<div class="col-sm-3">
									Contact No: 	
									</div> 
									<div class="col-sm-3">
									<input type="text" name="cartshipcity" maxlength="11" onkeypress="return isNumberKey(event)">	
									</div> 
								</div>
							</div>
						<!-- <?php $qry=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
while ($rt=mysqli_fetch_array($qry)) {
	echo htmlentities($rt['shippingAddress'])."<br />";
	echo htmlentities($rt['shippingCity'])."<br />";
	echo htmlentities($rt['shippingState']);
	echo htmlentities($rt['shippingPincode']);
}

						?> -->
		
						</div>
					
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
</div>
<div class="col-md-4 col-sm-12 cart-shopping-total">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>
					
					<div class="cart-grand-total">
						Grand Total<span class="inner-left-md"><?php echo $_SESSION['tp']="$totalprice". ".00"; ?></span>
					</div>
				</th>
			</tr>
		</thead><!-- /thead -->
		<tbody>
				<tr>
					<td>
						<div class="cart-checkout-btn pull-right">
							<button type="button" id="myBtn" class="btn btn-primary">PROCCED TO CHEKOUT</button>
							<!-- <button type="submit" name="ordersubmit" id="myBtn" class="btn btn-primary">PROCCED TO CHEKOUT</button> -->
						</div>
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table>

	<div id="myModal" class="modal">

		  <!-- Modal content -->
		  <div class="modal-content">
		    <span class="close">&times;</span>
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
			<div class="col-xs-12 col-sm-12 col-md-12 about ">
				<h4>Refund of Items</h4>
				<p>
					<span>
						1.	Refund of payment is not acceptable
					</span>
				</p>
			</div>
			<div class="col-xs-12 col-sm-8 col-md-10 about">
				<input type="checkbox" id="check" onClick="EnableSubmit(this)">&nbsp;I agree with terms and condition of bulaon handicraft.
				
			</div>
			<div class="col-sm-2">
				<input type="submit" value="CHECKOUT" id="checkout" disabled="" name="ordersubmit">
			</div>
		</div>
   </div>
		  </div>

	</div>	

	<?php } else {
echo "Your shopping Cart is empty";
		}?>
</div>			</div>
		</div> 
		</form>
		<big><b><div class="col-md-12 col-sm-12">
	<p>
					<span>
						We have set a limit on our shipping weight up to 10kgs only. For orders above 10kgs, kindly coordinate with our office for the shipping arrangements.
						
					</span>
				</p>
				<p>
					<span>
					
						You may contact us at 63-02-9629378 or e-mail them at bulaonhandicrafts@gmail.com
					</span>
				</p>
			</div></big><b>
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

	<!-- For demo purposes – can be removed on production -->
	
	<script src="switchstylesheet/switchstylesheet.js"></script>
	
	<script>
		function EnableSubmit(e){
				document.getElementById('checkout').disabled = false;
				document.getElementById('checkout').style.backgroundColor = "yellow";
		}
		// Get the modal
		var modal = document.getElementById('myModal');

		// Get the button that opens the modal
		var btn = document.getElementById("myBtn");

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

		// When the user clicks the button, open the modal 
		btn.onclick = function() {
		  modal.style.display = "block";
		}

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
		  modal.style.display = "none";
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		  if (event.target == modal) {
		    modal.style.display = "none";
		  }
		}


		function isNumberKey(evt){
		    var charCode = (evt.which) ? evt.which : event.keyCode
		    if (charCode > 31 && (charCode < 48 || charCode > 57))
		        return false;
		    return true;
		}

		function testInput(event) {
		   var value = String.fromCharCode(event.which);
		   var pattern = new RegExp(/[a-zåäö ]/i);
		   return pattern.test(value);
		}

		$('#letteronly').bind('keypress', testInput);
		$('#letteronly1').bind('keypress', testInput);

		$(document).ready(function(){ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>
	<!-- For demo purposes – can be removed on production : End -->
</body>
</html>