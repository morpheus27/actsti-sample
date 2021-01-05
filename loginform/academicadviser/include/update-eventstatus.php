<?php
session_start();
error_reporting(0);
include('connection.php');

if (isset($_POST['updateEventForm'])) 
{   
    $receive = 1;
    $ai = $_SESSION['ai'];
    $did = intval($_GET['eventid']);
    $description = $_POST['description'];
    $confirmbudget = str_replace(',','', $_POST['confirmbudget']);
    $status=$_POST['status'];
    date_default_timezone_set('Asia/Manila');
    $admremarkdate=date('F j, Y - g:i a');
    $query = "UPDATE tblprojects SET  receive = '$receive', AdminRemark = '$description', Status = '$status', confirmbudget = '$confirmbudget', 
    AdminRemarkDate = '$admremarkdate', adviserimage = '$ai' WHERE id = '$did'";
    $row = mysqli_query($conn, $query);
    $resulta = mysqli_fetch_array($row);

    if ($row) {
      echo "<script>alert('Updated successfully!'); window.location.href.split();</script>";
     }
    else { 
      echo "<script>alert('Something went wrong, Please try again!'); window.location.href.split();</script>";
   }
 } 
?>

