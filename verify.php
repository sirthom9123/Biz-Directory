<?php
	include('object.php');
	include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>BizPortal | Verify</title>
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
	$i = 5;
	include('session.php');
	include('header.php');
	include('injection.php');
?>
<!-- Header End -->
<div id="maincontainer">
  <section id="product">
    <div class="container">      
      <!-- Product Details-->
      <div class="row">
       <!-- Left Image-->
        <div class="span12">
			<div class="checkoutsteptitle">Email Verification<a class="modify"></a></div>
        </div>
        <?php
                $email = isset($_POST['email'])? $_POST['email']:'';

                $query = "SELECT * FROM users WHERE username='$username'";
                $result = mysqli_query($connection, $query);

                if (mysqli_num_rows($result) == 0) {
                    $user = mysqli_fetch_assoc($result);
                    $query = "UPDATE users set status='1' WHERE username='$username'";
                    if (mysqli_query($connection, $query)) {
                    ?>
                        <div class="successmsg alert alert-autocloseable-success">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <p  align="center">
                        Your email address has been verified successfully
                        </p>
                        </div>
                    <?php
                        header("refresh:2;url=login.php");
                    }
                }else {
                    ?>
                    <div class="errormsg alert alert-autocloseable-danger">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <p align="center">
                            Could not find user!
                        </p>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>   
	</section>
</div>

<!-- Footer -->
<?php include('footer.php'); ?>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script language="javascript" type="text/javascript">
	function showRow(row){
		var x=row.cells;
		document.getElementById("id").value = x[0].innerHTML;
		document.getElementById("idd").value = x[0].innerHTML;
		document.getElementById("der").value = x[0].innerHTML;
	}
</script>
<?php include('autoclose.php'); ?>
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
<?php include('filtertable.php'); ?> 
</body>
</html>