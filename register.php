<?php
	include('object.php');
  include 'connect.php';
  require_once 'sendmail.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>BizPortal | Register Account</title>
<?php include('icon.php'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,400italic,600,600italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'><link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/flexslider.css" type="text/css" media="screen" rel="stylesheet"  />
<link href="css/jquery.fancybox.css" rel="stylesheet">
<link href="css/cloud-zoom.css" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<!-- fav -->
<link rel="shortcut icon" href="assets/ico/favicon.html">
</head>
<body>
<!-- Header Start -->
<?php 
	$i = 3;
	include('header.php');
?>
<!-- Header End -->

<div id="maincontainer">
    <div class="container">
     <!--  breadcrumb --> 
      <ul class="breadcrumb">
        <li>
          <a href="#">Home</a>
          <span class="divider">/</span>
        </li>
        <li class="active">Register Account</li>
      </ul>
      <div class="row">  
        <!-- Register Account-->
		    <?php
					$email = isset($_POST['email'])?  $_POST['email']:'';
					$surname = isset($_POST['surname'])?  $_POST['surname']:'';
					$names = isset($_POST['names'])?  $_POST['names']:'';
					$username = isset($_POST['username'])?  $_POST['username']:'';
					$password = isset($_POST['password'])?  $_POST['password']:'';
          $confirm_password = isset($_POST['confirm_password'])?  $_POST['confirm_password']:'';
          

              
					$race = isset($_POST['race'])?  $_POST['race']:'';

					if(isset($_POST['register']))
					{
						if($password == $confirm_password)
						{
							$query = "SELECT * from users where username='$username'";
							$subject_set = mysqli_query($connection,$query); 
              $row = mysqli_fetch_array($subject_set);
              
              //Generate vkey
		          $vkey = md5(time());

							if(!$row)
							{
								$query ="INSERT INTO users VALUES ('".$username."',
																	   '".$surname."',
																	   '".$names."',
																	   '".$email."',
																	   '".SHA1($password)."',
																	   '1'
																	   )";
								if(mysqli_query($connection,$query))
								{
                  //send verification email to user
                  sendVerificationEmail($email, $vkey);
                  ?>
                  <div class="successmsg alert">You need to verify your email address!
                    Sign into your email account and click on the verification link we just emailed you.
                  </div>
                    <?php
                    header("refresh:3;url=login.php");
                }
                else
                {
                  ?>
                    <div class="errormsg alert">
                      <a class="clostalert">close</a>
                      <strong>Error!</strong> Could not create an account. Please try again. 
                    </div>
                  <?php
                }
              }
                else
                {
                  ?>
                    <div class="errormsg alert">
                      <a class="clostalert">close</a>
                      <strong>Alert!</strong> An account with the same username already exists, please use another username.
                    </div>
                  <?php
                }
              }
              else
              {
                ?>
                  <div class="errormsg alert">
                    <a class="clostalert">close</a>
                    <strong>Alert!</strong> Passwords do not match. Please enter same passwords
                  </div>
                <?php
              }
            }
				  ?>
       
        <div class="span9">
          <h1 class="heading1"><span class="maintext">Register Account</span><span class="subtext">Register Your details with us</span></h1>
          <form class="form-horizontal" method="POST" action="register.php">
            <h3 class="heading3">Your Personal Details</h3>
            <div class="registerbox">
              <fieldset>
                <div class="control-group">
                  <label class="control-label"><span class="red">*</span> Username:</label>
                  <div class="controls">
                    <input type="text" required class="input-xlarge" value="<?php echo $username; ?>" name="username">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><span class="red">*</span> Names:</label>
                  <div class="controls">
                    <input type="text" required class="input-xlarge" value="<?php echo $names; ?>" name="names">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><span class="red">*</span> Surname:</label>
                  <div class="controls">
                    <input type="text" required class="input-xlarge" value="<?php echo $surname; ?>" name="surname">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><span class="red">*</span> Email:</label>
                  <div class="controls">
                    <input type="email" required class="input-xlarge" value="<?php echo $email; ?>" name="email">
                  </div>
                </div>
				    <div class="control-group">
                  <label  class="control-label"><span class="red">*</span> Password:</label>
                  <div class="controls">
                    <input type="password" required class="input-xlarge" name="password">
                  </div>
                </div>
                <div class="control-group">
                  <label  class="control-label"><span class="red">*</span> Confirm Password:</label>
                  <div class="controls">
                    <input type="password" required class="input-xlarge" name="confirm_password">
                  </div>
                </div>
              </fieldset>
            </div>
            <div class="pull-right">
              <label class="checkbox inline">
                <input type="checkbox" required value="agree" >
              </label>
              I have read and agree to the <a href="#" >Privacy Policy</a>
              &nbsp;
              <input type="Submit" class="btn btn-orange" name="register" value="Continue">
            </div>
          </form>
          <div class="clearfix"></div>
          <br>
        </div>
      </div>
    </div>
</div>

<!-- Footer -->
<?php include('footer.php'); ?>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/respond.min.js"></script>
<script src="js/application.js"></script>
<script src="js/bootstrap-tooltip.js"></script>
<script defer src="js/jquery.fancybox.js"></script>
<script defer src="js/jquery.flexslider.js"></script>
<script type="text/javascript" src="js/jquery.tweet.js"></script>
<script  src="js/cloud-zoom.1.0.2.js"></script>
<script  type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript"  src="js/jquery.carouFredSel-6.1.0-packed.js"></script>
<script type="text/javascript"  src="js/jquery.mousewheel.min.js"></script>
<script type="text/javascript"  src="js/jquery.touchSwipe.min.js"></script>
<script type="text/javascript"  src="js/jquery.ba-throttle-debounce.min.js"></script>
<script defer src="js/custom.js"></script>
</body>
</html>