<?php 
session_start();
error_reporting(0);
include("include/connection.php");
include("include/insertpropose.php");
include("include/academicofficerphotosupdate.php");
include("academicofficer-fetch.php");
$userprofile = $_SESSION['username'];
$query = "SELECT * FROM csgname WHERE username ='".$userprofile ."' ";
$data = mysqli_query($conn, $query);
$photoresult = mysqli_fetch_array($data);
$image = $photoresult['file'] ? $photoresult['file'] : 'default.png';
if (!isset($_SESSION['username'])) {
    header('Location:logout.php');
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>ACTSTI: Academic Officer Request Event Approval Form | STICaloocan </title>
    <link rel ="icon" href ="images/csg.jpg">

    <!-- AJAX/JQUERY AUTO JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>    
   
    <!-- Compiled and minified CSS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>

    <!-- Fontfaces CSS-->

    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
    <script src="gijgo/gijgo.min.js"></script>
    <script src="gijgo/gijgo.js"></script>
    <link rel="stylesheet" type="text/css" href="gijgo/gijgo.min.css">
    <link rel="stylesheet" type="text/css" href="gijgo/gijgo.css"> 
    <link rel="stylesheet"  href="gijgo/gijgo-material.svg">


    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->

    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
    <link href="https://fonts.googleapis.com/css?family=Black+Ops+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    
    <!-- Main CSS-->
    <link  href="css/emoji/emojis.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet" media="all">

    <style>
        .cancel {
            background-color:gray;
            padding:6px;
            color: white;
            border-radius:5%;
        }

        .cancel:hover {
            background-color: #005baa;
            color:white;
            transition:1s;
        }
    </style>
</head>

<body >
   <div id='preloader' >
      <div class='loader' ></div>
        <div class='left' ></div>
          <div class='right' ></div>
            </div>


    <div class="page-wrapper">

      <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
             <div style="background-color: blue!important;height:300px;margin-top:-40px;" class="header-mobile__bar">
                <div sclass="container-fluid">
                    <div  style = "margin-top:35px;"class="header-mobile-inner">
                         <img  style = "border-radius:100%;width:52px;" src="images/csg.jpg"/>
                            <a href="index.php">
                                <h1 class = "title-logo">ACTSTI</h1>
                                </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="studentpropose.php">
                                <i class="fas fa-pencil-alt"></i>Propose Event</a>
                        </li>
                         <li class="has-sub">
                            <a href="studentapproved-project.php">
                                <i class="fas fa-check"></i>Approved Events</a>
                        </li>
                         <li class="has-sub">
                            <a href="studentdeclined-project.php">
                                 <i class="fas fa-times"></i></i>Declined Events</a>
                        </li>
                         <li class="has-sub">
                            <a href="studentpending-project.php">
                                 <i class="fas fa-spinner"></i>Pending Events</a>
                        </li>  
                        <li>
                            <a href="studentprofile.php">
                                 <i class="zmdi zmdi-account"></i>Account Settings</a>
                        </li>
                         <li>
                            <a href="studentchangepass.php">
                                 <i class="fas fa-key"></i>Change Password</a>
                        </li>
                         </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
              <img  style = "border-radius:100%;width:52px;" src="images/csg.jpg"/>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="index.php">
                    <h1 class = "title-logo">ACTSTI</h1>
                </a>
            </div>
           <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <div style="background:url(images/bg-profile/bg1.jpg)no-repeat;background-size:cover;margin-left:-35px;width:300px;height:210px;margin-top:-35px;margin-bottom:24px;">
                            <div>
                                <span data-toggle="modal" href ="#AcademicOfficerModal" style="cursor:pointer;" class="editbtn" id="span">
                                <img data-toggle="tooltip" title="Change Profile Photo" data-placement="bottom" 
                                style="border-radius:50%;width:100px;height:100px;box-shadow:1px 1px 12px 3px rgba(0,0,0,0.9);"
                                class="mt-4 ml-2" src="../academicadviser/csg-profile-photos/<?php echo $image;?>" alt="" title=""/>
                                </span> 
                                <p style="color:white;font-size:18px;cursor:default;font-weight:600;" class="mt-3 ml-3">
                                    <?php echo $photoresult['firstname'];?> <?php echo $photoresult['lastname'];?></p>
                                <p style="color:#fff;font-size:15px;cursor:default;font-weigth:450;" class="ml-3" >
                                    <?php echo $photoresult['usertype'];?></p>
                         </div>
                             </div>

                        <li>
                            <a href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li> 

                         <li class="active has-sub">
                            <a style = "cursor:default;"href="#">
                                <i class="fas fa-edit"></i>Request Events</a>
                        </li>

                        <li>
                            <a href="academicofficer-liquidation.php">
                                <i class="fas fa-clipboard-list"></i>Liquidation Reports</a>
                        </li>
                       
                        <li class="has-sub">
                            <a class="js-arrow" href="#">    
                                 <i class="fas fa-history"></i>Events Request History</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class=" has-sub">
                                    <a href="academicofficer-pendingevents.php">
                                     <i class="fas fa-spinner"></i>Pending Events</a>
                                </li>
                                <li class="has-sub">
                                    <a href="academicofficer-approvedevents.php">
                                     <i class="fas fa-check"></i>Approved Events</a>
                                </li>
                                 <li class="has-sub">
                                    <a href="academicofficer-declinedevents.php">
                                     <i class="fas fa-times"></i>Declined Events</a>
                                </li>
                            </ul>     
                        </li>


                         <li>
                            <a href="upcomingevents.php">
                                <i class="fas fa-calendar-alt"></i>Upcoming Events</a>
                        </li>
  
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                              <i class="fas fa-cog"></i>Profile Settings</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="academicofficer-changepass.php">
                                    <i class="fas fa-key"></i>Change Password</a>
                                </li>
                                <li>
                                    <a href="academicofficer-profile.php">
                                    <i class="zmdi zmdi-account"></i>Account Information</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>   
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
        
<?php
$query = "SELECT * FROM csgname WHERE username ='".$userprofile ."' ";
$data = mysqli_query($conn, $query);
$result = mysqli_fetch_array($data);
?>

        <!-- PAGE CONTAINER-->
        <div style = "background-image:url(images/csg3.jpg);background-size:cover;background-repeat: no-repeat;" class="page-container">

              <!-- HEADER DESKTOP-->
            <header style="background-color:#005baa;" class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form>
                            </form>
                            <div class="header-button">
                               <div class="noti-wrap">
                                    <ul style="list-style:none;" class="noti__item">
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                                                <span style="width:20px;height:20px;"class="quantity count">0</span>
                                                    <i style="color:#fff;font-size:25px;" class="zmdi zmdi-notifications" id="notify" ></i></a>
                                                        <ul class="dropdown-menu" style="overflow:auto;max-height:500px;width:300px;
                                                            background-color:#f5f5f5;margin-top:24px;"></ul>
                                        </li>    
                                    </ul>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div  class="image">
                                            <img style ="height:35px;" src="../academicadviser/csg-profile-photos/<?php echo $image;?>" alt="" title="" />
                                        </div>
                                        <div class="content">
                                            <a  style="color: white;" class="js-acc-btn" href="#">Welcome,&nbsp;&nbsp;<?php echo $result['firstname'];?></a>
                                        </div>

                                        <div style = "border-radius:10px;"class="account-dropdown js-dropdown">
                                            <div  style="border-color:transparent;" class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="../academicadviser/csg-profile-photos/<?php echo $image;?>" alt="" title="" /> 
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <p style="margin-bottom:3px;margin-top:-12px;"> <?php echo $result['lastname'];?>, <?php echo $result['firstname'];?></p>
                                                        <span class="email">[<?php echo $result['usertype'];?>]</span><br>
                                                        <span class="email">[<?php echo $result['csgid'];?>]</span><br>
                                                        <span class="email">[<?php echo $result['selectbatch'];?>]</span><br>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer" id = "footer-logout">
                                                <a style ="border-radius:5px;margin-top:-5px;" href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
    <!-- HEADER DESKTOP-->


        <!--   UPDATE PROFILE PICTURE -->
        <div class="modal fade" id="AcademicOfficerModal" tabindex="-1" role="dialog" 
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
        <p class="modal-title" id="exampleModalCenterTitle" style="cursor: default;font-size:21px;color:#000;
        margin-left:110px;font-weight:bolder;">UPDATE PROFILE PHOTO</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form  id = "updateOfficer" action="" method="post" enctype="multipart/form-data">
        <div  class="form-row mb-4">
        <div class="col">
        <!-- ID  -->
        <input type="hidden" name="update_id" id="update_id" value="<?php echo $result['id'];?>" class="form-control">
        </div>
        </div>
        <div  class="form-row mb-4">
        <div class="col">
        <center>
            <img style="border-radius:100%;margin-top:-20px;height:150px;width:150px;image-rendering:auto;border:3px solid #000;" 
            src="../academicadviser/csg-profile-photos/<?php echo $image;?>" alt="" title="" id="profileImage">
        </center>
        </div> 
        </div>

        <div  class="form-row mb-4">
        <div class="col">
        <label style="color:#005baa;font-weight:500;position:absolute;margin-top:-10px;">UPLOAD IMAGE FILE:</label>
        <input style="color:black;margin-top:20px;color:gray;color:black;" type="file" id="File" name="file" 
        class="form-control" autocomplete="off" accept="image/*" onchange="loadfile(event)">
        </div>
        </div>
        
        <div class="modal-footer">
        <button type="submit"  name="updatephoto" class="btn btn-primary" onclick="return confirm('Are you sure you want to save changes?')"> SAVE CHANGES</button>
        </div>
        </form>
        </div>
            </div>
                </div>
                    </div>
        <!-- END UPDATE MODAL -->


   <!-- HEADER DESKTOP-->
<?php
  $query = "SELECT * FROM termscondition";
  $data = mysqli_query($conn, $query);
  $result = mysqli_fetch_array($data);
?>

     <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" 
     aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle" style="cursor: default; font-size:20px;margin-left:120px;"> TERMS AND CONDTIONS</h5>
      </div>
      <div class="modal-body">
        <form id="FormSubmit" action="" method="post" enctype="multipart/form-data">
      <div  class="form-row mb-4">
     <div class="col" style="overflow:auto;height:250px;text-align:justify;text-indent:50px;line-height: 2;">
            <p><?php echo $result['termscondition'];?></p>
        </div>
     </div>

            <div class="modal-footer">
            <a class="cancel" href="index.php">CANCEL</a>
            <button type="button" class="btn btn-primary"data-dismiss="modal">I ACCEPT THE <u>TERMS AND CONDITIONS</u></button>
            </div>
            </form>
            </div>
                </div>
                    </div>
                        </div>

    <!-- MAIN CONTENT-->
    <div class="main-content">
         <p style="font-size:30px;margin-top:5px;margin-left:20px;color:#000;font-weight:500;cursor:default;">REQUEST EVENTS </p>

        <div  class="d-flex justify-content-center align-items-center">

            <form  id="SubmitForm" style = "background-color:white;width:1000px;padding:20px;box-shadow:1px 1px 12px 3px rgba(0,0,0,0.3);margin-top:20px; border-radius:1%;overflow-x:auto;" class="border border-light p-5"  method="post" enctype="multipart/form-data">
    <p style="text-align: center;font-size:35px;color:#000;font-weight:500;cursor:default;">REQUEST EVENTS FORM</p>
    <p style="color:#FF0000; font-weight:400;margin-top:30px;font-style:italic;font-weight:500;font-size:13px;">ALL FIELDS ARE REQUIRED*</p>
      <div class="form-row mb-4">
    </div> 

    <div class="form-row mb-4">
         <div class="col">
           <label style="color:#005baa;font-weight:500;position:absolute;margin-top:-15px;">EVENT TITLE</label>
           <input style="color:black;margin-top:15px;" class="form-control" id="projecttype" name="ProjectType" placeholder="Title Project" type="text" required="" autocomplete="off" >
        </div>     
    </div>

     <div style="margin-top:35px!important;" class="form-row mb-4">
        <div class="col">
           <label style="color:#005baa;font-weight:500;position:absolute;margin-top:-15px;">DESCRIPTION</label>
           <input style="color:black;margin-top:15px;" class="form-control" id="description" name="Description" placeholder="Description" type="text"required="" autocomplete="off">
        </div>
    </div>

     <div style="margin-top:35px!important;" class="form-row mb-4">
        <div class="col">
            <label style="color:#005baa;font-weight:500;position:absolute;margin-top:-15px;">MAN&nbsp;POWER&nbsp;INVOLVED</label>
            <input style="color:black;margin-top:15px;" type="text" id="manpower" name="manpower" class="form-control"  placeholder="Man Power Involved" required="" autocomplete="off">
        </div>
    </div>

    <div style="margin-top:35px!important;" class="form-row mb-4">
        <div class="col">
            <label style="color:#005baa;font-weight:500;position:absolute;margin-top:-15px;padding:1px;">START&nbsp;DATE</label>
            <input style="color:black;cursor:pointer;margin-top:15px;" type="text" id="fromdate" name="FromDate" class="form-control"  placeholder="Start Date" required="" autocomplete="off">
        </div>
        <div class="col">
            <label style="color:#005baa;font-weight:500;position:absolute;margin-top:-15px;margin-left:5px;">END&nbsp;DATE</label>
            <input style="color:black;cursor:pointer;margin-top:15px;" type="text" id="todate"  name="ToDate"  class="form-control" placeholder="End Date" required="" autocomplete="off">
        </div> 
    </div>

     <div style="margin-top:35px!important;" class="form-row mb-4">
        <div class="col">
            <label style="color:#005baa;font-weight:500;position:absolute;margin-top:-15px;padding:1px;">PURPOSE / OBJECTIVE </label>
            <textarea style="color:black;margin-top:15px;" type="text" id="purpose" name="purpose" class="form-control"  placeholder="Purpose/Objective" required="" autocomplete="off" rows="3"></textarea>
        </div>
    </div>

     <div style="margin-top:35px!important;" class="form-row mb-4">
         <div class="col">
            <label style="color:#005baa;font-weight:500;position:absolute;margin-top:-15px;padding:1px;">OVERALL&nbsp;ESTIMATED&nbsp;BUDGET</label>
            <input style="color:black;height:44px;margin-top:15px;" type="text" id="estimatedbudget" name="budget" class="form-control money"  placeholder="Overall Estimated Budget" required=""  autocomplete="off">
        </div>
    </div>

     <div style="margin-top:35px!important;" class="form-row mb-4">
        <div class="col">
            <label style="color:#005baa;font-weight:500;position:absolute;margin-top:-15px;padding:1px;">EVENTS&nbsp;BUDGET&nbsp;FILE</label>
            <input style="color:black;margin-top:15px;cursor: pointer;" type="file" id="file" name="file" class="form-control" required="" autocomplete="off" accept=".docx,.pdf,.xls">
        </div>
 </div>

    <button style = "background-color:#005baa;color:white;width:200px;margin-top:30px;height:50px;font-weight:500;" type="submit"  name="insert" class="btn btn-secondary" 
    onclick="return confirm('Are you sure you want to save changes your data?')">PROCEED</button>
    </form>
 </div>

   <div class="col-md-12 mt-5">
    <div class="copyright">
            <p class="credit" style="color:#000;font-size:15px;font-weight:500;cursor:default;"> ACTSTI CSG Organization - STICaloocan &nbsp; |  &nbsp; <i class="fa fa-home">
                </i>  &nbsp; 109 Samson Road corner Caimito Street, Caloocan City 1400</p>
             </div>
        </div>

<!-- ONLINE USER CONTENT -->
<div class="close-container">
<button class ="times-button">&#8213;</button>
</div>

<div class="online-content">
<?php
    $time = date("Y-m-d g:i a");
    $query="SELECT csgname.id,csgname.firstname,csgname.lastname,csgname.file,csgname.last_online,chat_message.status
    FROM csgname LEFT JOIN chat_message ON csgname.id = chat_message.from_user_id AND chat_message.status = '$status'
    WHERE csgname.id != '$ao' GROUP BY csgname.firstname ORDER BY last_online DESC, firstname";
    $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result)) {    
            $image = $row['file'] ? $row['file'] : 'default.png';
            $class ="#FF0000";
                if ($row['last_online'] > $time) {
                    $class = "#228B22";
                }
                $display="none";
                if($row['status'] > 0){
                    $display="block";
                }    
?>                    
        <div class = "online-container" style="padding-top:5px;">
            <img src="../academicadviser/csg-profile-photos/<?php echo $image;?>" class ="img-online-list">
            <i style="display:<?php echo $display?>;" class="fas fa-exclamation-circle"></i> 
            <li data-id="<?php echo $row['id']?>" class ="online-list"> <?php echo $row['firstname']?> <?php echo $row['lastname']?></li>     
            <i class="fas fa-circle" id ="icon-online" style="color:<?php echo $class;?>;"></i>                 
        </div>   
        <?php }?> 
    </div>


