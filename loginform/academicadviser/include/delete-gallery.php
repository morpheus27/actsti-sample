<?php
include("connection.php");

	if (isset($_POST['removedata'])) {
		
		$id = $_POST['remove_id'];

		$query = "DELETE FROM gallery WHERE  id ='$id'";
		$data = mysqli_query($conn, $query);

		if ($data) {
			echo "<script>alert('Record deleted successfully!'); window.location.href='gallery.php';</script>";
		}
		else {
			echo "<script>alert('Something went wrong. Please try again!'); window.location.href='gallery.php';</script>";
		}
	}

?>