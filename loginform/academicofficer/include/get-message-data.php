<?php
session_start();
error_reporting(0);
include('connection.php');
$time = date("Y-m-d g:i a");
$ao=$_SESSION['ao'];
$mid=$_SESSION['mid'];
$query="SELECT chat_message.chat_message_id as cid, chat_message.chat_message,chat_message.timestamp,chat_message.from_user_id,chat_message.send_user_id,csgname.firstname,csgname.file,csgname.last_online 
FROM chat_message JOIN csgname ON chat_message.from_user_id = csgname.id WHERE chat_message.send_user_id = $ao AND chat_message.from_user_id = $mid 
OR chat_message.send_user_id = $mid AND chat_message.from_user_id = $ao ORDER BY TIMESTAMP ASC";
$result = mysqli_query($conn, $query);
$getmessagedata ="";
while($row = mysqli_fetch_array($result)) {   
    $image = $row['file'] ? $row['file'] : 'default.png';
    $datetime = DateTime::createFromFormat ( "Y-m-d H:i:s", $row["timestamp"]);
    $datetime =  $datetime->format('g:i a');
    $chatMessage = $row['chat_message'];
    $fromUser = $row['from_user_id'];
    $sendUser = $row['send_user_id'];

    if($fromUser == $mid){
        if ($row['last_online'] > $time) {
            $color = "#32CD32";
            $display = "block";
        } else {
            $display = "none";
        }
        $getmessagedata .='<div id="message-content"style="display:flex;padding-top:7px;clear:right;">
        <img class="ml-2 mt-3" style="height:35px;border-radius:50%;box-shadow:1px 1px 12px 3px rgba(0,0,0,0.3);
        border:1px solid #000;" src="../academicadviser/csg-profile-photos/'.$image.'" />
        <i class="fas fa-circle" id="image-status" style="color:'.$color.';display:'.$display.';
        border:1px solid #000;border-radius:50%;"></i>  
        <div style="margin-left:20px;margin-top:5px;background-color:#CAF4F5;padding:10px;border-radius:10px;
        color:#000;font-size:13px;font-weight:500;max-width:200px;word-wrap:break-word;">
        <p>'.$chatMessage.'</p>
        <p style="color:gray;font-size:10px;font-weight:500;">'.$datetime.'</p></div>
        </div>';
    } else {
        $getmessagedata .='<div id="message-content" style="display:flex;float:right;clear:right;">
        <div style="margin-top:10px;background-color:#CBE1EF;padding:10px;border-radius:10px;
        color:#000;font-size:13px;font-weight:500;max-width:200px;word-wrap:break-word;">
        <p>'.$chatMessage.'</p>
        <p style="color:gray;font-size:10px;font-weight:500;">'.$datetime.'</p></div>
        </div>';
    }
}
echo $getmessagedata;
?>
