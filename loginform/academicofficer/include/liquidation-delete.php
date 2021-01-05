<?php
include("connection.php");

	if (isset($_POST['removedata'])) {
		
		$id = $_POST['remove_id'];

		$query = "DELETE FROM academicofficerliquidation WHERE  id ='$id'";
		$data = mysqli_query($conn, $query);

		if ($data) {
			echo "<script>alert('Data has been successfully deleted!'); window.location.href='academicofficer-liquidation.php';</script>";
		}
		else {
			echo "<script>alert('Something went wrong. Please try again!'); window.location.href='academicofficer-liquidation.php';</script>";
		}
	}

?>