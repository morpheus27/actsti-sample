<?php
include("connection.php");

	if (isset($_POST['removedata'])) {
		
		$id = $_POST['remove_id'];

		$query = "DELETE FROM tbldepartment WHERE  id ='$id'";
		$data = mysqli_query($conn, $query);

		if ($data) {
			echo "<script>alert('Record deleted successfully!'); window.location.href='updatedepartment.php';</script>";
		}
		else {
			echo "<script>alert('Record fail to delete !'); window.location.href='updatedepartment.php';</script>";
		}
	}

?>