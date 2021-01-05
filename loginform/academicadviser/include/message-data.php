<?php
session_start();
include("connection.php");
    if (isset($_POST['did'])) {
        $id=$_POST['did'];
        $_SESSION['mid'] = $id;
        $query = "SELECT * FROM  csgname WHERE id = $id";
        $data = mysqli_query($conn, $query);
        $result = mysqli_fetch_array($data);
        $outputMessage = "";
    

    $outputMessage .='<li style="list-style-type:none;padding:8px;color:#fff;">'.$result['firstname'].' '.$result['lastname'].'
                      <span id="closeMsg" class="close-message" style="position:absolute;right:10px;bottom:1px;
                      font-size:35px;cursor:pointer;">&times;</span>
    </li>';

    echo $outputMessage;
    }

 