<div class="status-container">       
<?php
    $time = date("Y-m-d g:i a");
    $query = "SELECT * FROM csgname WHERE last_online > '$time' AND id != '$ao'";
    $result = mysqli_query($conn, $query);
    $onlineCount = mysqli_num_rows($result);
?>
        <button class ="status-button"><i class="fas fa-circle"></i>
        <p  class ="online-name">CSG Online Users &nbsp;-&nbsp; <?php echo $onlineCount;?> </p></button>
    </div>

    <div id="message-container-name"></div>
    <div id="message-container">
    <?php
    $ao=$_SESSION['ao'];
    $mid=$_SESSION['mid'];
    $query="SELECT chat_message.chat_message_id as cid, chat_message.chat_message,chat_message.timestamp,chat_message.from_user_id,
    chat_message.send_user_id,csgname.firstname,csgname.file FROM chat_message JOIN csgname ON chat_message.from_user_id = csgname.id 
    WHERE chat_message.send_user_id = $ao AND chat_message.from_user_id = $mid OR chat_message.send_user_id = $mid 
    AND chat_message.from_user_id = $ao ORDER BY TIMESTAMP ASC";
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result)) {
    $image = $row['file'] ? $row['file'] : 'default.png';
    $datetime = DateTime::createFromFormat ( "Y-m-d H:i:s", $row["timestamp"]);
    $datetime =  $datetime->format('g:i a');
    $chatMessage = $row['chat_message'];
    $fromUser = $row['from_user_id'];
    $sendUser = $row['send_user_id'];
    if($fromUser == $mid){
    ?>
            <div id="message-content"style="display:flex;padding-top:7px;clear:right;">
            <img class="ml-2 mt-3" style="height:35px;border-radius:50%;box-shadow:1px 1px 12px 3px rgba(0,0,0,0.3);
            border:1px solid #000;" src="../academicadviser/csg-profile-photos/<?php echo $row['file'];?>" />
            <div style="margin-left:20px;margin-top:5px;background-color:#CAF4F5;padding:10px;border-radius:10px;
            color:#000;font-size:13px;font-weight:500;word-wrap:break-word;">
            <p><?php echo $chatMessage?></p>
            <p style="color:gray;font-size:10px;font-weight:500;"><?php echo $datetime?></p></div>
            </div>
    <?php } else {?>
            <div id="message-content"style="display:flex;float:right;clear:right;">
            <div style="margin-top:10px;background-color:#CBE1EF;padding:10px;border-radius:10px;
            color:#000;font-size:13px;font-weight:500;max-width:200px;word-wrap:break-word;">
            <p><?php echo $chatMessage?></p>
            <p style="color:gray;font-size:10px;font-weight:500;"><?php echo $datetime?></p></div>
            </div>
    <?php } } ?>
    </div>
            <div id="emojis"></div>
            <form id="fromMessage" action="" method="POST" onsubmit="return messageSubmit();">
            <div class="text-container">
            <textarea id="messageArea" rows="1" name="textmessage" required=""id="textmessage"></textarea>
            <div id="emojiBtn"><img src="images/smile-emoji.png" height="20" width="20"></div>
            <button type="submit" name="sendMessageUser" style="position:absolute;"id="msgBtn">
            <img style="height:23px;margin:10px 0 0 10px;" src="images/send.png">
            </button>
            </div>
            </form>
