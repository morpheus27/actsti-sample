<?php 
session_start();
error_reporting(0);
include("include/connection.php");
include("include/liquidation-insert.php");
include("include/liquidation-update.php");
include("include/liquidation-delete.php");
include("include/academicofficerphotosupdate.php");
include("academicofficer-fetch.php");
$userprofile = $_SESSION['username'];
$query = "SELECT * FROM csgname WHERE username ='".$userprofile ."' ";
$data = mysqli_query($conn, $query);
$result = mysqli_fetch_array($data);
if (!isset($_SESSION['username'])) {
    header('Location:logout.php');
    } 
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Page-->
    <title>ACTSTI: Academic Officer Liquidation Reports | STICaloocan </title>
    <link rel ="icon" href ="images/csg.jpg">
    <!-- AJAX/JQUERY AUTO JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
   

    <!-- Fontfaces CSS-->
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
    <script src="gijgo-liquidation/gijgo.min.js"></script>
    <link rel="stylesheet" type="text/css" href="gijgo-liquidation/gijgo.min.css">
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
    <link href="https://fonts.googleapis.com/css?family=Black+Ops+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet"> 

    <!-- Main CSS-->
    <link  href="css/emoji/emojis.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet" media="all">
</head>

<style>
    
    .dropdown-menu {
        text-align: center;
        margin-top:20px;
        max-height:1000%;
        overflow-wrap: break-word;
        overflow-y:auto;
        
    }

    .not {
        width:350px;
        border-bottom:2px solid whitesmoke;
        height:40px;
        margin-top:-9px;
    }

    .not p {
        position:absolute;
        margin-top:10px;
        margin-left: 15px;
        font-size:14px;
    }

      .notification .bg-c1 {
       margin-top:10px; 
       vertical-align: middle;
       display:inline-block;  
    }

    .notification .bg-c1 i{
        color:white;
        margin-top:7px;
        font-size:25px;
        text-align: center;
        display:inline-block;
    }

     .notification .bg-c1 .notifacation-text {
        display:inline-block;
        vertical-align: middle;
    }

    #notification {
        display: inline-block;
        word-wrap: break-word;
    }

    #datepicker-calendar-container {
    color: blue;
}

</style>

<body>

     <div id='preloader' >
      <div class='loader' ></div>
        <div class='left' ></div>
          <div class='right' ></div>
            </div>

     <div class="modal fade" id="addliquidationreports" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle" style="cursor:default;font-size:20px;
        color:#000;margin-left:100px;">ADD LIQUIDATION REPORTS</h5>
      </div>
      <div class="modal-body">
        <form id="FormSubmit" action="" method="post" enctype="multipart/form-data">

    <div  class="form-row mb-4">
        <div class="col">
                 <label style="color:#005baa;font-weight:500;position:absolute;margin-top:-10px;">EVENT DATE</label>
            <input style="margin-top:20px;height:44px;cursor:pointer;background-color:white;" type="text" id="date" name="eventdate" class="form-control"  placeholder="Enter Event Date" value="" readonly="">  
        </div> 
    </div>
    <div  class="form-row mb-4">
        <div class="col">
                 <label style="color:#005baa;font-weight:500;position:absolute;margin-top:-10px;">EVENT TITLE</label>
            <input style="margin-top:20px;height:44px;" type="text" id="eventtitle" name="eventtitle" class="form-control"  placeholder="Enter Event Title" value="">
        </div> 
    </div>

    <div  class="form-row mb-4">
        <div class="col">
                 <label style="color:#005baa;font-weight:500;position:absolute;margin-top:-10px;">OVERALL COST</label>
            <input style = "margin-top:20px;"type="text" id="overall" name="overallcost" class="form-control money"  placeholder="Enter Overall Cost" value="">
        </div>
        <div class="col">
            <label style="color:#005baa;font-weight:500;position:absolute;margin-top:-10px;">CONFIRM BUDGET</label>
            <input style="color:black;margin-top:20px;" type="text" id="confirmbudget" name="confirmbudget" class="form-control money" required="" placeholder="Enter Confirm Budget" autocomplete="off">
        </div>
    </div>
      <div  class="form-row mb-4">
     <div class="col">
            <label style="color:#005baa;font-weight:500;position:absolute;margin-top:-10px;">LIQUIDATION REPORTS FILE</label>
            <input style="color:black;margin-top:20px;color:gray;" type="file" id="file" name="file" class="form-control" required="" autocomplete="off" accept=".docx,.pdf,.xls">
        </div>
     </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnReset">CANCEL</button>
    <button type="submit"  name="insertdata" class="btn btn-primary" onclick="return confirm('Are you sure you want to insert this data?')">INSERT DATA</button>
    </div>
    </form>
    </div>
        </div>
            </div>
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

