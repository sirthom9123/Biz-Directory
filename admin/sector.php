<?php
	include('object.php');
	include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>BizPortal | Sector</title>
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

<div id="maincontainer">
  <section id="product">
    <div class="container">
    <!--  breadcrumb -->  
      <ul class="breadcrumb">
        <li>
          <a href="#">Youth Biz Directory</a>
          <span class="divider">/</span>
        </li>
        <li class="active">Sector</li>
      </ul>
      <div class="row"> 
		<?php 
			$sector = isset($_GET['sector'])? ($_GET['sector']): '';

	  		$sector = removeBadCharacters($sector);
		?>
        <!-- Account Login-->
        <div class="span12">
          <div class="checkoutsteptitle"><?php echo $sector; ?>
          </div>
            <div class="container">
								<div class="table-responsive" style="overflow-x:auto;">
									<table id="datatable_example" class="table table-striped table-bordered">
										<thead>
											<th>Reg-No</th>
												<th>Company</th>
												<th>Type</th>
												<th>Director</th>
												<th>Race</th>
												<th>Gender</th>
												<th>Age</th>
												<th>Province</th>
												<th>Location</th>
												<th>Employees</th>
												<th>More</th>
										</thead>
										<tbody>
										<?php 
											$query = "SELECT DISTINCT(c.reg_no),c.enterprise_name,c.enterprise_type,m.surname,m.other_names,m.race,m.gender,(YEAR(CURDATE())-YEAR(m.DOB)) as age,c.province,c.category,c.employees,c.business_turnover,c.location from company_details c,company_members m WHERE c.reg_no=m.reg_no AND c.category REGEXP '$sector' order by c.enterprise_name";
											$subject_set = mysqli_query($connection,$query); 
											
											while($row = mysqli_fetch_array($subject_set))
											{
												$rg = $row["reg_no"];
												$names = $row["surname"].' '.$row["other_names"];
												
												echo $output=
													'<tr>
													<td>'.$row["reg_no"].'</td>
													<td>'.$row["enterprise_name"].'</td>
													<td>'.$row["enterprise_type"].'</td>
													<td>'.$names.'</td>
													<td>'.$row["race"].'</td>
													<td>'.$row["gender"].'</td>
													<td>'.$row["age"].'</td>
													<td>'.$row["province"].'</td>
													<td>'.$row["location"].'</td>
													<td>'.$row["employees"].'</td>
													<td><a href="profile.php?reg='.$rg.'">More</a></td>
													</tr>';
											}
										?>
										</tbody>
									</table>
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
<?php include('filtertable.php'); ?> 
</body>
</html>