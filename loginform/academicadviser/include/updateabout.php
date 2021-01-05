<?php
include("connection.php");
if(isset($_POST['updateabout']))
{
$id = $_POST['id'];
$vision = $_POST['vision'];
$mission = $_POST['mission'];
 $file=$_FILES["file"]["name"];
	$tmp_name=$_FILES["file"]["tmp_name"];
	$path="../admin/homepage/".$file;
	$file1=explode(".",$file);
	$ext=$file1[1];
	$allowed=array("mp4","gif");
	if(in_array($ext,$allowed))
    {
	move_uploaded_file($tmp_name,$path);
	}

//$query = "UPDATE csgname SET firstname = '.firstname.', lastname = '.$lastname.', email = '.$email.', password = '.$password.'  WHERE email = '.$.'";
$query = "UPDATE aboutus set vision = '$vision', mission = '$mission', file = '$file' WHERE id = '$id'";
$data = mysqli_query($conn, $query);

if ($data) {
			echo "<script>alert('Updated successfully!'); window.location.href='aboutus.php';</script>";
		}
		else {
			echo "<script>alert('Update Failed!'); window.location.href='aboutus.php';</script>";
		}
	}
?>