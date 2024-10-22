
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	
if(isset($_POST['submit']))
{
	$region=$_POST['region'];

$sql=mysqli_query($con,"insert into region(region) values('$region')");
$_SESSION['msg']="Inserted Successfully !!";

}
if(isset($_POST['save']))
{
	$regionid=$_POST['regionid'];
	$region=$_POST['region'];

$sql=mysqli_query($con,"update region set region='$region' where regionid='$regionid'");
$_SESSION['msg']="Successfully updated !!";
echo "<script>alert('Successfully Updated.');
window.location.href='region.php';
</script>";
}
if(isset($_GET['del']))
{
	$regionid=$_GET['regionid'];

mysqli_query($con,"delete from region where regionid='$regionid'");
$_SESSION['msg']="Successfully removed!!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Add Region</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
   <script>
function getSubcat(val) {
	$.ajax({
	type: "POST",
	url: "get_subcat.php",
	data:'cat_id='+val,
	success: function(data){
		$("#subcategory").html(data);
	}
	});
}
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
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
								<h3>Add Region</h3>
							</div>
							<div class="module-body">

									<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>


									<?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>

									<br />
									<?php
									if(isset($_GET["update"])){ ?>
									<form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">
											<div class="control-group">
												<label class="control-label" for="basicinput">Region</label>
											<div class="controls">
												<input type="text"    name="region"  placeholder="Region" class="span8 tip" required>
											</div>
											</div>
											<input type="hidden" name="regionid" value="<?php echo $_GET["regionid"]?>">
											<div class="control-group">
												<div class="controls">
													<button type="submit" name="save" class="btn">Save</button>
												</div>
											</div>
									</form>
									<?php }else{ ?>
									<form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">
											<div class="control-group">
												<label class="control-label" for="basicinput">Region</label>
											<div class="controls">
												<input type="text"    name="region"  placeholder="Region" class="span8 tip" required>
											</div>
											</div>

											<div class="control-group">
												<div class="controls">
													<button type="submit" name="submit" class="btn">Add</button>
												</div>
											</div>
									</form>
									<?php } ?>
									
							</div>
							<table cellpadding="0" cellspacing="0" border="0" class=" table table-bordered table-striped	 display" >
									<thead>
										<tr>
											<th>#</th>
											<th>Regions</th>
											<th>Action</th>
										
										</tr>
									</thead>
									<tbody>
									<?php
									$query = mysqli_query($con, "select * from region");
									while($row=mysqli_fetch_array($query)){ ?>
										<tr>
											<td><?php echo $row["regionid"]?></td>
											<td><?php echo $row["region"]?></td>
											<td><a href="region.php?del=true&regionid=<?php echo $row['regionid']?>" onclick="return confirm('Are you sure you want to remove this?')">Remove</td>
											<td><a href="region.php?update=true&regionid=<?php echo $row['regionid']?>">Update</td>
										</tr>
									<?php } ?>
										
									</tbody>
							</table>
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