<?php
	include('object.php');
	include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>BizPortal | Join Chamber</title>
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
?>
<!-- Header End -->

<div id="maincontainer">
  <section id="product">
    <div class="container">
    <!--  breadcrumb -->  
      <ul class="breadcrumb">
        <li>
          <a href="#">Chamber</a>
          <span class="divider">/</span>
        </li>
        <li class="active">Complaints</li>
      </ul>
      <div class="row">        
        <!-- Account Login-->
        <div class="span12">
          <div class="checkoutsteptitle">All Complaint<a class="modify">Modify</a>
          </div>
		  <?php
				$id = isset($_POST['id'])? $_POST['id']:'';
				$idd = isset($_POST['idd'])? $_POST['idd']:'';
				
				if(isset($_POST['mark']))
      			{
                	$query ="UPDATE complaints set seen='1' WHERE id='$id'";
					if(mysqli_query($connection,$query))
					{?>
						<div class="successmsg alert alert-autocloseable-success">
							<a href="#" class="close" data-dismiss="alert">&times;</a>
							<p  align="center">
								Marked as seen
							</p>
						</div>
					<?php 
					}
					else
					{?>
						<div class="errormsg alert alert-autocloseable-danger">
							<a href="#" class="close" data-dismiss="alert">&times;</a>
							 <p align="center">
								An error occured, Could not mark
							</p>
						</div>
					<?php 
					}
      			}

      			if(isset($_POST['deleteBtn']))
                {
                	$query =  "DELETE FROM complaints where id='".$idd."'";
                	$row = mysqli_query($connection,$query);

					if($row)
					{
						?>
		      				<div class="alert alert-success alert-autocloseable-success">
	                            <p align="center">
	                            	Successfully deleted complaint
	                            </p>
	                        </div>
		      			<?php
					}
					else
					{
						?>
		      				<div class="alert alert-danger alert-autocloseable-danger">
	                            <p align="center">
	                            	 Could not delete complaint
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
						<th>Names</th>
						<th>Email</th>
						<th>Telephone</th>
						<th>Complaint</th>
						<th>Complaint Code</th>
						<th>Date</th>
						<th>Message</th>
						<th>Seen</th>
						<th>Delete</th>
					</thead>
					<tbody>
						<?php
							$query = "SELECT * FROM complaints order by id";
							$subject_set = mysqli_query($connection,$query); 
							
							while($row = mysqli_fetch_array($subject_set))
							{
								if($row["seen"]==1)
								{
									echo $output=
									'<tr onclick="javascript:showRow(this);">
									<td>'.$row["id"].'</td>
									<td>'.$row["names"].'</td>
									<td>'.$row["email"].'</td>
									<td>'.$row["telephone"].'</td>
									<td>'.$row["complaint"].'</td>
									<td>'.$row["complaint_code"].'</td>
									<td>'.$row["date_submitted"].'</td>
									<td>'.$row["message"].'</td>
									<td><a title="Mark as seen" href="#"><p align="center"><span data-title="Delete" data-toggle="modal" data-target="#delete">YES<img src="image/success.png" /></span></p></a></td>
									<td><a title="Delete this" href="#"><p align="center"><span data-title="Delete" data-toggle="modal" data-target="#delete"><img src="image/delete.png" /></span></p></a></td>
									</tr>';
								}
								else
								{
									echo $output=
									'<tr onclick="javascript:showRow(this);">
									<td>'.$row["id"].'</td>
									<td>'.$row["names"].'</td>
									<td>'.$row["email"].'</td>
									<td>'.$row["telephone"].'</td>
									<td>'.$row["complaint"].'</td>
									<td>'.$row["complaint_code"].'</td>
									<td>'.$row["date_submitted"].'</td>
									<td>'.$row["message"].'</td>
									<td><a title="Mark as seen" href="#"><p align="center"><span data-title="Delete" data-toggle="modal" data-target="#add">NO<img src="image/start.png" /></span></p></a></td>
									<td><a title="Delete this" href="#"><p align="center"><span data-title="Delete" data-toggle="modal" data-target="#delete"><img src="image/delete.png" /></span></p></a></td>
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
					<h4 class="modal-title custom_align" id="Heading">Mark as Seen!</h4>
				  </div>
				  <div class="modal-body">
				   <div class="alert alert-info"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to contunie?</div>
					<form method="POST" action="complaints.php">
						<label class="control-label" for="input01">ID</label>
						<input id="id" name="id" required value="item" class="form-control" type="text"><br/>
						<button type="submit" name="mark" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
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
					<h4 class="modal-title custom_align" id="Heading">Delete Complaint!</h4>
				  </div>
				  <div class="modal-body">
				   <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete?</div>
					<form method="POST" action="complaints.php">
						<label class="control-label" for="input01">ID</label>
						<input id="idd" name="idd" required value="item" class="form-control" type="text"><br/>
						<button type="submit" name="deleteBtn" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
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