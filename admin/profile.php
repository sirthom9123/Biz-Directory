<?php
	include('object.php');
	include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>BizPortal | Profile</title>
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
	$i = 4;
	include('session.php');
	include('header.php');
	include('injection.php');
?>
<!-- Header End -->
<?php
	$reg = isset($_GET['reg'])? ($_GET['reg']): '';
	$reg = removeBadCharacters($reg);
	
	$query = "SELECT * FROM company_details WHERE reg_no='$reg'";
	$subject_set = mysqli_query($connection,$query); 
	$row = mysqli_fetch_array($subject_set);
	
	$reg_no = $row['reg_no'];
	$enterprise_name = $row['enterprise_name'];
	$enterprise_type = $row['enterprise_type'];
	$tax_number = $row['tax_number'];
	$registration_date = $row['registration_date'];
	$province = $row['province'];
	$municipality = $row['municipality'];
	$location = $row['location'];
	$postal_address = $row['postal_address'];
	$physical_address = $row['physical_address'];
	$telephone = $row['telephone'];
	$email = $row['email'];
	$business_turnover = $row['business_turnover'];
	$category = $row['category'];
	$status = $row['status'];
	$employees = $row['employees'];
	$assets = $row['assets'];
	$website = $row['website'];
	$account = $row['account'];
	$bank = $row['bank'];
	$logo = $row['logo'];
	$description = $row['description'];
?>
<div id="maincontainer">
  <section id="product">
    <div class="container">      
      <!-- Product Details-->
      <div class="row">
       <!-- Left Image-->
        <div class="span5">
          <ul class="thumbnails mainimage">
            <li class="span5">
              <a  rel="position: 'inside' , showTitle: false, adjustX:-4, adjustY:-4" class="thumbnail cloud-zoom" href="<?php if($logo == '') echo 'image/default.jpg'; else echo '../y/profiles/'.$logo; ?>">
                <img src="<?php if($logo == '') echo 'image/default.jpg'; else echo '../y/profiles/'.$logo; ?>" alt="" title="">
              </a>
            </li>
          </ul>
        </div>
         <!-- Right Details-->
        <div class="span7">
          <div class="row">
            <div class="span7">
              <h1 class="productname"><span class="bgnone"><?php echo $enterprise_name.'  ('.$reg_no.')'; ?></span></h1>
              
              <div class="quantitybox">
                <div class="clear"></div>
                <div class="control-group">
                  <div class="controls">
                    <label>
                      Website:  <a href="http://<?php echo $website; ?>" target="_blank"><?php echo $website; ?></a></label>
                      <label>
                      Email:  <a href="mailto:<?php echo $email; ?>" target="_blank"><?php echo $email; ?></a></label></label>
                      <label>
                      Telephone:  <a href="tel:<?php echo $telephone; ?>" target="_blank"><?php echo $telephone; ?></a></label></label>
                      <label>
                      Type:  <?php echo $enterprise_type; ?></label>
                  </div>
                </div>
              </div>
         <!-- Product Description tab & comments-->
         <div class="productdesc">
                <ul class="nav nav-tabs" id="myTab">
                  <li class="active"><a href="#description">Description</a>
                  </li>
                  <li><a href="#specification">Company Address</a>
                  </li>
                  <li><a href="#review">Bank</a>
                  </li>
                  <li><a href="#producttag">Employees</a>
                  </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="description">
                    <h2>About My Company</h2>
                  <?php echo $description; ?><br>
                    <br>
                  </div>
                  <div class="tab-pane " id="specification">
                    <ul class="productinfo">
                      <li><span class="productinfoleft"> Province:</span> <?php echo $province; ?>  </li>
                      <li><span class="productinfoleft"> Municipality:</span> <?php echo $municipality; ?>  </li>
                      <li><span class="productinfoleft"> Location:</span> <?php echo $location; ?>  </li>
                      <li><span class="productinfoleft"> Postal Address:</span> <?php echo $postal_address; ?> </li>
                      <li><span class="productinfoleft"> Residential Address:</span> <?php echo $physical_address; ?>  </li>
                    </ul>
                  </div>
                  <div class="tab-pane" id="review">
                    <h3><?php echo $bank; ?></h3>
                  </div>
                  <div class="tab-pane" id="producttag">
                    <p> <?php echo $employees; ?> <br>
                      <br>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
<script defer src="js/custom.js"></script>
</body>
</html>