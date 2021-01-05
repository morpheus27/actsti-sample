<?php
include("connection.php");
if(isset($_POST['insertphoto']))
{

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$position = $_POST['position'];
$file=$_FILES["file"]["name"];
	$tmp_name=$_FILES["file"]["tmp_name"];
	$path="../academicadviser/csgphotos/".$file;
	$file1=explode(".",$file);
	$ext=$file1[1];
	$allowed=array("jpg","png", "bmp", "JPG" , "jpeg", "JPEG","BMP" ,"gif","GIF");
	if(in_array($ext,$allowed))
    {
	move_uploaded_file($tmp_name,$path);
	}

$query = "INSERT INTO gallery (`firstname`,`lastname`,`position`,`file`)
 VALUES ('$firstname','$lastname','$position','$file')";

$data = mysqli_query($conn, $query);

if($data)
{
   echo "<script>alert('Insert Data Sucessfully!'); window.location.href='gallery.php';</script>";
}

{
	echo "<script>alert('Something went wrong. Please try again!'); window.location.href='gallery.php';</script>";
}
}

?>