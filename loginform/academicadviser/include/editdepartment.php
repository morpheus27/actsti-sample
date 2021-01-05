<?php 
include("connection.php");

 if (isset($_POST['updatedata'])) {

 $id = $_POST['update_id'];
 $editdepartment = $_POST['editdepartment'];
 $editdepartmentcode = $_POST['editdepartmentcode'];

 $query = "UPDATE tbldepartment SET department = '$editdepartment', departmentcode = '$editdepartmentcode' WHERE id = '$id'";
 $data = mysqli_query($conn, $query);

 if($data) 
	{
		//echo "<script>alert('Insert Data Sucessfully!'); window.location.href='studentpropose.php';</script>";
		echo "<script>alert('Update Data Sucessfully!'); window.location.href='updatedepartment.php';</script>";
	}
	else 
	{
		echo "<script>alert('Data is already created!'); window.location.href='updatedepartment.php';</script>";
	}
}
?>