<?php 
include("connection.php");

if (isset($_POST['eventtitle'])) {
	
	$title= $_POST['eventtitle'];
	$query = "SELECT * FROM csgliquidation WHERE eventtitle = '$title'";
	$result = mysqli_query($conn, $query);
	$data = mysqli_num_rows($result);

	if ($data > 0) {
		echo 'false';
	} else {
		echo 'true';
	}
  }
?>