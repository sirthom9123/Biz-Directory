<?php
	include('object.php');
	include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>BizPortal | Home</title>
<?php include('icon.php'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,400italic,600,600italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
<link href="css/bootstrap.css" rel="stylesheet">
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
	$i = 1;
	if(isset($_SESSION['user_logged_in']))
	{
		header('Location:index.php');
	}
	include('header.php'); 
?>
<!-- Header End -->

<div id="maincontainer">
  <!-- Slider Start-->
  <section class="slider">
    <div class="container">
     <div class="html_carousel">
        <div id="mainslider3">
          <div class="item">
            <div>
              <a href="#"><img src="img/simple.jpg" alt="" title="" /></a>
              <div class="text">
                <h1 class="productname"><span class="bgnone">Business portal</span></h1>
                <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s </p>
                
                <br>
                <a href="#">MORE</a>
              </div>
            </div>
          </div>
          <div class="item">
            <div>
              <a href="#"><img src="img/advert.jpg" alt="" title=""  /></a>
              <div class="text">
                <h1 class="productname"><span class="bgnone">Be the genius of your future.</span></h1>
                <p>Banner for your site portal </p>
                 
                <br>
                <a href="#">MORE</a>
              </div>
            </div>
          </div>
		  <div class="item">
            <div>
              <a href="#"><img src="img/advert2.jpg" alt="" title=""  /></a>
              <div class="text">
                <h1 class="productname"><span class="bgnone">Advertising space and more.</span></h1>
                <p> Your potential clients are looking at this. </p>
                <!-- <div class="productprice">
                  <div class="productpageprice">
                    <span class="spiral"></span></div> -->
                </div>
                <br>
                <a href="#">MORE</a>
              </div>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </section>
  <!-- Slider End-->
  
  <!-- Section Start-->
  <section class="container otherddetails">
    <div class="otherddetailspart">
      <div class="innerclass free">
        <h2>SERVICES</h2>
         </div>
		 <p>This is a business portal distributing opportunities to various SMME's listed.</p>
    </div>
    <div class="otherddetailspart">
      <div class="innerclass payment">
        <h2>MISSION</h2>
          </div>
		  <p>To be a relevant advocacy organisation responsible for growing the culture of youth entrepreneurship and to drive the economy of the province.</p>
    </div>
    <div class="otherddetailspart">
      <div class="innerclass shipping">
        <h2>ABOUT US</h2>
        </div>
		<p>Amongst other reasons for the two institutions to partner in this project were to address the challenges that are faced by Youth led SMME's and Co-operatives</p>
    </div>
    <div class="otherddetailspart">
      <div class="innerclass choice">
        <h2>JOINING US</h2>
         </div>
		 <p> Join Us today and explore the various opportunities listed.</p>
    </div>
  </section>
  <!-- Section End-->

  <!-- Section  Banner Start-->
  <section class="container smbanner">
    <div class="row">
      <div class="span3"><a href="#"><img src="img/smbanner.jpg" alt="" title=""></a>
      </div>
      <div class="span3"><a href="#"><img src="img/smbanner.jpg" alt="" title=""></a>
      </div>
      <div class="span3"><a href="#"><img src="img/smbanner.jpg" alt="" title=""></a>
      </div>
      <div class="span3"><a href="#"><img src="img/smbanner.jpg" alt="" title=""></a>
      </div>
    </div>
  </section>
  <!-- Section  End-->
  
  <!-- Popular Brands-->
	<?php include('partners.php'); ?>
  
  <!-- Newsletter Signup-->
  <section id="newslettersignup" class="mt40">
    <div class="container">
      <div class="pull-left newsletter">
        <h2> Newsletters Signup</h2>
        Sign up to Our Newsletter & get lattest news regarding market by subscribing to our newsletters. </div>
      <div class="pull-right">
        <form class="form-horizontal" method="POST" action="index.php">
          <div class="input-prepend">
            <input type="email" required placeholder="Subscribe to Newsletter" id="inputIcon" class="input-xlarge">
            <input value="Subscribe" class="btn btn-orange" type="submit">
            Sign in           
          </div>
        </form>
      </div>
    </div>
  </section>
</div>
<!-- /maincontainer -->

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