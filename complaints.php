<?php
	include('object.php');
	include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>BizPortal | Complaints</title>
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
	if(!isset($_SESSION["user_logged_in"])) 
	{
		header('Location:login.php');
		
	}
?>
<?php 
	$i = 5;
	include('session.php');
	include('header-logged.php');
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
        <div class="span9">
          <h1 align="center" class="heading1"><span class="maintext">Submit Your Complaint</span></h1>
		  <?php
					$time = time();
					$date_submitted = date('Y-m-d',$time).' '. date('H-m-s',$time);
					$email = isset($_POST['email'])?  $_POST['email']:'';
					$names = isset($_POST['names'])?  $_POST['names']:'';
					$tel = isset($_POST['tel'])?  $_POST['tel']:'';
					$concern = isset($_POST['concern'])?  $_POST['concern']:'';
					$code = isset($_POST['code'])?  $_POST['code']:'';
					$message = isset($_POST['message'])?  $_POST['message']:'';

					if(isset($_POST['complaint']))
					{
						$message = str_replace('\'', '\'\'', $message);
						
						$query ="INSERT INTO complaints VALUES (NULL,'".$names."','".$email."','".$tel."','".$concern."','".$code."','".$message."','".$date_submitted."','0')";
						if(mysqli_query($connection,$query))
						{
							$to = "mmyepfs@gmail.com";
							$subject = "Youth Chamber : $concern";
							$message = "$message";
							$headers = "From: $email,$tel";

							mail($to, $subject, $message, $headers);

							?>
								<div class="alert alert-success">
									<a href="#" class="close" data-dismiss="alert">&times;</a>
									You have Successfully send your feedback. We shall respond to it appropriately if need be.<br/>
						        	If you have additional documents to send to us, please forward them to this email <a href="mailto:mmyepfs@gmail.com">mmyepfs@gmail.com</a> Kind regards
						      	</div>
							<?php
						}
						else
						{
							?>
								<div class="errormsg alert">
									<a class="clostalert">close</a>
						        	Couldn't send your feedback. Technical Error! Please consult Admin if this error Persists!
						      	</div>
							<?php
						}
					}
				?>
          <div class="checkoutsteptitle">Send Complaint<a class="modify">Modify</a>
          </div>
          <div class="checkoutstep">
            <div class="row">
              <form class="form-horizontal" method="POST" action="complaints.php">
                <fieldset>
                  <div class="span4">
                    <div class="control-group">
                      <label class="control-label" >Telephone<span class="red">*</span></label>
                      <div class="controls">
							<input type="text" name="tel" required value="<?php echo $tel; ?>" id="tel"  placeholder="telephone" />
                      </div>
                    </div>
					 <div class="control-group">
                      <label class="control-label" >Email<span class="red">*</span></label>
                      <div class="controls">
                        <input type="email" name="email" required value="<?php echo $email; ?>" id="eid"  placeholder="Email address" />
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Names<span class="red">*</span></label>
                      <div class="controls">
							<input type="text" name="names" required value="<?php echo $names; ?>"  placeholder="Other Names">
                      </div>
                    </div>
                  </div>
                  <div class="span4">
                    <div class="control-group">
                      <label class="control-label" >What is your concern?<span class="red">*</span></label>
                      <div class="controls">
							<select id="concern" name="concern">
								  <option <?php if($concern == 'Complaint') echo 'selected="selected"'?> >Complaint</option>
								  <option <?php if($concern == 'Problems') echo 'selected="selected"'?> >Problems</option>
								  <option <?php if($concern == 'Comments') echo 'selected="selected"'?> >Comments</option>
								  <option <?php if($concern == 'Errors') echo 'selected="selected"'?> >Errors</option>
								  <option <?php if($concern == 'Testimony') echo 'selected="selected"'?> >Testimony</option>
							 </select>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Code<span class="red">*</span></label>
                      <div class="controls">
							<select id="code" name="code">
								  <option <?php if($code == 'E104') echo 'selected="selected"'?> >E101</option>
								  <option <?php if($code == 'E404') echo 'selected="selected"'?> >E404</option>
								  <option <?php if($code == 'T100') echo 'selected="selected"'?> >T100</option>
								  <option <?php if($code == 'T101') echo 'selected="selected"'?> >T101</option>
							</select>
                      </div>
                    </div>
                  </div>
				  <div class="span9">
					<div class="control-group">
                      <label class="control-label" >Feedback: <span class="red">*</span></label>
                      <div class="controls">
                        <textarea class="form-control" rows="10" type="text" name="message" required id="body" ><?php echo $message; ?></textarea>
                      </div>
                    </div>
				  </div>
                </fieldset>
				<button type="submit" name="complaint" class="btn btn-info  pull-right" class="pull-left">Send Complaint</button>
              </form>
            </div>
          </div>
        </div>        
        <!-- Sidebar Start-->
        <div class="span3">
          <aside>
            <div class="sidewidt">
              <h2 class="heading2"><span> Codes</span></h2>
              <ul class="nav nav-list categories">
                <li>
                  <a class="active" href="complaints/codes.pdf" target="_blank">See Complaint Codes</a>
                </li>
              </ul>
            </div>
          </aside>
        </div>
        <!-- Sidebar End-->
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