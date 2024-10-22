
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Manila');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from products where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Product deleted !!";
		  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Manage Products</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript">
		function printContent(el){
		  var restorepage = document.body.innerHTML;
		  var printcontent = document.getElementById(el).innerHTML;
		  document.body.innerHTML = printcontent;
		  window.print();
		  document.body.innerHTML = restorepage;
		}

	$(document).ready(function(){
		var result = [];
		  $('table tr').each(function(){
		  	$('#total', this).each(function(index, val){
		    	if(!result[index]) result[index] = 0;
		      result[index] += parseInt($(val).text());
		    });
		  });
		  
		  $('table').append('<tr></tr>');
		  $(result).each(function(){
		  	$('table tr').last().append('<td colspan="6">Total</td><td>'+this+'</td>')
		  });
		});	
	</script>
</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>				
			<div class="span9">
					<div class="content">

	<div class="module">
							<div class="module-head">
								<h3>Delivered Report</h3>
							</div>
							<div class="module-body table">
	<?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
<?php } ?>

									<br />

								<button class="btn btn-info" id="print"  onclick="printContent('printing')">Print</button>
								<div id="printing">
									<h3>Delivered Report</h3>
								<table cellpadding="0" cellspacing="0" border="0" class=" table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th> Name</th>
											<th>Email /Contact no</th>
											<th>Shipping Address</th>
											<th>Product </th>
											<th>Order Date</th>
											<th>Qty </th>
											<th>Amount </th>
											
										</tr>
									</thead>
									<tbody>

<?php $query=mysqli_query($con,"select CONCAT(users.firstname,' ',users.lastname) AS username,users.email as useremail,users.contactno as usercontact,users.shippingAddress as shippingaddress,users.shippingCity as shippingcity,products.productName as productname,products.shippingCharge as shippingcharge,orders.quantity as quantity,orders.orderDate as orderdate,products.productPrice as productprice,stat,orderstatus,orders.id as id  from orders join users on  orders.userId=users.id join products on products.id=orders.productId where orders.orderStatus='Delivered'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>									
										<tr>
											<td><?php echo htmlentities($row['username']);?></td>
											<td><?php echo htmlentities($row['useremail']);?>/<?php echo htmlentities($row['usercontact']);?></td>
										
											<td><?php echo htmlentities($row['shippingaddress'].",".$row['shippingcity']);?></td>
											<td><?php echo htmlentities($row['productname']);?></td>
											<td><?php echo htmlentities($row['orderdate']);?></td>
											<td><?php echo htmlentities($row['quantity']);?></td>
											<td id="total"><?php echo htmlentities($row['quantity']*$row['productprice']+$row['shippingcharge']);?></td>		
										</tr>
										<?php $cnt=$cnt+1; } ?>
										
								</table>
							  </div>
							</div>
						</div>						

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

	

<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
<?php } ?>