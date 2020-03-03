<?php
	include('object.php');
	include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>BizPortal | Search Directory</title>
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

<?php
	$search_by = isset($_POST['search_by'])?  $_POST['search_by']:'';
	$searchInput = isset($_POST['searchInput'])?  $_POST['searchInput']:'';
?>

<div id="maincontainer">
  <section id="product">
    <div class="container">
     <!--  breadcrumb --> 
      <ul class="breadcrumb">
        <li>
          <a href="#">Home</a>
          <span class="divider">/</span>
        </li>
        <li class="active">Directory</li>
      </ul>       
      <h1 align="center" class="heading1"><span class="maintext"> Search Directory</span></h1>
	   <div class="cartoptionbox">
        <form class="form-vertical form-inline" method="post" action="search_directory.php">
          <fieldset>
            <div class="control-group">
              <div class="controls">
					<select class="form-control" name="search_by">
						<option <?php if($search_by=='Company Name') echo 'selected="selected"'?> >Company Name</option>
						<option <?php if($search_by=='Company Type') echo 'selected="selected"'?> >Company Type</option>
						<option <?php if($search_by=='Sector') echo 'selected="selected"'?> >Sector</option>
						<option <?php if($search_by=='Director Names') echo 'selected="selected"'?> >Director Names</option>
						<option <?php if($search_by=='Gender') echo 'selected="selected"'?> >Gender</option>
						<option <?php if($search_by=='Age') echo 'selected="selected"'?> >Age</option>
						<option <?php if($search_by=='Race') echo 'selected="selected"'?> >Race</option>
						<option <?php if($search_by=='Province') echo 'selected="selected"'?> >Province</option>
						<option <?php if($search_by=='Location') echo 'selected="selected"'?> >Location</option>
					</select>
					<input type="text" placeholder="Search" id="searchInput" required name="searchInput" value="<?php echo $searchInput; ?>" data-provide="typeahead">
                <input type="submit" name="search" value="Search" class="btn btn-danger">
              </div>
            </div>
          </fieldset>
        </form>
				<?php
					if(isset($_POST['search']))
					{
						if($search_by == 'Age')
						{
							?>
								<div class="successmsg alert">
									<a class="clostalert">close</a>
									<strong>When you search by age, we compare it with the ages that are in the same range. E.g if you search 15, we compare it in this range(10-20), if 23, we compare it in this range(20-30) etc.</strong>
								</div>
							<?php
						}
					}
				?>
      </div>
      <!-- Cart-->
	  <div class="container">
            <table id="datatable_example" class="table table-bordered table-striped table-list-search">
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
					<th>Sector</th>
					<th>Bank</th>
					<th>More</th>
				</thead>
				<tbody>
				<?php 
						//Search query
						if(isset($_POST['search']))
						{
							if($search_by == 'Company Name')
							{
								$query = "SELECT DISTINCT(c.reg_no),c.enterprise_name,c.enterprise_type,m.surname,m.other_names,m.race,m.gender,(YEAR(curdate())-YEAR(m.DOB)) as age,c.province,c.category,c.employees,c.business_turnover,c.location,c.bank from company_details c,company_members m where (c.approved='1') AND c.enterprise_name REGEXP '$searchInput' AND c.reg_no=m.reg_no order by c.enterprise_name";
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
										<td>'.$row["category"].'</td>
										<td>'.$row["bank"].'</td>
										<td><a href="profile.php?reg='.$rg.'">More</a></td>
										</tr>';
								}
							}
							else if($search_by == 'Company Type')
							{
								$query = "SELECT DISTINCT(c.reg_no),c.enterprise_name,c.enterprise_type,m.surname,m.other_names,m.race,m.gender,(YEAR(curdate())-YEAR(m.DOB)) as age,c.province,c.category,c.employees,c.business_turnover,c.location,c.bank from company_details c,company_members m where (c.approved='1') AND c.enterprise_type REGEXP '$searchInput' AND c.reg_no=m.reg_no order by c.enterprise_name";
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
										<td>'.$row["category"].'</td>
										<td>'.$row["bank"].'</td>
										<td><a href="profile.php?reg='.$rg.'">More</a></td>
										</tr>';
								}
							}
							else if($search_by == 'Sector')
							{
								$query = "SELECT DISTINCT(c.reg_no),c.enterprise_name,c.enterprise_type,m.surname,m.other_names,m.race,m.gender,(YEAR(curdate())-YEAR(m.DOB)) as age,c.province,c.category,c.employees,c.business_turnover,c.location,c.bank from company_details c,company_members m where (c.approved='1') AND c.category REGEXP '$searchInput' AND c.reg_no=m.reg_no order by c.enterprise_name";
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
										<td>'.$row["category"].'</td>
										<td>'.$row["bank"].'</td>
										<td><a href="profile.php?reg='.$rg.'">More</a></td>
										</tr>';
								}
							}
							else if($search_by == 'Director Names')
							{
								$query = "SELECT DISTINCT(c.reg_no),c.enterprise_name,c.enterprise_type,m.surname,m.other_names,m.race,m.gender,(YEAR(curdate())-YEAR(m.DOB)) as age,c.province,c.category,c.employees,c.business_turnover,c.location,c.bank from company_details c,company_members m WHERE (c.approved='1') AND (m.surname REGEXP '$searchInput' OR m.other_names REGEXP '$searchInput') AND c.reg_no=m.reg_no order by c.enterprise_name";
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
										<td>'.$row["category"].'</td>
										<td>'.$row["bank"].'</td>
										<td><a href="profile.phpreg='.$rg.'">More</a></td>
										</tr>';
								}
							}
							else if($search_by == 'Gender')
							{
								$query = "SELECT DISTINCT(c.reg_no),c.enterprise_name,c.enterprise_type,m.surname,m.other_names,m.race,m.gender,(YEAR(curdate())-YEAR(m.DOB)) as age,c.province,c.category,c.employees,c.business_turnover,c.location,c.bank from company_details c,company_members m where (c.approved='1') AND m.gender REGEXP '$searchInput' AND c.reg_no=m.reg_no order by c.enterprise_name";
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
										<td>'.$row["category"].'</td>
										<td>'.$row["bank"].'</td>
										<td><a href="profile.php?reg='.$rg.'">More</a></td>
										</tr>';
								}
							}
							else if($search_by == 'Race')
							{
								$query = "SELECT DISTINCT(c.reg_no),c.enterprise_name,c.enterprise_type,m.surname,m.other_names,m.race,m.gender,(YEAR(curdate())-YEAR(m.DOB)) as age,c.province,c.category,c.employees,c.business_turnover,c.location,c.bank from company_details c,company_members m where (c.approved='1') AND m.race REGEXP '$searchInput' AND c.reg_no=m.reg_no order by c.enterprise_name";
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
										<td>'.$row["category"].'</td>
										<td>'.$row["bank"].'</td>
										<td><a href="profile.php?reg='.$rg.'">More</a></td>
										</tr>';
								}
							}
							else if($search_by == 'Province')
							{
								$query = "SELECT DISTINCT(c.reg_no),c.enterprise_name,c.enterprise_type,m.surname,m.other_names,m.race,m.gender,(YEAR(curdate())-YEAR(m.DOB)) as age,c.province,c.category,c.employees,c.business_turnover,c.location,c.bank from company_details c,company_members m where (c.approved='1') AND c.province REGEXP '$searchInput' AND c.reg_no=m.reg_no order by c.enterprise_name";
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
										<td>'.$row["category"].'</td>
										<td>'.$row["bank"].'</td>
										<td><a href="profile.php?reg='.$rg.'">More</a></td>
										</tr>';
								}
							}
							else if($search_by == 'Location')
							{
								$query = "SELECT DISTINCT(c.reg_no),c.enterprise_name,c.enterprise_type,m.surname,m.other_names,m.race,m.gender,(YEAR(curdate())-YEAR(m.DOB)) as age,c.province,c.category,c.employees,c.business_turnover,c.location,c.bank from company_details c,company_members m where (c.approved='1') AND c.location REGEXP '$searchInput' AND c.reg_no=m.reg_no order by c.enterprise_name";
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
										<td>'.$row["category"].'</td>
										<td>'.$row["bank"].'</td>
										<td><a href="profile.php?reg='.$rg.'">More</a></td>
										</tr>';
								}
							}
							else if($search_by == 'Age')
							{
								$from = $searchInput;
								$to = $searchInput;

								if($searchInput >= 10 && $searchInput<20)
								{
									$from = 10;
									$to = 20;
								}
								if($searchInput >= 20 && $searchInput<30)
								{
									$from = 20;
									$to = 30;
								}
								if($searchInput >= 30 && $searchInput<40)
								{
									$from = 30;
									$to = 40;
								}
								if($searchInput >= 40 && $searchInput<50)
								{
									$from = 40;
									$to = 50;
								}
								if($searchInput >= 50 && $searchInput<60)
								{
									$from = 50;
									$to = 60;
								}
								if($searchInput >= 60 && $searchInput<70)
								{
									$from = 60;
									$to = 70;
								}
								if($searchInput >= 70 && $searchInput<80)
								{
									$from = 70;
									$to = 80;
								}
								if($searchInput >= 80 && $searchInput<90)
								{
									$from = 80;
									$to = 90;
								}
								if($searchInput >= 90 && $searchInput<100)
								{
									$from = 90;
									$to = 100;
								}

								$query = "SELECT DISTINCT(c.reg_no),c.enterprise_name,c.enterprise_type,m.surname,m.other_names,m.race,m.gender,(YEAR(curdate())-m.DOB) as age,c.province,c.category,c.employees,c.business_turnover,c.location,c.bank from company_details c,company_members m where (c.approved='1') AND ((YEAR(CURDATE())-YEAR(m.DOB))>='$from' AND (YEAR(CURDATE())-YEAR(m.DOB))<='$to') AND c.reg_no=m.reg_no order by c.enterprise_name";
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
										<td>'.$row["category"].'</td>
										<td>'.$row["bank"].'</td>
										<td><a href="profile.php?reg='.$rg.'">More</a></td>
										</tr>';
								}
							}
						}
						else
						{
							$query = "SELECT DISTINCT(c.reg_no),c.enterprise_name,c.enterprise_type,m.surname,m.other_names,m.race,m.gender,(YEAR(CURDATE())-YEAR(m.DOB)) as age,c.province,c.category,c.employees,c.business_turnover,c.location,c.bank from company_details c,company_members m where (c.approved='1') AND c.reg_no=m.reg_no order by c.enterprise_name";
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
									<td>'.$row["category"].'</td>
									<td>'.$row["bank"].'</td>
									<td><a href="profile.php?reg='.$rg.'">More</a></td>
									</tr>';
							}
						}
					?>
				</tbody>
            </table>
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