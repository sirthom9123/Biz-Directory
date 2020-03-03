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
	if(!isset($_SESSION["usernameAdmin"])) 
	{
		header('Location:index.php');
	}
?>
<?php 
	$i = 3;
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
          <a href="#">Home</a>
          <span class="divider">/</span>
        </li>
        <li class="active">My Profile</li>
      </ul>
      <div class="row"> 
        <!-- Account Login-->
        <div class="span12">
          <div class="checkoutsteptitle">Company Details<a class="modify">Modify</a>
          </div>
		  <?php
				$usera = isset($_POST['usera'])? $_POST['usera']:'';
				$userd = isset($_POST['userd'])? $_POST['userd']:'';
				
				if(isset($_POST['activateBtn']))
      			{
                	$query ="UPDATE users set status='1' WHERE username='$usera'";
					if(mysqli_query($connection,$query))
					{?>
						<div class="successmsg alert alert-autocloseable-success">
							<a href="#" class="close" data-dismiss="alert">&times;</a>
							<p  align="center">
								Successfully Activated account
							</p>
						</div>
					<?php 
					}
					else
					{?>
						<div class="errormsg alert alert-autocloseable-danger">
							<a href="#" class="close" data-dismiss="alert">&times;</a>
							 <p align="center">
								An error occured, Could not activate account
							</p>
						</div>
					<?php 
					}
      			}

      			if(isset($_POST['deactivateBtn']))
                {
                	$query ="UPDATE users set status='0' WHERE username='$userd'";
					if(mysqli_query($connection,$query))
					{?>
						<div class="successmsg alert alert-autocloseable-success">
							<a href="#" class="close" data-dismiss="alert">&times;</a>
							<p  align="center">
								Successfully deactivated account
							</p>
						</div>
					<?php 
					}
					else
					{?>
						<div class="errormsg alert alert-autocloseable-danger">
							<a href="#" class="close" data-dismiss="alert">&times;</a>
							 <p align="center">
								An error occured, Could not deactivate account
							</p>
						</div>
					<?php 
					}
                }
			?>
			<div class="table-responsive" style="overflow-x:auto;">
				<table id="datatable_example" class="table table-bordered table-striped table-list-search">
								<thead>
									<th>Username</th>
									<th>Email</th>
									<th>Surname</th>
									<th>Name</th>
									<th>Reg.No</th>
									<th>Status</th>
								</thead>
								<tbody>
								<?php 
									$query = "SELECT u.username,u.email,u.surname,u.names,u.status,c.reg_no from users u,company_details c WHERE u.username=c.username";
	                                $subject_set = mysqli_query($connection,$query); 
									
									while($row = mysqli_fetch_array($subject_set))
									{
										if($row["status"]==1)
										{
											echo $output=
												'<tr onclick="javascript:showRow(this);">
												<td>'.$row["username"].'</td>
												<td>'.$row["email"].'</td>
												<td>'.$row["surname"].'</td>
												<td>'.$row["names"].'</td>
												<td>'.$row["reg_no"].'</td>
												<td><a title="Mark as seen" href="#"><p align="center"><span data-title="Delete" data-toggle="modal" data-target="#delete">YES<img src="image/success.png" /></span></p></a></td>
												</tr>';
										}
										else
										{
											echo $output=
												'<tr onclick="javascript:showRow(this);">
												<td>'.$row["username"].'</td>
												<td>'.$row["email"].'</td>
												<td>'.$row["surname"].'</td>
												<td>'.$row["names"].'</td>
												<td>'.$row["reg_no"].'</td>
												<td><a title="Mark as seen" href="#"><p align="center"><span data-title="Delete" data-toggle="modal" data-target="#add">NO<img src="image/start.png" /></span></p></a></td>
												</tr>';
										}
									}
									?>
								</tbody>
						  </table>
			</div>
        </div>
      </div>
    </div>
	
	<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				  <div class="modal-header">
					<h4 class="modal-title custom_align" id="Heading">Activate Account!</h4>
				  </div>
				  <div class="modal-body">
				   <div class="alert alert-info"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to activate?</div>
					<form method="POST" action="accounts.php">
						<label class="control-label" for="input01">Username</label>
						<input id="usera" name="usera" required value="item" class="form-control" type="text"><br/>
						<button type="submit" name="activateBtn" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
					</form>
				  </div>
				<div class="modal-footer ">
					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	      	<div class="modal-dialog">
			    <div class="modal-content">
			          <div class="modal-header">
				        <h4 class="modal-title custom_align" id="Heading">deactivate Business!</h4>
				      </div>
			          <div class="modal-body">
				       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to deactivate?</div>
				       	<form method="POST" action="accounts.php">
				       		<label class="control-label" for="input01">Username</label>
				       		<input id="userd" name="userd" required value="item" class="form-control" type="text"><br/>
				       		<button type="submit" name="deactivateBtn" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
			        	</form>
				      </div>
			        <div class="modal-footer ">
			        	<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
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
<script language="javascript" type="text/javascript">
	function showRow(row){
		var x=row.cells;
		document.getElementById("usera").value = x[0].innerHTML;
		document.getElementById("userd").value = x[0].innerHTML;
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