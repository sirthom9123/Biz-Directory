<?php
	include('object.php');
	include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>BizPortal | Reset Credentials</title>
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
	if(isset($_SESSION['user_logged_in']))
	{
		header('Location:home.php');
	}
	include('header.php'); 
?>
<!-- Header End -->

<div id="maincontainer">
  <section id="product">
    <div class="container">
      <!--  breadcrumb --> 
      <ul class="breadcrumb">
        <li>
          <a href="#">Home</a>
          <span class="divider">/</span>
        </li>
        <li class="active">Reset Login</li>
      </ul>
       <!-- Account Login-->
      <div class="row">  
        <div class="span12">
          <h1 class="heading1"><span class="maintext">Reset Login Credentials</span></h1>
		  <?php
			$email = isset($_POST['email'])?  $_POST['email']:'';
			
			
			if($_POST)
			{
				
				$q = "SELECT * FROM users WHERE email = '$email'";
				$r = mysqli_query($connection,$q);
				$row = mysqli_fetch_array($r);
				
				if($row)
				{
					$_SESSION['reset_login'] = SHA1($row['email']);
					
					$link = '<a href="" target=".."></a>';
					$to = $emal;
					$subject = "Reset Login Credentails,YCCISA Free State";
					$message = "Your username:".$row['username'].", <br/>"
								."Use the link below to reset your password<br/>"
								.".$link.";
					$headers = "From: $surname,$names";

					mail($to, $subject, $message, $headers);
					
					header('Location:confirm_reset.php');
				}
				else
				{
					?>
						<div class="alertmsg alert alert-autocloseable-danger">
							<a class="clostalert">close</a>
							<strong>Error!</strong> We couldn't find the account with the email you provided. 
							Use the email address you used when you first created an account.
						</div>
					<?php
				}
			}
		?>	
          <section class="returncustomer">
            <h2 class="heading2">Returning Customer </h2>
            <div class="loginbox">
              <form class="form-vertical" method="POST" action="reset_login.php">
                <fieldset>
                  <div class="control-group">
                    <label  class="control-label">Email:</label>
                    <div class="controls">
                      <input type="email" required class="span3" name="email">
                    </div>
                  </div>
				  <input type="Submit" class="btn btn-orange" value="Recover">
                </fieldset>
              </form>
            </div>
          </section>
		  <section class="newcustomer">
            <h2 class="heading2">Recovering credentials</h2>
            <div class="loginbox">
              <p>Recovering your credentials</p>
              <br>
              <p>When you recorver your lost credentials, the system will send you an email, that will contain your username always.
				 If you are recovering a password, you will be provided with a link through your email to recover your password.</p>
              <br>
              <a href="register.php" class="btn btn-orange">Create Account</a>
            </div>
          </section>
        </div>
      </div>
    </div>
  </section>
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
<script defer src="js/custom.js"></script><strong></strong>
</body>
</html>