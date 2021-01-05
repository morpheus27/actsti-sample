<?php
include('connection.php');

if(isset($_POST['revise-data'])){
    $isRead = 0;
    $status = 0;
    $lid = $_POST['lid'];
    $eventTitle = $_POST['eventTitle'];
    $purpose = $_POST['purpose'];
    $overallBudget = $_POST['overallBudget'];
    $fromDate = $_POST['fromDate'];
    $toDate = $_POST['toDate'];
    $budgetFile = $_FILES["budgetFile"]["name"];
        $tmp_name = $_FILES["budgetFile"]["tmp_name"];
        $path="../admin/upload/".$budgetFile;
        $file1=explode(".",$budgetFile );
        $ext=$file1[1];
        $allowed=array("jpg","png","gif","pdf","wmv","pdf","zip","rar","docx","txt");
        if(in_array($ext,$allowed))
        {
        move_uploaded_file($tmp_name,$path);
        }

        $query = "UPDATE tblprojects SET ProjectType='$eventTitle', purpose='$purpose', budget='$overallBudget',
        FromDate='$fromDate', ToDate='$toDate', file='$budgetFile', IsRead = '$isRead', Status='$status'  WHERE id='$lid'";
        $data = mysqli_query($conn, $query);

     if ($data) {
        echo "<script>alert('Re-send Sucessfully!'); </script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again!');window.location.href='studentdeclined-project.php';</script>";
    }
}
?>