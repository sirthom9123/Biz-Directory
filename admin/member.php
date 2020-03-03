<?php
	include('object.php');
	include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>BizPortal | Members</title>
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
				<div class="checkoutsteptitle">B-BBEE Certified<a class="modify">Modify</a>
          </div>
		  <?php
				$id = isset($_POST['id'])? $_POST['id']:'';
				$idd = isset($_POST['idd'])? $_POST['idd']:'';
				$der = isset($_POST['der'])? $_POST['der']:'';
				$black = isset($_POST['Black'])? $_POST['Black']:'';
				$white = isset($_POST['White'])? $_POST['White']:'';
				$colored = isset($_POST['Colored'])? $_POST['Colored']:'';
				$indian = isset($_POST['Indian'])? $_POST['Indian']:'';
				$other = isset($_POST['Other'])? $_POST['Other']:'';
				
				ini_set('display_errors', 1); 
				ini_set('log_errors',1); 
				error_reporting(E_ALL); 
				mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
				
				//Approve Button Rating
				if(isset($_POST['approveBtn'])){
					if(mysqli_query($connection, "UPDATE bbee SET status=1 WHERE id='$id' AND race='Black'", mysqli_affected_rows($connection))){
						?>
						<div class="successmsg alert alert-autocloseable-success">
						<a href="#" class="close" data-dismiss="alert">&times;</a>
						<p align="center">
							B-BBEE Status updated
						</p>
						</div>
					<?php 
					}if(mysqli_query($connection, "UPDATE bbee SET status=2 WHERE id='$id' AND race='White'", mysqli_affected_rows($connection))){
						 
					}if(mysqli_query($connection, "UPDATE bbee SET status=3 WHERE id='$id' AND race='Indian'", mysqli_affected_rows($connection))){
						
					}else{
						?>
							<div class="errormsg alert alert-autocloseable-danger">
								<a href="#" class="close" data-dismiss="alert">&times;</a>
								<p align="center">
									An error occured, Could not disapprove business
								</p>
							</div>
						<?php 
					}
				}
					//Disapprove Button
					if(isset($_POST['disapproveBtn'])) {
						$query ="UPDATE bbee set status='0' WHERE id='$idd'";
							if(mysqli_query($connection,$query))
							{?>
								<div class="successmsg alert alert-autocloseable-success">
									<a href="#" class="close" data-dismiss="alert">&times;</a>
									<p  align="center">
										Successfully Disapproved
									</p>
								</div>
							<?php 
							}
							else{
							?>
								<div class="errormsg alert alert-autocloseable-danger">
									<a href="#" class="close" data-dismiss="alert">&times;</a>
									<p align="center">
										An error occurred, Could not disapprove business
									</p>
								</div>
							<?php 
							}
					}
				
					//Deregister Account
					if(isset($_POST['deregisterBtn'])){
							$query =  "DELETE FROM bbee where id='".$der."'";
							$row = mysqli_query($connection,$query);

						if($row)
						{
							?>
								<div class="alert alert-success alert-autocloseable-success">
									<p align="center">
										Successfully deregistered a member
									</p>
								</div>
							<?php
						}
						else
						{
							?>
								<div class="alert alert-danger alert-autocloseable-danger">
									<p align="center">
											Could not deregister member
									</p>
								</div>
							<?php
						}
    			}
			?>
			<div class="table-responsive" style="overflow-x:auto;">
				<table id="datatable_example" class="table table-bordered table-striped table-list-search">
				<thead>
						<th>ID</th>
						<th>Email</th>
						<th>Tel</th>
						<th>Names</th>
						<th>Gender</th>
						<th>Race</th>
						<th>Enterprise Name</th>
						<th>Registration Number</th>
						<th>Residential</th>
						<th>Type</th>
						<th>Classification</th>
						<th>Status</th>
						<th>Join Date</th>
						<th id="app">Approved</th>
						<th id="app">Delete</th>
					</thead>
					<tbody>
						<?php
							$query = "SELECT * FROM bbee order by id";
							$subject_set = mysqli_query($connection,$query); 
							
							while($row = mysqli_fetch_array($subject_set))
							{
								if($row["status"]>0)
								{
									$names = $row['surname'].' '.$row['names'];
									echo $output=
									'<tr onclick="javascript:showRow(this);">
									<td>'.$row["id"].'</td>
									<td>'.$row["email"].'</td>
									<td>'.$row["telephone"].'</td>
									<td>'.$row["names"].'</td>
									<td>'.$row["gender"].'</td>
									<td>'.$row["race"].'</td>
									<td>'.$row["enterprise_name"].'</td>
									<td>'.$row["reg_number"].'</td>
									<td>'.$row["res_address"].'</td>
									<td>'.$row["enterprise_type"].'</td>
									<td>'.$row["classification"].'</td>
									<td>'.$row["status"].'</td>
									<td>'.$row["join_date"].'</td>
									<td><a title="Deregister this module" href="#"><p align="center"><span data-title="Delete" data-toggle="modal" data-target="#delete">YES<img src="image/success.png" /></span></p></a></td>
									<td><a title="Deregister this member" href="#"><p align="center"><span data-title="Delete" data-toggle="modal" data-target="#deregister"><img src="image/delete.png" /></span></p></a></td>
									</tr>';
								}
								else
								{
									echo $output=
									'<tr onclick="javascript:showRow(this);">
									<td>'.$row["id"].'</td>
									<td>'.$row["email"].'</td>
									<td>'.$row["telephone"].'</td>
									<td>'.$row["names"].'</td>
									<td>'.$row["gender"].'</td>
									<td>'.$row["race"].'</td>
									<td>'.$row["enterprise_name"].'</td>
									<td>'.$row["reg_number"].'</td>
									<td>'.$row["res_address"].'</td>
									<td>'.$row["enterprise_type"].'</td>
									<td>'.$row["classification"].'</td>
									<td>'.$row["status"].'</td>
									<td>'.$row["join_date"].'</td>
									<td><a title="Deregister this module" href="#"><p align="center"><span data-title="Delete" data-toggle="modal" data-target="#add">NO<img src="image/start.png" /></span></p></a></td>
									<td><a title="Deregister this member" href="#"><p align="center"><span data-title="Delete" data-toggle="modal" data-target="#deregister"><img src="image/delete.png" /></span></p></a></td>
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
					<h4 class="modal-title custom_align" id="Heading">Approve Member!</h4>
				  </div>
				  <div class="modal-body">
				   <div class="alert alert-info"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to approve?</div>
					<form method="POST" action="member.php">
						<label class="control-label" for="input01">ID NO</label>
						<input id="id" name="id" required value="item" class="form-control" type="text"><br/>
						<button type="submit" name="approveBtn" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
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
				        <h4 class="modal-title custom_align" id="Heading">Disapprove Member!</h4>
				      </div>
			          <div class="modal-body">
				       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to disapprove?</div>
				       	<form method="POST" action="member.php">
				       		<label class="control-label" for="input01">ID NO</label>
				       		<input id="idd" name="idd" required value="item" class="form-control" type="text"><br/>
				       		<button type="submit" name="disapproveBtn" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
			        	</form>
				      </div>
			        <div class="modal-footer ">
			        	<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
			      	</div>
		        </div>
	  		</div>
	    </div>
		
		<div class="modal fade" id="deregister" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	      	<div class="modal-dialog">
			    <div class="modal-content">
			          <div class="modal-header">
				        <h4 class="modal-title custom_align" id="Heading">Deregister Member!</h4>
				      </div>
			          <div class="modal-body">
				       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to deregister?</div>
				       	<form method="POST" action="member.php">
				       		<label class="control-label" for="input01">ID NO</label>
				       		<input id="der" name="der" required value="item" class="form-control" type="text"><br/>
				       		<button type="submit" name="deregisterBtn" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
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