<?php
$query = "SELECT * FROM csgname WHERE username ='".$userprofile ."' ";
$data = mysqli_query($conn, $query);
$photoresult = mysqli_fetch_array($data);
$image = $photoresult['file'] ? $photoresult['file'] : 'default.png';
?>

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
                              <ul style="list-style:none;margin-left:250px;position:absolute;margin-top:0px;" class="noti__item"></ul>
                 <div>
                    <span data-toggle="modal" href ="#EditAcademicOfficerPhoto" style="cursor:pointer;" class="editbtnn" id="span">
                             <img data-toggle="tooltip" title="Change Profile Photo" data-placement="bottom" 
                             style="border-radius:50%;width:100px;height:100px;box-shadow:1px 1px 12px 3px rgba(0,0,0,0.9);" 
                             class="mt-4 ml-2" src="../academicadviser/csg-profile-photos/<?php echo $image;?>" alt="" title=""/>
                             </span> 
                              <p style="color:white;font-size:18px;cursor:default;font-weight:600;" class="mt-3 ml-3">
                                <?php echo $photoresult['firstname'];?> <?php echo $photoresult['lastname'];?></p>
                              <p style="color:white;font-size:15px;cursor:default;font-weight:450;" class=" ml-3">
                                <?php echo $photoresult['usertype'];?></p>
                         </div>  
                            </div>                   

                         <li>
                            <a href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li> 

                        <li class="has-sub">
                            <a href="academicofficer-propose.php">
                                <i class="fas fa-edit"></i>Request Events</a>
                        </li>

                        <li class="active has-sub">
                            <a style="cursor:default;" href="#">
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

<!--  UPDATE PROFILE PICTURE -->
        <div class="modal fade" id="EditAcademicOfficerPhoto" tabindex="-1" role="dialog" 
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


<?php
$query = "SELECT * FROM csgname WHERE username ='".$userprofile ."' ";
$data = mysqli_query($conn, $query);
$result = mysqli_fetch_array($data); 
?>


        <!-- PAGE CONTAINER-->
        <div  style = "background-color:whitesmoke;background-image:url(images/csg4.jpg);background-size:cover;background-repeat: no-repeat;"class="page-container">
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
                                            <img style ="height:35px;" src="../academicofficer/academicofficerphotos/<?php echo $image;?>" alt="" title="" />
                                        </div>
                                        <div class="content">
                                            <a  style="color: white;" class="js-acc-btn" href="#">Welcome,&nbsp;&nbsp;<?php echo $result['firstname'];?></a>
                                        </div>

                                        <div style = "border-radius:10px;"class="account-dropdown js-dropdown">
                                            <div  style="border-color:transparent;" class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="../academicofficer/academicofficerphotos/<?php echo $image;?>" alt="" title="" /> 
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

        <?php
        $query = "SELECT * FROM academicofficerliquidation";
        $data = mysqli_query ($conn, $query);
        $result = mysqli_fetch_array($data);
        ?>


  <!---Delete Modal--->
  <div class="modal fade" id="removemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" 
  aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered" role="document" >
    <div class="modal-content" style="max-width:460px;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle" style="cursor:default;font-size:20px;
        margin-left:150px;color:#000;">REMOVE DATA</h5> 
        </div>

      <div class="modal-body">
         <form action="" method="post" enctype="multipart/form-data">

       <div  class="form-row mb-4">
         <div class="col">
            <!-- ID  -->
            <input type="hidden" name="remove_id" id="remove_id" class="form-control">
            <label style="font-size:18px;color:#000;font-weight:500;">ARE YOU SURE YOU WANT TO REMOVE THIS DATA?</label>
            <label style = "font-style:italic;">Remember! You can't restore this data once deleted </label>
            
         </div>
            </div>

     <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
        <button style = "background-color:#005baa;color:white;" type="submit"  name="removedata" class="btn btn-secondary">OK</button>
            </div>
              </form>
      </div>
         </div>
            </div>
                </div>
                <!-- END DELETE MODAL -->



