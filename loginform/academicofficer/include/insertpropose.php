<?php 
include("connection.php");

if (isset($_POST['insert'])) {

	$empid=$_SESSION['ao'];
	$ProjectType= $_POST['ProjectType'];
	$ToDate = $_POST['ToDate'];
	$FromDate = $_POST['FromDate'];
	$Description = $_POST['Description'];
	$Status=0;
	$IsRead=0;
	$budget = str_replace(',','',$_POST['budget']);
	$purpose = $_POST['purpose'];
	$manpower = $_POST['manpower'];
	$file=$_FILES["file"]["name"];
    $tmp_name=$_FILES["file"]["tmp_name"];
    $path="../academicadviser/uploadevents/".$file;
    $file1=explode(".",$file);
    $ext=$file1[1];
    $allowed=array("jpg","png","gif","pdf","wmv","pdf","zip","rar","docx","txt");

    if(in_array($ext,$allowed))
    {
	 move_uploaded_file($tmp_name,$path);
	}


	$query = "INSERT INTO tblprojects (`ProjectType`,`ToDate`,`FromDate`,`Description`,`Status`,`IsRead`,`empid`,`budget`,`purpose`,`manpower`,`file`) VALUES ('$ProjectType','$ToDate','$FromDate','$Description','$Status','$IsRead','$empid','$budget','$purpose', '$manpower','$file')";
	$data = mysqli_query($conn, $query);

	if($data) 
	{
		echo "<script>alert('Send Data Sucessfully!'); window.location.href='academicofficer-propose.php';</script>";
	}
	else 
	{
		echo "<script>alert('Something went wrong. Please try again!'); window.location.href='academicofficer-propose.php';</script>";
		
	}
}


?>