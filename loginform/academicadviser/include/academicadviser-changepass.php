<?php
include('connection.php'); 
	
	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$oldpwd = $_POST['oldpassword'];
		$newpwd = $_POST['newpassword'];
		$confirmpwd = $_POST['confirmpassword'];
 
		$query = "SELECT password FROM csgname WHERE id = '$id'";
		$data = mysqli_query($conn, $query);

		while ($row = mysqli_fetch_array($data)) {
			$pass = $row['password'];

			if ($pass == $oldpwd) {
					
				if ($newpwd == $confirmpwd) {
					 
					 $res = "UPDATE csgname SET password = '$confirmpwd' WHERE id = '$id'";
					 $update = mysqli_query($conn, $res);

					 if ($update) {
					 	//echo "<script>alert('Your password successfully change')</script>";
					 	echo "<script>alert('Your password has been successfully changed'); window.location.href='logout.php';</script>";

					 } else {
					 echo "<script>alert('New and confirm password does not match!')</script>";
				  	 }

				} else {
					echo "<script>alert('New and confirm password does not match')</script>";
				}
			} else {
					echo "<script>alert('old password does not match!')</script>";
			}
		}
	}
?>