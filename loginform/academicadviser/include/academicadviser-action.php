<?php
include("connection.php");

if (isset($_POST['update'])) {

	$id = $_POST['id'];
	$department = $_POST['department'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$mobilenumber = $_POST['mobilenumber'];
	$confirmpassword = $_POST['confirmpassword'];

	$query = "UPDATE csgname SET department = '$department', firstname = '$firstname', lastname = '$lastname', cpnumber = '$mobilenumber', password = '$confirmpassword' WHERE id = '$id'";

	$data = mysqli_query($conn, $query);

	if ($data) {
		echo "<script>alert('Data Updated Sucessfully!'); window.location.href='updatemem.php';</script>";
	}
	else {
		echo "<script>alert('Something went wrong, Please try again!'); window.location.href='updatemem.php';</script>";
	}
}

?>