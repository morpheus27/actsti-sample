<?php
session_start();
include('connection.php');

    $status = 1;
    $ad=$_SESSION['ad'];
    $mid=$_SESSION['mid'];
    $textmessage = $_POST['textmessage'];
    $query="INSERT INTO chat_message (`send_user_id`,`from_user_id`,`chat_message`,`status`) VALUES ('$mid','$ad','$textmessage','$status')";
    $data = mysqli_query($conn, $query);
    // exit();
?>