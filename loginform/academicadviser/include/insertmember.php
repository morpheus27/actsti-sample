<?php
include("connection.php");

if(isset($_POST['add']))
{
$csgid=$_POST['csgid'];
$username = $_POST['username'];
$firstname=$_POST['firstname'];
$lastname = $_POST['lastname'];
$department=$_POST['department'];
$usertype = $_POST['usertype'];     
$password=$_POST['password']; 
$mobilenumber=$_POST['mobilenumber'];
$selectbatch = $_POST['selectbatch'];
$batchyear = $_POST['batchyear']; 

$query = "INSERT INTO csgname (`csgid`,`username`,`firstname`,`lastname`,`usertype`,`password`,`department`,`cpnumber`,`selectbatch`,`batchyear`)
 VALUES ('$csgid','$username','$firstname','$lastname','$usertype','$password','$department','$mobilenumber', '$selectbatch', '$batchyear')";

$data = mysqli_query($conn, $query);

if($data)
{
   echo "<script>alert('Registered Sucessfully!'); window.location.href='addmem.php';</script>";
}

{
	echo "<script>alert('Something went wrong. Please try again!'); window.location.href='addmem.php';</script>";
}
}

?>