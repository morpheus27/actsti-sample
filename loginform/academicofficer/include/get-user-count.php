<?php
session_start();
include('connection.php');
$ao = $_SESSION['ao'];
$time = date("Y-m-d g:i a");
$query = "SELECT * FROM csgname WHERE last_online > '$time' AND id != '$ao'";
$result = mysqli_query($conn, $query);
$onlineCount = mysqli_num_rows($result);
$statusresult="";

    $statusresult.='<button class="status-button"><i class="fas fa-circle"></i>
    <p  class ="online-name">CSG Online Users &nbsp;-&nbsp; '.$onlineCount.' </p></button>';   

echo $statusresult;
?>