<?php 
include("connection.php");

if (isset($_POST['department'])) {
	
	$department = $_POST['department'];
	$query = "SELECT * FROM tbldepartment WHERE department = '$department'";
	$result = mysqli_query($conn, $query);
	$data = mysqli_num_rows($result);

	if ($data > 0) {
		echo 'false';
	} else {
		echo 'true';
	}
  }
?>