<!--UPDATE MODAL -->
<div class="modal fade" id="editLiquidation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle" style="cursor: default;font-size:20px;
        color:#000;margin-left:100px;">EDIT LIQUIDATION REPORTS</h5>
      </div>
      <div class="modal-body">

    <form  id = "FormEdit" action="" method="post" enctype="multipart/form-data">
         <div class="col">
            <!-- ID  -->
            <input type="hidden" name="update_id" id="updateid" value ="<?php echo $result["id"]?>" class="form-control">
         </div>
    <div  class="form-row mb-4">
        <div class="col">
                 <label style="color:#005baa;font-weight:500;position:absolute;margin-top:-10px;">EVENT DATE</label>
            <input style="margin-top:20px;height:44px;cursor:pointer;background-color:white;color:black;" type="text"  id="datepicker" name="eventdate" class="form-control"  placeholder="Enter Event Date" value="" readonly="">  
        </div> 
    </div>
    <div  class="form-row mb-4">
        <div class="col">
                 <label style="color:#005baa;font-weight:500;position:absolute;margin-top:-10px;">EVENT TITLE</label>
            <input style="margin-top:20px;height:44px;color:black;" type="text" id="eventTitle" name="eventtitle" class="form-control"  placeholder="Enter Event Title" value="">
        </div> 
    </div>

    <div  class="form-row mb-4">
        <div class="col">
                 <label style="color:#005baa;font-weight:500;position:absolute;margin-top:-10px;">OVERALL COST</label>
            <input style = "margin-top:20px;color:black;"type="text" id="overallCost" name="overallcost" class="form-control money"  placeholder="Enter Overall Cost" value="">
        </div>

        <div class="col">
            <label style="color:#005baa;font-weight:500;position:absolute;margin-top:-10px;">CONFIRM BUDGET</label>
            <input style="color:black;margin-top:20px;color:black;" type="text" id="confirmBudget" name="confirmbudget" class="form-control money" required="" placeholder="Enter Confirm Budget" autocomplete="off">
        </div>
    </div>

      <div  class="form-row mb-4">
     <div class="col">
            <label style="color:#005baa;font-weight:500;position:absolute;margin-top:-10px;">LIQUIDATION REPORTS FILE</label>
            <input style="color:black;margin-top:20px;color:gray;color:black;" type="file" id="File" name="file" class="form-control" autocomplete="off"  accept=".docx,.pdf,.xls">
        </div>
     </div>

            <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
            <button type="submit"  name="updatedata" class="btn btn-primary" onclick="return confirm('Are you sure you want to save changes?')">SAVE CHANGES</button>
            </div>
            </form>
            </div>
                </div>
                    </div>
                        </div>
     <!-- END UPDATE MODAL -->

