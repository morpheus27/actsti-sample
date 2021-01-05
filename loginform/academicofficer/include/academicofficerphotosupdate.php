<?php
include("connection.php");
if(isset($_POST['updatephoto'])) {

$id = $_POST['update_id'];
$file=$_FILES["file"]["name"];
	$tmp_name=$_FILES["file"]["tmp_name"];
	$path="../academicadviser/csg-profile-photos/".$file;
	$file1=explode(".",$file);
	$ext=$file1[1];
	$allowed=array("jpg","png", "bmp", "JPG" , "jpeg", "JPEG","BMP" ,"gif","GIF");
	if(in_array($ext,$allowed))
    {
	move_uploaded_file($tmp_name,$path);
	}

$query = "UPDATE csgname SET file = '$file' WHERE id = '$id'";
$data = mysqli_query($conn, $query);
if ($data) {
			echo "<script>alert('Photo Successfully Changed!'); window.location.href.split();</script>";
			// echo "<script>alert('Updated successfully!'); window.location.href.split('#')-1;</script>";
		}
		else {
			echo "<script>alert('Something went wrong. Please try again!');  window.location.href='index.php';</script>";
		}
}


?>