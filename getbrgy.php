<select name="brgyid" id="brgyid" onchange="brgy()" required="">
<option>select barangay</option>
<?php
include('includes/config.php');
if(isset($_GET['cityid'])){
	$cityid = $_GET['cityid'];
	$regionid = $_GET['regionid'];
	$query = mysqli_query($con, "select * from barangay where regionid='$regionid' or cityid='$cityid'");
	while($row=mysqli_fetch_array($query)){ ?>	
		<option value="<?php echo $row["brgyid"];?>"><?php echo $row["barangay"];?></option>
	<?php }
}
?>
</select>