<!-- MAIN CONTENT-->
       <div class="main-content">
        <div class="section__content section__content--p30">
        <p style="font-size:30px;color:#000;font-weight:500;cursor:default;">LIQUIDATION REPORTS</p>
            <div class="d-flex justify-content-center align-items-center">
                <div style = "background-color:white;max-width:99%;padding:20px;box-shadow:1px 1px 12px 3px rgba(0,0,0,0.2);margin-top:30px;border-radius:1%;" class="table-responsive">
                     <p style="text-align:center;font-size:35px;color:#000;font-weight:500;cursor:default;">DETAILS OF EXPENSES REPORT</p>
                <button style="margin-bottom:10px;font-weight:500;" type="button" class="btn btn-primary" data-toggle="modal"
                             data-target="#addliquidationreports"data-backdrop="static" data-keyboard="false">ADD DATA</button> 
                     <table style = "margin-left:2px;font-size:1px;" id="tabledit" class="table table-striped table-bordered"> 
                          <thead>  
                               <tr style="font-weight:bolder;font-size:15px;color:#000;text-align:center;">  
                                    <td>NO</td>
                                    <td>LIQUIDATION ID</td>
                                    <td>DATE</td>
                                    <td>EVENT TITLE</td>    
                                    <td>FILE</td>
                                    <td>TOTAL COST</td>
                                    <td>CONFIRM BUDGET</td>    
                                    <td>EXCESS BUDGET</td>
                                    <td>SHORTAGE BUDGET</td>
                                    <td>ACTION</td>
                               </tr>  
                          </thead>  
                                <tbody>


<?php
$ao=$_SESSION['ao'];
$query = "SELECT *, (confirmbudget - totalcost) as excessbudget, (totalcost - confirmbudget) as shortagebudget FROM academicofficerliquidation ORDER BY id DESC";
$result = mysqli_query($conn, $query);
$cnt = 1;
     while($row = mysqli_fetch_array($result))
 {
?>  
                                            <tr style= "color:black;font-size:15px;text-align:center;font-weight:500;">
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo $row['id'];?></td> 
                                            <td><?php echo $row['eventdate'];?></td>
                                            <td><?php echo $row['eventtitle'];?></td>
                                            <td><a href="../academicadviser/academicofficerliquidation/<?php echo $row['file'];?>"><?php echo $row['file'];?></a></td> 
                                            <td><?php echo number_format($row['totalcost']);?></td>
                                            <td><?php echo  number_format($row['confirmbudget']);?></td>
                                            <td><?php $excessbudget = $row['excessbudget']; 
                                             if($excessbudget > 0) { ?> 
                                             <span style="color:green;letter-spacing:1px;"><?php echo number_format($row['excessbudget']);?></span>
                                            <?php } else { ?>
                                                <span> 0</span>
                                           <?php }?></td> 

                                            <td><?php $shortagebudget = $row['shortagebudget']; 
                                            if($shortagebudget > 0) { ?> 
                                             <span style="color:red;letter-spacing:1px;"><?php echo number_format($row['shortagebudget']);?></span>
                                            <?php } else { ?>
                                                <span> 0 </span>
                                           <?php }?></td> 
                                        
                                            <td><button style= "margin-top:5px;width:55px;" type="button" name="edit" id="edit" class="btn btn-primary editbtn"data-toggle="modal" data-target="#editLiquidation">EDIT</button>
                                            <button style= "max-width:75px;margin-top:5px;text-align:left" type="button" name="remove" id="remove" class="btn btn-primary removebtn">DELETE</button>
                                            </td>   
                                        </tr>
                                         <?php $cnt++; } ?>
                                </tbody>
                            </table> 

                        </div>  
                     </div>
                      <div class="col-md-12 mt-5">
                        <div class="copyright">
                            <p style = "color:#000;font-size:15px;font-weight:500;cursor:default;"class="credit"> ACTSTI CSG Organization - STICaloocan &nbsp; |  &nbsp; <i class="fa fa-home">
                            </i>  &nbsp; 109 Samson Road corner Caimito Street, Caloocan City 1400</p>  
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
    
    <!-- Vendor JS       -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.min.js"></script>
    <script src="vendor/slick/slick.min.js"></script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script></script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://twemoji.maxcdn.com/v/latest/twemoji.min.js" crossorigin="anonymous"></script>
    <script src="js/DisMojiPicker.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

    <script>
         $(document).ready(function(){
         });
     
 $(document).ready(function(){
     $(document).ready(function() {
                $('#tabledit').DataTable();
                    });

      $('#tabledit').DataTable({
            "pagingType":"full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive:true,
         });
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
},5000);

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

