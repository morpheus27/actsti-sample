<?php 
include("connection.php");

if (isset($_POST['username'])) {
	
	$username = $_POST['username'];
	$query = "SELECT * FROM csgname WHERE username = '$username'";
	$result = mysqli_query($conn, $query);
	$data = mysqli_num_rows($result);

	if ($data > 0) {
		echo 'false';
	} else {
		echo 'true';
	}
  }
?>