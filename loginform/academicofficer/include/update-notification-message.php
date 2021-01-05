<?php
session_start();
include("connection.php");
        $mid = $_SESSION['mid'];
        $query="UPDATE chat_message SET status = 0 WHERE from_user_id = '$mid'";
        $result=mysqli_query($conn, $query);
?>