jQuery.validator.addMethod("numbersonly", function(value, element) {
    return this.optional(element) || /^([0-9,.])+$/.test(value);
    }, "Please enter numbers only");


$("#FormSubmit").validate({
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
        eventdate: {
            required:true
        },

        eventtitle: {
            required:true
        },

        overallcost: {
            required:true,
            numbersonly: true,
            maxlength:7
        },

        confirmbudget: {
            required: true,
            numbersonly: true,
            maxlength:7
        },

        file: {
            required:true
        },
    },

    messages: {
        eventdate: {
            required: "Event Date is required"
        },
        eventtitle: {
            required: "Event Title is required"
        },

        overallcost: {
            required: "Overall Cost is required",
            maxlength: "Please input a number that will not exceed 6 digits"
        },

        confirmbudget: {
            required: "Confirm Budget is required",
            maxlength: "Please input a number that will not exceed 6 digits"
        },

            file: {
            required: "Liquidation Report file is required"
        },
        },

    submitHandler: function(form) {
    console.log(form)
    form.submit();
    }
});

$('#FormSubmit').keyup(function(event) {
    $('.money').val(function(index, value) {
        return value.replace(/\D/g, "")
                    .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    });
});


$("#btnReset").on("click", function() {
    $("#FormSubmit").validate().resetForm();
    document.getElementById('FormSubmit').reset();
});

$('#datepicker').datepicker({
    uiLibrary: 'bootstrap4'
});

$('#date').datepicker({
    uiLibrary: 'bootstrap4'
});
         

$('.editbtn').on('click', function() {
        $('#editLiquidation').modal('show');

    $tr = $(this).closest('tr');
    var table = $tr.children("td").map(function() {
        return $(this).text();
        }).get();

    console.log(table);

    $('#updateid').val(table[1]);
    $('#datepicker').val(table[2]);
    $('#eventTitle').val(table[3]);
    $('#overallCost').val(table[5]);
    $('#confirmBudget').val(table[6]);
    
});


$('.removebtn').on('click', function() {
    $('#removemodal').modal('show');

$tr = $(this).closest('tr');
    var table = $tr.children("td").map(function() {
        return $(this).text();
                }).get();

console.log(table);

$('#remove_id').val(table[1]);
});


$( "#FormEdit" ).validate({
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
        eventdate: {
            required:true
        },

        eventtitle: {
            required:true
        },

        overallcost: {
            required:true,
            numbersonly:true,
            maxlength:7
        },

        confirmbudget: {
            required: true,
            numbersonly:true,
            maxlength:7
        },

        file: {
            required:true
        }
    },

    messages: {
        eventdate: {
            required: "Event Date is required"
        },
        eventtitle: {
            required: "Event Title is required"
        },

        overallcost: {
            required: "Overall Cost is required",
            maxlength: "Please input a number that will exceed 6 digits"
        },

        confirmbudget: {
            required: "Confirm Budget is required",
            maxlength: "Please input a number that will exceed 6 digits"
        },

        file: {
            required: "Liquidation Report File is required"
        },
    },

    submitHandler: function(form) {
    console.log(form)
    form.submit();
    }
});

$('#FormEdit').keyup(function(event) {
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
<!-- END OF DOCUMENT -->
