<?php
	include('object.php');
	include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>BizPortal | Directory</title>
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
?>
<!-- Header End -->

<div id="maincontainer">
  <section id="product">
    <div class="container">
     <!--  breadcrumb --> 
      <ul class="breadcrumb">
        <li>
          <a href="#">Youth BIZ Directory</a>
          <span class="divider">/</span>
        </li>
        <li class="active">Directory</li>
      </ul>       
      <h1 align="center" class="heading1"><span class="maintext"> ENTERPRISE DIRECTORY</span></h1>
      <!-- Cart-->
      <div class="container">
       <table id="datatable_example" class="table table-striped table-bordered ">
			<thead>
				<th>Sector</th>
				<th>Qty</th>
				<th>View</th>
			</thead>
			<tbody>
			<?php 

					$query = "SELECT category,COUNT(category) as FREG FROM company_details WHERE approved='1' GROUP BY category";
					$subject_set = mysqli_query($connection,$query); 
					
					while($row = mysqli_fetch_array($subject_set))
					{
						echo $output=
							'<tr onclick="javascript:showRow(this);">
							<td>'.$row["category"].'</td>
							<td><input type="submit" value="'.$row["FREG"].'" class="btn btn-info"></td>
							<td><div class="well pull-left buttonwrap"> <a class="btn btn-orange" href="sector.php?sector='.$row["category"].'">View</a></div></td>
							</tr>';
					}
				?>
			</tbody>
	  </table>
      </div>
	  <div class="container">
      <div class="pull-right">
          <div class="span4 pull-right">
            <table class="table table-striped table-bordered ">
				<?php
					$query = "SELECT COUNT(username) as qty FROM company_details";
					$subject_set = mysqli_query($connection,$query);
					$row = mysqli_fetch_array($subject_set);
					
					$qty = $row['qty'];
				?>
              <tr>
                <td><span class="extra bold totalamout">TOTAL BUSINESSES:</span></td>
                <td><span class="bold totalamout"><?php echo $qty; ?></span></td>
              </tr>
            </table>
          </div>
        </div>
        </div>
      <div class="cartoptionbox">
        <p> Register your business with us to be able to market your business effectively. Every Company registered with us here is visible every where. People who visits this portal can see your company, know about it and the services it offers. Why wait?</p>
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