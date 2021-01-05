<?php
include("connection.php");
if(isset($_POST['update']))
{
$id = $_POST['id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$cpnumber = $_POST['cpnumber'];
$address = $_POST['address'];




$query = "UPDATE csgname set firstname = '$firstname', lastname = '$lastname',  cpnumber = '$cpnumber', address = '$address' WHERE id = '$id'";
$data = mysqli_query($conn, $query);

	if($data) {
		echo "<script>alert('Your Account Information Successfully Updated!'); window.location.href='../academicofficer/academicofficer-profile.php';</script>";
  	} else {
		echo "<script>alert('Something went wrong. Please try again!'); window.location.href='academicofficer-profile.php';</script>";
	  }
 }
?>