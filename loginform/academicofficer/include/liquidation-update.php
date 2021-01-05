<?php 
include("connection.php");

if (isset($_POST['updatedata'])) {

	$id = $_POST['update_id'];
	$eventdate = $_POST['eventdate'];
	$eventTitle = $_POST['eventtitle'];
	$overallcost = str_replace(',','', $_POST['overallcost']);
	$confirmbudget = str_replace(',','', $_POST['confirmbudget']);
	$file=$_FILES["file"]["name"];
	$tmp_name=$_FILES["file"]["tmp_name"];
	$path="../academicadviser/academicofficerliquidation/".$file;
	$file1=explode(".",$file);
	$ext=$file1[1];
	$allowed=array("jpg","png","gif","pdf","wmv","pdf","zip","rar","docx","txt");
	if(in_array($ext,$allowed))
    {
	move_uploaded_file($tmp_name,$path);
	}

 $query = "UPDATE academicofficerliquidation SET eventdate = '$eventdate', eventtitle = '$eventTitle', totalcost = '$overallcost', confirmbudget = '$confirmbudget', file = '$file' WHERE id = '$id'";
 $data = mysqli_query($conn, $query);

 if($data) 
	{
		echo "<script>alert('Data Sucessfully Changed!'); window.location.href='academicofficer-liquidation.php';</script>";
	}
	else 
	{
		echo "<script>alert('Something went wrong. Please try again!'); window.location.href='academicofficer-liquidation.php';</script>";
	}
}
?>