<?php
	include('object.php');
	include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>BizPortal | Contact</title>
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
	$i = 2;
	if(isset($_SESSION['user_logged_in']))
	{
		header('Location:contact.php');
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
        <li class="active">Contact</li>
      </ul>  
      <!-- Contact Us-->
      <h1 class="heading1"><span class="maintext">Contact</span><span class="subtext"> Contact Us for more</span></h1>
      <div class="row">
        <div class="span9">
          <form class="form-horizontal" action="formmail.php" method="POST">
            <fieldset>
              <div class="control-group">
                <label for="name" class="control-label">Name <span class="required">*</span></label>
                <div class="controls">
                  <input type="text"  required id="name" value="" name="name">
                </div>
              </div>
              <div class="control-group">
                <label for="email" class="control-label">Email <span class="required">*</span></label>
                <div class="controls">
                  <input type="email" required class="email" id="email" value="" name="email">
                </div>
              </div>
              <div class="control-group">
                <label for="url" class="control-label">Subject</label>
                <div class="controls">
                 <input type="text" required id="subject" value="" name="subject">
                </div>
              </div>
              <div class="control-group">
                <label for="message" class="control-label">Message</label>
                <div class="controls">
                  <textarea  required rows="6" cols="40" id="message" name="message"></textarea>
                </div>
              </div>
			  <div class="control-group">
                <div class="controls">
					Send also to my email? <input type="radio" id="me" value="me" name="me">
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" class="btn btn-primary" value="Submit" id="submit_id">
                <input type="reset" class="btn btn-danger" value="Reset">
              </div>
            </fieldset>
          </form>
        </div>
        
        <!-- Sidebar Start-->
        <div class="span3">
          <aside>
            <div class="sidewidt">
              <h2 class="heading2"><span>Contact Info</span></h2>
              <p>123 Your Address<br>
                City<br>
				Province<br>
                Country<br>
				Code<br>
				<br>
                Phone: +2771 0000000<br>
                Fax: +2771 0000000<br>
                Email: <a href="mailto:hello@yourdomain.co.za">hello@yourdomain.co.za</a><br>
                Web: <a href="http://www.DevFix.co.za"></a><br>
              </p>
            </div>
          </aside>
        </div>
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
<script defer src="js/custom.js"></script>
</body>
</html>