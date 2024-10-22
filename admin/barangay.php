
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
	
	$regionid=$_POST['regionid'];
	$city = $_POST['cityid1'];
	$brgy  = $_POST['brgy'];
	$shiprate = $_POST['rate'];

$sql=mysqli_query($con,"insert into barangay(barangay,shiprate,regionid,cityid) values('$brgy','$shiprate','$regionid','$city')");
$_SESSION['msg']="Inserted Successfully !!";

}
if(isset($_POST['save']))
{
	$brgyid = 	$_POST['brgyid'];
	$brgy  = $_POST['brgy'];
	$cityid = $_POST['cityid1'];
	$regionid=$_POST['regionid'];
	$shiprate = $_POST['rate'];

$sql=mysqli_query($con,"update barangay set barangay='$brgy', regionid='$regionid', cityid='$cityid',shiprate='$shiprate' where brgyid='$brgyid' ");
$_SESSION['msg']="Successfully updated !!";
echo "<script>alert('Successfully Updated.');
window.location.href='barangay.php';
</script>";
}
if(isset($_GET['del']))
{
	$brgyid = 	$_GET['brgyid'];

mysqli_query($con,"delete from barangay where brgyid='$brgyid'");
$_SESSION['msg']="Successfully removed!!";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Add Barangay</title>
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
<script type="text/javascript">
	function region(){
		var regionid = $('#regionid').val();

		$.ajax({
			type: "GET",
			url: "getcity.php",
			data:'regionid='+regionid,
			success: function(data){
				$('#city').html(data);
			}
			});
	}
	function city(){

		var cityid = $('#cityid').val();

		$("#cityid1").val(cityid);
		// $.ajax({
		// 	type: "GET",
		// 	url: "getcity.php",
		// 	data:'regionid='+regionid,
		// 	success: function(data){
		// 		$('#city').html(data);
		// 	}
		// 	});
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
								<h3>Add Barangay</h3>
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
											<input type="hidden" name="brgyid" value="<?php echo $_GET['brgyid']?>">
											<div class="control-group">
												<label class="control-label" for="basicinput">Select Region</label>
											<div class="controls">
												<select name="regionid" id="regionid" onchange="region()">
													<option></option>
													<?php
													$query = mysqli_query($con, "select * from region order by region asc");
													while($row=mysqli_fetch_array($query)){ ?>
													<option value="<?php echo $row["regionid"]?>"><?php echo $row["region"]?></option>
													<?php } ?>	
												</select>
											</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="basicinput">City</label>
											
											<div class="controls">
												<input type="hidden" name="cityid1" id="cityid1">
												<div id="city">
													<select></select>	
												</div>
											</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="basicinput">Barangay</label>
											<div class="controls">
												<input type="text"    name="brgy"  placeholder="Barangay" class="span8 tip" required>
											</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="basicinput">Shipping Rate</label>
											<div class="controls">
												<input type="text"    name="rate"  placeholder="Shipping Rate" class="span8 tip" required>
											</div>
											</div>
											<div class="control-group">
												<div class="controls">
													<button type="submit" name="save" class="btn">Save</button>
												</div>
											</div>
									</form>
									<?php }else{ ?>
									<form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">
											<div class="control-group">
												<label class="control-label" for="basicinput">Select Region</label>
											<div class="controls">
												<select name="regionid" id="regionid" onchange="region()">
													<option></option>
													<?php
													$query = mysqli_query($con, "select * from region order by region asc");
													while($row=mysqli_fetch_array($query)){ ?>
													<option value="<?php echo $row["regionid"]?>"><?php echo $row["region"]?></option>
													<?php } ?>	
												</select>
											</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="basicinput">City</label>
											
											<div class="controls">
												<input type="hidden" name="cityid1" id="cityid1">
												<div id="city">

													<select></select>
												</div>
											</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="basicinput">Barangay</label>
											<div class="controls">
												<input type="text"    name="brgy"  placeholder="Barangay" class="span8 tip" required>
											</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="basicinput">Shipping Rate</label>
											<div class="controls">
												<input type="text"    name="rate"  placeholder="Shipping Rate" class="span8 tip" required>
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
											<th>Barangay</th>
											<th>City</th>
											<th>Region</th>
											<th>Shipping Rate</th>
											<th>Action</th>
										
										</tr>
									</thead>
									<tbody>
									<?php
									$query = mysqli_query($con, "select * from barangay a left join region b on a.regionid=b.regionid left join city c on a.cityid=c.cityid");
									while($row=mysqli_fetch_array($query)){ ?>
										<tr>
											<td><?php echo $row["barangay"]?></td>
											<td><?php echo $row["cityname"]?></td>
											<td><?php echo $row["region"]?></td>
											<td><?php echo $row["shiprate"]?></td>
											<td><a href="barangay.php?del=true&brgyid=<?php echo $row['brgyid']?>" onclick="return confirm('Are you sure you want to remove this?')">Remove</td>
											<td><a href="barangay.php?update=true&brgyid=<?php echo $row['brgyid']?>">Update</td>
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