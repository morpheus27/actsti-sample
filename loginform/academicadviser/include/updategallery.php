<?php
include("connection.php");
if(isset($_POST['updategallery']))
{
$id = $_POST['update_id'];
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

//$query = "UPDATE csgname SET firstname = '.firstname.', lastname = '.$lastname.', email = '.$email.', password = '.$password.'  WHERE email = '.$.'";
$query = "UPDATE gallery set firstname = '$firstname', lastname = '$lastname', position = '$position', file = '$file' WHERE id = '$id'";
$data = mysqli_query($conn, $query);

if ($data) {
			echo "<script>alert('Updated successfully!'); window.location.href='gallery.php';</script>";
		}
		else {
			echo "<script>alert('Something went wrong. Please try again!');  window.location.href='gallery.php';</script>";
		}
	}
?>