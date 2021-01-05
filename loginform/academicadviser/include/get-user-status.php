<?php
session_start();
error_reporting(0);
include('connection.php');
$status= 1;
$ad = $_SESSION['ad'];
$mid=$_SESSION['mid'];
$time = date("Y-m-d g:i a");
$query="SELECT csgname.id,csgname.firstname,csgname.lastname,csgname.file,csgname.last_online,chat_message.status
FROM csgname LEFT JOIN chat_message ON csgname.id = chat_message.from_user_id AND chat_message.status = '$status'
WHERE csgname.id != '$ad' GROUP BY csgname.firstname ORDER BY last_online DESC,firstname";
$result = mysqli_query($conn, $query);
$statusresult="";

while($row = mysqli_fetch_array($result)) {
    $image = $row['file'] ? $row['file'] : 'default.png';
    //offline color
    $class ="#FF0000";
    $fontSize="font-size:2px";
    if ($row['last_online']>$time) {
        //online color
        $class = "#228B22";
    }
    //display notification
    $display="none";
    if($row['status'] > 0){
        $display="block";
    }

    $statusresult.='<div class = "online-container" style="padding-top:5px;">
    <img src="../academicadviser/csg-profile-photos/'.$image.'" class ="img-online-list">
    <i style="position:absolute;color:red;margin:3px 0 0 32px;display:'.$display.';" class="fas fa-exclamation-circle"></i> 
    <li data-id='.$row['id'].' class ="online-list"> '.$row["firstname"].' '.$row["lastname"].'</li>     
    <i class="fas fa-circle" id ="icon-online" style="color:'.$class.';"></i>                 
    </div>';   
} 
echo $statusresult;
?>