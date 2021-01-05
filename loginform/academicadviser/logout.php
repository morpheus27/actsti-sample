<?php
session_start();
unset($_SESSION["usertype"]);
unset($_SESSION["user_name"]);
header("Location:../login.php");
session_destroy();
?>