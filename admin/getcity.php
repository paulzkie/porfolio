<select name="ciyid" id="cityid" onchange="city()" required="">
	<option></option>
<?php
include('include/config.php');
if(isset($_GET['regionid'])){
	$regionid = $_GET['regionid'];
	$query = mysqli_query($con, "select * from city where regionid='$regionid'");
	while($row=mysqli_fetch_array($query)){ ?>	
	    
		<option value="<?php echo $row["cityid"];?>"><?php echo $row["cityname"];?></option>
	<?php }
}
?>
</select>