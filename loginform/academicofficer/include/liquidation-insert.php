<?php
include("connection.php");

if (isset($_POST['insertdata'])) {
	
	$empid=$_SESSION['ao'];
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

	

	$query = "INSERT INTO academicofficerliquidation (`eventdate`,`eventtitle`,`confirmbudget`,`totalcost`,`file`,`empid`) 
	VALUES('$eventdate','$eventTitle','$confirmbudget','$overallcost','$file','$empid')";
	$data = mysqli_query($conn, $query);


	if($data) 	
	{
		echo "<script>alert('Insert Data Sucessfully!'); window.location.href='academicofficer-liquidation.php';</script>";
	}
	else 
	{
		echo "<script>alert('Something went wrong. Please try again!'); window.location.href='academicofficer-liquidation.php';</script>";
	}
}
?>