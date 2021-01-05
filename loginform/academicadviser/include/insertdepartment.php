<?php
include("connection.php");
if(isset($_POST['add']))
{

$department = $_POST['department'];
$departmentcode = $_POST['departmentcode'];

$query = "INSERT INTO tbldepartment (`department`,`departmentcode`)
 VALUES ('$department','$departmentcode')";

$data = mysqli_query($conn, $query);

if($data)
{
   echo "<script>alert('Insert Data Sucessfully!'); window.location.href='adddepartment.php';</script>";
}

{
	echo "<script>alert('Something went wrong. Please try again!'); window.location.href='adddepartment.php';</script>";
}
}

?>