<?php 
include("connection.php");

if (isset($_POST['departmentcode'])) {
	
	$departmentcode = $_POST['departmentcode'];
	$query = "SELECT * FROM tbldepartment WHERE departmentcode = '$departmentcode'";
	$result = mysqli_query($conn, $query);
	$data = mysqli_num_rows($result);

	if ($data > 0) {
		echo 'false';
	} else {
		echo 'true';
	}
  }
?>