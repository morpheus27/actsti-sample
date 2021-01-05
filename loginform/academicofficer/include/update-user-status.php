<?php
session_start();
include('connection.php');
$ao = $_SESSION['ao'];
// $time = date("Y-m-d g:i a",time()+100); //seconds
$time = date("Y-m-d g:i a",time()+100); //seconds
$query = "UPDATE csgname SET last_online = '$time' WHERE id = '$ao'";
$result = mysqli_query($conn, $query);
?>