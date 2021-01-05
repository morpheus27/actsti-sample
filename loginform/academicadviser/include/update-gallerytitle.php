<?php
include("connection.php");
if(isset($_POST['updatetitle']))
{
$id = $_POST['id'];
$title = $_POST['title'];

//$query = "UPDATE csgname SET firstname = '.firstname.', lastname = '.$lastname.', email = '.$email.', password = '.$password.'  WHERE email = '.$.'";
$query = "UPDATE gallerytitle set title = '$title' WHERE id = '$id'";
$data = mysqli_query($conn, $query);

if ($data) {
			echo "<script>alert('Updated successfully!'); window.location.href='gallery-title.php';</script>";
		}
		else {
			echo "<script>alert('Something went wrong, Please try again!'); window.location.href='gallery-title.php';</script>";
		}
	}
?>