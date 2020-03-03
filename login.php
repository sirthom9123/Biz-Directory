<?php
	include('object.php');
	include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>BizPortal | Login</title>
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
        <li class="active">Login</li>
      </ul>
       <!-- Account Login-->
      <div class="row">  
        <div class="span9">
          <h1 class="heading1"><span class="maintext">Login</span></h1>
		  <?php
			$username = isset($_POST['username'])?  $_POST['username']:'';
			$password = isset($_POST['password'])?  $_POST['password']:'';
			
			
			if($_POST)
			{
				
				$q = "SELECT * FROM users WHERE username = '$username' AND password = SHA1('$password') AND status=1";
				$r = mysqli_query($connection,$q);
				$row = mysqli_fetch_array($r);
				
				if($row)
				{
					$_SESSION['user_logged_in'] = SHA1($row['username']);
					header('Location:home.php');
				}
				else
				{
					?>
					<div class="alert alert-danger">
						<a href="#" class="close" data-dismiss="alert">&times;</a>
						<div class="panel panel-danger">
							<div class="panel-heading color text-center">
								<strong>Can't Login, Possible reasons.</strong>
							</div><!--END panel heading-->
							<div class="panel-body">
									<p><strong>1. Username and password not Correct</strong></p>
									<p><strong>2. Or your account has expired and need to be activated,Please consult administrator if you know you haven't activated your account for the current year.</strong></p>
							</div>
						</div>
					</div>
					<?php
				}
			}
		?>	
          <section class="returncustomer">
            <h2 class="heading2">Account Login </h2>
            <div class="loginbox">
              <form class="form-vertical" method="POST" action="login.php">
                <fieldset>
                  <div class="control-group">
                    <label  class="control-label">Username:</label>
                    <div class="controls">
                      <input type="text" required class="span3" value="<?php echo $username; ?>" name="username">
                    </div>
                  </div>
                  <div class="control-group">
                    <label  class="control-label">Password:</label>
                    <div class="controls">
                      <input type="password" required class="span3" name="password">
                    </div>
                  </div>
                  <a class="" href="reset_login.php">Forgotten Password</a>
                  <br>
                  <br>
				  <input type="Submit" class="btn btn-orange" value="Login">
                </fieldset>
              </form>
            </div>
          </section>
		  <section class="newcustomer">
            <h2 class="heading2">New Business </h2>
            <div class="loginbox">
              <h4 class="heading4"> Register Account</h4>
              <p>By creating an account you will be able to not only register your business but also your business profile as a whole.</p>
              <br>
              <p>Registering your business here would constitute to your business a great deal as people will get to know about your company, the services it offers easily. Cheap marketing at your disposal.</p>
              <br>
              <a href="register.php" class="btn btn-orange">Create Account</a>
            </div>
          </section>
        </div>
        
        <!-- Sidebar Start-->
        <aside class="span3">
          <div class="sidewidt">
            <h2 class="heading2"><span>Experiencing Problems</span></h2>
            <ul class="nav nav-list categories">
              <li>
                <a href="reset_login.php"> Forgot Password</a>
              </li>
              <li>
                <a href="reset_login.php">Forgot Username</a>
              </li>
            </ul>
          </div>
        </aside>
        <!-- Sidebar End-->
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