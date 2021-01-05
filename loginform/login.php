<?php
session_start();
include("include/connection.php");
if(isset($_SESSION["user_name"])) {
header("Location:../loginform/academicadviser/index.php");
}
else if (isset($_SESSION["username"])) {
  header('Location:../loginform/academicofficer/index.php');
}
else if (isset($_SESSION["user_namee"])) {
  header('Location:../loginform/academicadviser/index.php');
}

?>

<?php
if (isset ($_POST['submit'])) {

  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $message = "Invalid Username or Password!";
  $activeMessage = "Your account is still inactive. Please contact the Academic Adviser to activate your account.";
  $query = "SELECT * FROM csgname WHERE BINARY username = '$username' and BINARY password = '$password'";	
  $data = mysqli_query($conn, $query);
  

  if (mysqli_num_rows($data) == 1) {
      $result  = mysqli_fetch_array($data);
        if ($result['usertype'] == 'Academic Officer') {
          if($result['Status'] == 1){
            $_SESSION['username'] = $username;
            $_SESSION['ao'] = $result['id'];
            header('Location:../loginform/academicofficer/index.php');
            exit;
          } else {
            echo "<script type='text/javascript'>alert('$activeMessage');</script>";
          }
        }
        else if ($result['usertype'] == 'Academic Adviser') {
           $_SESSION['user_name'] = $username;
           $_SESSION['ad'] = $result['id'];
           $_SESSION['ai'] = $result['file'];
           header('Location:../loginform/academicadviser/index.php');
           exit;
        } 
        else if ($result['usertype'] == 'Academic Student') {
          if($result['Status'] == 1){
           $_SESSION['usernamee'] = $username;
           $_SESSION['aid'] = $result['id'];
           header('Location:../loginform/academic/index.php');
        } else {
            echo "<script type='text/javascript'>alert('$activeMessage');</script>";
          }
        }
        else if ($result['usertype'] == 'Student Adviser') {
           $_SESSION['user_namee'] = $username;
           $_SESSION['aidv'] = $result['id'];
           header('Location:../loginform/academicadviser/index.php');
        } 
           
  } else  {
   	echo "<script type='text/javascript'>alert('$message');</script>";
  }
}

?>


