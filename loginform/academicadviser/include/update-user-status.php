<?php
session_start();
include('connection.php');
$ad = $_SESSION['ad'];
$time = date("Y-m-d g:i a",time()+100); //seconds
$query = "UPDATE csgname SET last_online = '$time' WHERE id = '$ad'";
$result = mysqli_query($conn, $query);
?>