<!-- END OF MAIN CONTENT -->
      

    <!-- Bootstrap JS-->
    <script src='json/jquery.magnific-popup.min.js' ></script>
    <script src='json/script.js' ></script>   
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>

    <!-- Vendor JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.min.js"></script>
    <script src="vendor/slick/slick.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="https://twemoji.maxcdn.com/v/latest/twemoji.min.js" crossorigin="anonymous"></script>
    <script src="js/DisMojiPicker.js"></script>
    
    <!-- Main JS-->
    <script src="js/main.js"></script>

 <script>

    jQuery.validator.addMethod("numbersonly", function(value, element) {
        return this.optional(element) || /^([0-9₱,.])+$/.test(value);
        }, "Please enter number only");

$(document).ready(function(){
$('#addModal').modal('show');

function load_unseen_notification(view = '')
{
$.ajax({
url:"academicofficer-fetch.php",
method:"POST",
data:{view:view},
dataType:"json",
success:function(data)
{
    $('.dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
{
    $('.count').html(data.unseen_notification);
}
}
});
}
setInterval(function(){ 
load_unseen_notification();; 
}, 1000);

$(document).on('click', '#notify', function(){
$('.count').html('0');
load_unseen_notification('yes');
});

function updateUserStatus() {
    $.ajax({
        url:'include/update-user-status.php',
        success: function() {
        }
    });
}
setInterval(function (){
    updateUserStatus();
},1000);

$(document).on("click", ".online-list",  function(){
    $('#message-container-name').css("visibility", "visible");
    $('#message-container').css("visibility", "visible");
    $('.text-container').css("visibility","visible");
        var thisBtn = $(this).data('id');
        if(thisBtn == undefined)
            return false;
        $.ajax({
            url:'include/message-data.php',
            data:{did: thisBtn},
            type:'post',
            success:function(response) {
                $('#message-container-name').html(response);
        }
    });
});

$(document).on("click", ".online-list",  function(){
        notificationLoad();
        $.ajax({
            url:'include/update-notification-message.php',
            success:function() {
        }
    });
});

function notificationLoad() {
    var viewMessage = document.getElementById('message-container').style.visibility; //notification;
    if(viewMessage == "visible"){
        $.ajax({
            url:'include/update-notification-message.php',
            success:function() {
        }
    });
    }
}

setInterval(function() {
    notificationLoad();
}, 10000);

$(document).on('click','#closeMsg', function(){
    $('#message-container-name').css("visibility", "hidden");
    $('#message-container').css("visibility", "hidden");
    $('.text-container').css("visibility","hidden");
    $("#emojis").hide();
});

function getMessageData () {
    $.ajax({
        url:'include/get-message-data.php',
        success: function(messageresult){
            $('#message-container').html(messageresult);
               
        }
    });
}
var action = true;
setInterval(function() {
    getMessageData();
    if (action === true) {
    $("#message-container").scrollTop($("#message-container")[0].scrollHeight);
    }
}, 1000);

$("#message-container").scroll(function(){
    var value = document.getElementById("message-container");
    var xTop = value.scrollTop;
    var yHeight = value.scrollHeight - 376; //The height of message container;
     if(xTop < yHeight){
        action = false;
    } else {
         action = true;
     }
});

$("#fromMessage").submit(function(ev){
    var data = $("#fromMessage").serialize();
        ev.preventDefault();    
            $.ajax ({
            type: "POST",
            url: "include/insert-message.php",
            data: data,
            success: function() {
            document.getElementById('fromMessage').reset();
        }
    });
});

$("#messageArea").keypress(function (e) {
    var valueMessage = document.getElementById('messageArea').value;
    if(e.which == 13 && !e.shiftKey) {
        if(valueMessage !== "") {
            $('#messageArea').closest("#fromMessage").submit();
            e.preventDefault();  
        }else {
            $("#message-container").scrollTop($("#message-container")[0].scrollHeight);
            e.preventDefault();
        }   
    }
});


$("#messageArea").keydown(function (e) {
    var spaceValid = $.trim($("#messageArea").val());
    if(e.keyCode == 13 && spaceValid == ""){
        e.preventDefault();
        $("#messageArea").val("");
    }
});

$("#messageArea").on("click", function(){
    $("#emojis").hide();
});

$(document).on("click", "#emojiBtn", function(){
    $("#emojis").toggle();
});

$("#emojis").disMojiPicker()
    $("#emojis").picker(function (emoji){
        $("#messageArea").val($("#messageArea").val() + emoji);
});
twemoji.parse(document.body);

function getUserStatus() {
        $.ajax({
            url:'include/get-user-status.php',
            success: function(result) {
                jQuery('.online-content').html(result);
            }
        });
    }
    setInterval(function (){
        getUserStatus();
},1000);

$(".status-button").on("click", function(){
                $(".online-content").show();
                $(".close-container").show();     
                });

function getUserCount() {
        $.ajax({
            url:'include/get-user-count.php',
            success: function(result) {
                jQuery('.status-button').html(result);
            }
        });
    }
    setInterval(function (){
        getUserCount();
},1000);

$(".times-button").on("click", function(){
    $(".online-content").hide();
    $(".close-container").hide();    
});

$(".status-button").on("click", function(){
    $(".online-content").show();
    $(".close-container").show();     
});

var today, fromdate; 
    today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
    fromdate = $('#fromdate').datepicker({
    minDate: today,
    //uiLibrary: 'bootstrap4',
});

$('#fromdate').on('change', function (){
    var minDate = $(this).val();
    todate = $('#todate').datepicker({
    minDate: minDate,    
    //uiLibrary: 'bootstrap4',
    });
});

$("#FormSubmit").validate({
        debug: true,
                errorClass:'error',
                validClass:'success',
                errorElement:'span',

        rules: {
            budget: {
                required:true,
                numbersonly: true
                },
            },

        submitHandler: function(form) {
            console.log(form)
        form.submit();
        }
    });
        $(window).bind("beforeunload", function(){
    return confirm("Do you really want to refresh?"); 
    });
});

$("#SubmitForm").validate({
    debug: true,
            errorClass:'error',
            validClass:'success',
            errorElement:'span',
            highlight: function (element, errorClass, validClass) { 
            $(element).parents("div.control-group").addClass(errorClass).removeClass(validClass); 

            }, 
            unhighlight: function (element, errorClass, validClass) { 
                    $(element).parents(".error").removeClass(errorClass).addClass(validClass); 
            },

            rules: {
            ProjectType: {
                required:true
            },
            Description: {
                required:true
            },
            manpower: {
                required:true
            },
            purpose: {
                required:true
            },
            budget: {
                required:true,
                numbersonly:true,
                maxlength:7
            },
            file: {
                required:true
            }
        },

        messages: {
            ProjectType: {
                required:"Event Title is required"
            },
            Description: {
                required:"Description is required"
            },
            manpower: {
                required:"Man Power Involved is required"
            },
            purpose: {
                required:"Purpose/Objectives is required"
            },
            budget: {
                required:"Overall Estimated Budget is required",
                maxlength:"Please input a number will not exceed 6 digits"
            },
            file: {
                required:"Budget Approval Project File is required"
            }
        },
        submitHandler: function(form) {
        console.log(form)
        form.submit();
        }    
    });

$('#SubmitForm').keyup(function(event) {
    $('.money').val(function(index, value) {
        return value.replace(/\D/g, "")
                    .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    });
});

function loadfile(event){
    var previewPhoto = document.getElementById('profileImage');
    previewPhoto.src=URL.createObjectURL(event.target.files[0]);
};



</script>

</body>
</html>
<!-- end document-->























































<!-- 

//         var date_input=$('input[id="date"]'); //our date input has the name "date"
//         var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
//             date_input.datepicker({
//             format: 'yyyy/mm/dd',
//             container: container,
//             todayHighlight: true,
//             autoclose: true,
//             startDate: truncateDate(new Date())
//         });
            
//             function truncateDate(date) {
//   return new Date(date.getFullYear(), date.getMonth(), date.getDate());
// }

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script> --> 
