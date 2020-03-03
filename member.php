<?php
	include('object.php');
	include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>BizPortal | Member</title>
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
	
	$search = isset($_POST['search'])?  $_POST['search']:'';
?>
<!-- Header End -->
<div id="maincontainer">
  <section id="product">
    <div class="container">      
      <!-- Product Details-->
      <div class="row">
       <!-- Left Image-->
	    <?php
			$query = "SELECT * FROM members WHERE id='$search' OR email='$search'";
			$subject_set = mysqli_query($connection,$query); 
			$row = mysqli_fetch_array($subject_set);
			
			$id = $row['id'];
			$email = $row['email'];
			$telephone = $row['telephone'];
			$email = $row['email'];
			$names = $row['surname'].' '.$row['names'];
			$gender = $row['gender'];
			$race = $row['race'];
			$postal_address = $row['postal_address'];
			$residential_address = $row['residential_address'];
			$qualification = $row['qualification'];
			$profession = $row['profession'];
			$join_date = $row['join_date'];
			$status = $row['status'];
		?>
        <div class="span5">
          <ul class="thumbnails mainimage">
            <li class="span5">
              <h3 class="heading3">Search Your Status</h3>
              <div class="loginbox">
                <form class="form-vertical" method="POST" action="member.php">
                  <fieldset>
                    <div class="control-group">
                      <label class="control-label">ID / Email</label>
                      <div class="controls">
                        <input type="text" class="span3" name="search" required value="<?php echo $search; ?>"  placeholder="ID/Passport" />
                      </div>
                    </div>
                  </fieldset>
				  <button type="submit" name="deregister" class="btn btn-info" class="pull-left">Search</button>
                </form>
				<?php
					if(isset($_POST['deregister']))
					{
						if(!$row)
						{
							?>
								<div class="alertmsg alert alert-autocloseable-danger">
									Sorry! No Results Found.
								</div>
							<?php
						}
					}
				?>
              </div>
            </li>
          </ul>
        </div>
         <!-- Right Details-->
        <div class="span7">
          <div class="row">
            <div class="span7">
              <h1 class="productname"><span class="bgnone"><?php echo $names; ?></span></h1>
              <div class="productprice">
					ID:
                <div class="productpageprice">
                  <span class="spiral"></span><?php echo $id; ?></div>
              </div>
              <div class="quantitybox">
                <div class="clear"></div>
                <div class="control-group">
                  <div class="controls">
                    <label>
                      Telephone:  <?php echo $telephone; ?></label>
					  <label>
                      Email:  <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></label></label>
					  <label>
                      Names:  <?php echo $names; ?></label>
                  </div>
                </div>
              </div>
         <!-- Product Description tab & comments-->
         <div class="productdesc">
                <ul class="nav nav-tabs" id="myTab">
                  <li class="active"><a href="#description">Qualifications</a>
                  </li>
                  <li><a href="#specification">Adress</a>
                  </li>
                  <li><a href="#review">Application Date</a>
                  </li>
                  <li><a href="#producttag">Status</a>
                  </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="description">
						<?php echo $qualification; ?><br>
						<?php echo $profession; ?>
                    <br>
                  </div>
                  <div class="tab-pane " id="specification">
                    <ul class="productinfo">
						<li><span class="productinfoleft"> Postal:</span> <?php echo $postal_address; ?>  </li>
						<li><span class="productinfoleft"> Residential:</span> <?php echo $residential_address; ?>  </li>
                    </ul>
                  </div>
                  <div class="tab-pane" id="review">
                    <h3><?php echo $join_date; ?></h3>
                  </div>
                  <div class="tab-pane" id="producttag">
                    <p> <?php 
							if($status == 0)
							{
								?>
									<div class="errormsg alert">
										You haven't been admitted yet.
										Please note that it takes some time to process your application. We shall respond to you as soon as we are done with your application. Kind regards
									</div>
								<?php
							}
							else
							{
								?>
									<div class="successmsg alert">
										Your application to become a member of the chamber has been accepted.
									</div>
								<?php
							} 
						?>
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
</body>
</html>