<!DOCTYPE html>
<html>
<head>
	
	
	<title>ACTSTI:&nbsp; Login&nbsp; | &nbsp; STICaloocan</title>
  <link rel ="icon" href ="img/csg.jpg">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
		<!--=====================================================
			CSS Stylesheets
		=====================================================-->
		<link rel='stylesheet' type='text/css' href='bootstrap/css/bootstrap.min.css' >
		<link rel='stylesheet' type='text/css' href='css/linea.css' >
		<link rel='stylesheet' type='text/css' href='css/ionicons.min.css' >
		<link rel='stylesheet' type='text/css' href='css/owl.carousel.css' >
		<link rel='stylesheet' type='text/css' href='css/magnific-popup.css' >
		<link rel='stylesheet' type='text/css' href='css/style.css' >
		 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	 <!-- Compiled and minified CSS -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
    <!-- BootstrapValidator JS -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.bootstrapvalidator/0.5.0/js/bootstrapValidator.min.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

     <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Lexend+Peta&display=swap" rel="stylesheet"> 

    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet"> 
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

	<div class='main-content'>

		<!--=====================================================
				Page Borders
			=====================================================-->
			<div class='page-border border-left' ></div>
			<div class='page-border border-right' ></div>
			<div class='page-border border-top' ></div>
			<div class='page-border border-bottom' ></div>


	<section  id='intro' class='section section-main active' >

	<div  class='container-fluid' >
						
						<div class='v-align' >
							<div class='inner' >
								<div class='intro-text' >
									
									<h1 style="font-family: 'Black Ops One', cursive; font-size:70px;">ACTSTI LOGIN </h1>
									
									<p>
										Central Government Organization
									</p>
									
									<div class='intro-btns' >
										
										 <a href="#login" class="btn-custom section-toggle modal-trigger">CSG LOGIN</a>
										
										<a href='../index.php' class='btn-custom section-toggle' data-section='contact' >
											Home
										</a>			
									</div>
									
								</div>

							</div>
							
						</div>

					</div>

				</div>
			</section>


  <div style="border-radius:2%;margin-top:10px!important;"  id="login" class="modal">
   <h5 style="color:#005baa; font-size: 20px;" class="modal-close">&#10005;</h5>
   
    <div class="modal-content">
      <center><img src="img/2.png" alt="Avatar" class="avatar"></center>
      <h1 style = "cursor: default;font-size:50px;color:#005baa;font-family: 'Black Ops One', cursive;letter-spacing:2px;"class="csg">ACTSTI</h1>
      <p style="text-align: center;font-family: 'Montserrat', sans-serif;letter-spacing:2px;font-size:17px;margin-bottom:30px;">Login Form</p>
    <form action="" method="post" id="formValidate">

      <div style="font-size: 13px; color:red;text-align:right;" class="input-field">
        <i style="cursor: default;color:#005baa;margin-left:-17px;"class="material-icons prefix">person</i>
          <input type="text" maxlength = "25" autocomplete="off" id="name" name="username" class="validate"  required="" aria-required="true">
            <label for="name">Username</label>
              </div>
                  

      <div style="margin-bottom: 30px;font-size:13px; color:red;text-align: right;" class="input-field">
        <i style="cursor: default;color:#005baa;margin-left:-17px;" class="material-icons prefix">lock</i>
         <input type="password" maxlength = "25"autocomplete="off" id="pass" name="password" class="validate"  required="" aria-required="true">
          <label for="pass">Password</label>
           </div>
      <div style="font-size:13px;color:red;text-align:right;" class="input-field">
         <a style="text-align: left;margin-to: 65px; margin-bottom: 50px;" href="#modal2" class="modal-close  modal-trigger">Forgot Password?</a>
              </div>
                  </div>

    
      <input style="margin-top: 25px;" type="submit" name="submit" id ="btnsubmit" value="Login" class="btn btn-large" >
    </form>
      </div>
        </div>

         <div style="border-radius:2%;margin-top:200px!important;"  id="modal2" class="modal ">
          <a style="text-align: left; margin-bottom: 50px; font-size: 20px;" href="#login" class="modal-close  modal-trigger">&#10005;</a>
  
    <div class="modal-content">
      <center><img src="img/2.png" alt="Avatar" class="avatar"></center>
      <h1 style = "cursor: default;font-size:50px;color:#005baa;font-family: 'Black Ops One', cursive;letter-spacing:2px;"class="csg">ACTSTI</h1>
      <h1 style = "cursor: default;font-size:20px;color:#005baa;"class="csg">Please Contact your </h1>
      <h1 style = "cursor: default;font-size:20px;color:#005baa;"class="csg">Administrator</h1>
    <form method="post" id="emailvalidate">

            <input style="margin-top: 25px;" type="hidden" formaction ="mail.php" name="submit" id ="btnsubmit" value="submit" class="btn btn-large" >
            
                        </div>
                      </form>


			<!--=====================================================
			JavaScript Files
		=====================================================-->

		<script src='js/jquery.shuffle.min.js' ></script>
		<script src='js/owl.carousel.min.js' ></script>
		<script src='js/jquery.magnific-popup.min.js' ></script>
		<script src='js/validator.min.js' ></script>
		<script src='js/script.js' ></script>
		
		
       

        <script>
	$(document).ready(function() {
    $("select[required]").css({ display: "block", height: 0, padding: 0, width: 0, position: 'absolute'});
		$('.modal').modal();
		$('select').formSelect();
});


$("#formValidate").validate({
    rules: {
      username: {
        required: true,
        minlength:8
    },
     password: {
        required: true,
        minlength: 8
      },
    },  
      messages: {
      username: {
        required: "Please enter a username.",
        minlength: "Must be at least 8-16 characters."
      },
       password: {
        required: "Please enter a password.",
        minlength: "Must be at least 8-16 characters."
      },
    },
     errorElement: 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
  });

$("#emailvalidate").validate({

    feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },

  rules: {
      email: {
        required: true,
       
    },
  },
  messages: {
      email: {
        required: "Please enter a valid email address.",
        
      },
    },
    errorElement: 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
  });

</script>

</body>
</html>