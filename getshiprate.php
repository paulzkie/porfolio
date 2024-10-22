<?php
include('includes/config.php');
if(isset($_GET['brgyid'])){
	$brgyid = $_GET['brgyid'];
	$query = mysqli_query($con, "select * from barangay where brgyid='$brgyid'");
	while($row=mysqli_fetch_array($query)){ 
		echo $row["shiprate"];
	 }
	
}
?>