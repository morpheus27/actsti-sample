<?php
include("connection.php");
if(isset($_POST['updatecondition']))
{
$id = $_POST['id'];
$condition = $_POST['condition'];

//$query = "UPDATE csgname SET firstname = '.firstname.', lastname = '.$lastname.', email = '.$email.', password = '.$password.'  WHERE email = '.$.'";
$query = "UPDATE termscondition set termscondition = '$condition' WHERE id = '$id'";
$data = mysqli_query($conn, $query);

if ($data) {
			echo "<script>alert('Updated successfully!'); window.location.href='termscondition.php';</script>";
		}
		else {
			echo "<script>alert('Update Failed!'); window.location.href='termscondition.php';</script>";
		}
	}
?>