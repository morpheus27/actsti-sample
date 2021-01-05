<?php
include("connection.php");
if(isset($_POST['update']))
{
$id = $_POST['id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$cpnumber = $_POST['cpnumber'];
$address = $_POST['address'];


//$query = "UPDATE csgname SET firstname = '.firstname.', lastname = '.$lastname.', email = '.$email.', password = '.$password.'  WHERE email = '.$.'";
$query = "UPDATE csgname set firstname = '$firstname', lastname = '$lastname', cpnumber = '$cpnumber', address = '$address' WHERE id = '$id'";
$data = mysqli_query($conn, $query);

if ($data) {
			echo "<script>alert('Updated successfully!'); window.location.href='academicadviser-profile.php';</script>";
		}
		else {
			echo "<script>alert('Something went wrong, Please try again!');  window.location.href='academicadviser-profile.php';</script>";
		}
	}
?>