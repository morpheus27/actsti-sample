<?php
include("include/connection.php");
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
       <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel ="icon" href ="img/csg.jpg">
        <title>ACTSTI &nbsp; | &nbsp; STICaloocan</title>
        
       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Bungee&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Black+Ops+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Enriqueta&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/tooplate-style.css">
        
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

        <style>
          
           #contain
        {
            width: 250px;
            display: inline-block;  
            margin-right:50px;
        }

        #p3 .project-item img {
        box-shadow:1px 2px 10px 5px rgba(0,0,0,0.7);
        }

        </style>

    </head>
    <body>

      <!--=====================================================
      Preloader
    =====================================================-->

    <div id='preloader' >
      <div class='loader' ></div>
      <div class='left' ></div>
      <div class='right' ></div>
    </div>

             
        <div class="ct" id="t1">
          <div class="ct" id="t2">
            <div class="ct" id="t3">
              <div class="ct" id="t4">
               
                <section> 
                 <ul>
                   <a href="#t1"><li  class="icon fa fa-home" id="uno"><p  class="home">Home</p></li></a>
                   <a href="#t2"><li class="icon fa fa-user" id="dos"><p class="about">About Us</p></li></a>
                   <a href="#t3"><li class="icon fa fa-image" id="tres"><p class="gallery">Our Gallery</p></li></a>
                   <a href="#t4"><li class="icon fa fa-phone" id="cuatro"><p class="contact">Contact Us</p></li></a>

                 </ul>
                  <div class="page" id="p1">
                     <li  class="icon"><span class="title">ACTSTI</span><p class = "centralstudent">CENTRAL STUDENT</p><p class= "government">GOVERNMENT</p><div style="margin-top: 10px;" class="primary-button"><a style = "color:white;"href="loginform/login.php" class="btn btn-large teal modal-trigger">Proceed</a></div>
                   </li>   
                  </div>

                  <?php
                    $query = "SELECT * FROM aboutus";
                    $data = mysqli_query($conn, $query);
                    $result = mysqli_fetch_array($data);
                   ?>

                  <div class="page" id="p2">
                    <li class="icon fa fa-user"><span class="title">About Us</span>
                    <div  class="container">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="left-text">
                            <h4 style = "text-align: center; margin-top: 0px;">Our Vision</h4>
                            <p style="text-align:center;font-size:15px;"><?php echo $result['vision'];?><br><br></p>
                            <h4 style = "text-align: center;">Our Mission</h4>
                            <p style="text-align:center;font-size:15px;"><?php echo $result['mission'];?></p>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="right-image">
                           <video autoplay="autoplay" muted="muted" loop="loop">
                            <source src="mp4/<?php echo $result['file'];?>" type="video/mp4">
                            </video>
                          </div>
                        </div>
                      </div>
                    </div>
                    </li>
                  </div> 

                   <?php
                    $query = "SELECT * FROM gallerytitle";
                    $data = mysqli_query($conn, $query);
                    $result = mysqli_fetch_array($data);
                    $res = $result['title'];
                   ?>

                  <div class="page" id="p3">
                    <li class="icon fa fa-image"><span class="title">Our Gallery</span>
                       <h1 class="title"><?php echo $result['title']?></h1>
                      <?php 
                      $query = "SELECT * FROM gallery";
                      $data = mysqli_query($conn, $query);
                      while($row = mysqli_fetch_array($data)) {
                          $images = $row['file'];  
                        ?>

                         <div id = "contain"  class="container">
                         <div  class="row">
                          <div class="col-md-3">
                            <div class="project-item">
                              <a href="loginform/academicadviser/csgphotos/<?php echo $images?>" data-lightbox="image-1">
                              <img style="width:280px;height:280px;border:2px solid white;" src="loginform/academicadviser/csgphotos/<?php echo $images?>"></a>
                            </div>
                          </div>
                        </div>
                         <p class="title"style="font-size:12px;margin-top:-5px;letter-spacing:2px;width:130%;"><b><?php echo $row['lastname'];?>,&nbsp;<?php echo $row['firstname'];?></b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<?php echo $row['position'];?>)</p>
                      </div>

                      <?php } ?>
                    </li>
                  </div>


                  <div class="page" id="p4">
                   <li class="icon fa fa-phone"><span class="title">Contact Us</span>
                    <div class="container">
                      <div class="row">
                        <div class="col-md-6">
                           <form id="contact" action="" method="post">
                              <div class="col-md-12">
                                <fieldset>
                                  <input name="name" type="text" class="form-control" id="name" placeholder="Your Name" required>
                                </fieldset>
                              </div>
                              <div class="col-md-12">
                                <fieldset>
                                  <input name="email"  type="email" class="form-control" id="email" placeholder="Email" required>
                                </fieldset>
                              </div>
                              <div class="col-md-12">
                                <fieldset>
                                  <textarea name="message" rows="6" class="form-control" id="message" placeholder="Message" required></textarea>
                                </fieldset>
                              </div>
                              <div class="col-md-12">
                                <fieldset>
                                  <button type="submit" id="form-submit" class="btn">Send Message</button>
                                </fieldset>
                              </div>
                            </form>
                         </div>
                         <div class="col-md-6">
                           <div class="right-info">
                            <div class = "google-maps">
                              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15439.869498173437!2d120.9768921!3d14.657793!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3d9535d772602f32!2sSTI+College+Caloocan!5e0!3m2!1sen!2sph!4v1566296648311!5m2!1sen!2sph" width="480" height="400" frameborder="0" style="border:0" allowfullscreen>
                              </iframe></div>
                              <ol class="social-icons">
                                <i><a href="#"><i class="fa fa-facebook"></i></a></i>
                                <i><a href="#"><i class="fa fa-twitter"></i></a></i>
                                <i><a href="#"><i class="fa fa-linkedin"></i></a></i>
                                <i><a href="#"><i class="fa fa-rss"></i></a></i>
                                <i><a href="#"><i class="fa fa-behance"></i></a></i>
                              </ol> 
                            </div>
                         </div>
                      </div>
                    </div>
                   </li>
                  </div> 
                   
                  <p class="credit" style="font-size:13px;"> STI Academic Center - Caloocan &nbsp; |  &nbsp; <i class="fa fa-home"></i>  &nbsp; 109 Samson Road corner Caimito Street, 
                  Caloocan City 1400</p>
                </section>
              </div>
            </div>
           </div>
          </div>

            <!--=====================================================
      JavaScript Files
    =====================================================-->

   


        <script src='jsonn/jquery.shuffle.min.js' ></script>
        <script src='jsonn/owl.carousel.min.js' ></script>
        <script src='jsonn/jquery.magnific-popup.min.js' ></script>
        <script src='jsonn/validator.min.js' ></script>
        <script src='jsonn/script.js' ></script>



        
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');

        </script>
    </body>
</html>