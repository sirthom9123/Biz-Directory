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
          <a href="#">BBBEE</a>
          <span class="divider">/</span>
        </li>
        <li class="active">Join</li>
      </ul>
      <div class="row">        
        <!-- Account Login-->
        <div class="span9">
          <h1 align="center" class="heading1"><span class="maintext">B-BBEE Registration</span></h1>
		  <?php
			$time = time();
			$join_date = date('Y-m-d',$time);

			
			$id = isset($_POST['id'])?  $_POST['id']:'';
			$email = isset($_POST['email'])?  $_POST['email']:'';
			$telephone = isset($_POST['telephone'])?  $_POST['telephone']:'';
			$surname = isset($_POST['surname'])?  $_POST['surname']:'';
			$names = isset($_POST['names'])?  $_POST['names']:'';
			$gender = isset($_POST['gender'])?  $_POST['gender']:'';
			$race = isset($_POST['race'])?  $_POST['race']:'';
			$enterprise_name = isset($_POST['enterprise_name'])?  $_POST['enterprise_name']:'';
			$reg_number = isset($_POST['reg_number'])?  $_POST['reg_number']:'';
			$res_address = isset($_POST['res_address'])?  $_POST['res_address']:'';
			$turnover = isset($_POST['turnover'])?  $_POST['turnover']:'';
			$sub_contract = isset($_POST['sub_contract'])?  $_POST['sub_contract']:'';
			$enterprise_type = isset($_POST['enterprise_type'])?  $_POST['enterprise_type']:'';
			$classification = isset($_POST['classification'])?  $_POST['classification']:'';

			
			if(isset($_POST['join']))
			{
				$query = "SELECT * from bbee where id='$id'";
				$subject_set = mysqli_query($connection,$query); 
				$row = mysqli_fetch_array($subject_set);

				if(!$row)
				{
					$query ="INSERT INTO bbee VALUES ('".$id."',
														'".$email."',
														'".$telephone."',
														'".$surname."',
														'".$names."',
														'".$gender."',
														'".$race."',
														'".$enterprise_name."',
														'".$reg_number."',
														'".$res_address."',
														'".$turnover."',
														'".$sub_contract."',
														'".$enterprise_type."',
														'".$classification."',
														'".$join_date."',
														'0'
														   )";
					if(mysqli_query($connection,$query))
					{
						$to = "biz-reply@devfix.co.za";
						$subject = "New B-BBEE registration: $reg_number";
						$message = "This serves to inform you that the person with ID $reg_number has registered for a B-BBEE certification.";
						$headers = "From: $surname,$names";

						mail($to, $subject, $message, $headers);
						mail($email, $subject, $headers);

						?>
							<div class="successmsg alert">
								<a class="clostalert">close</a>
								<p>You have Successfully registered for B-BBEE certification. Please submit your scanned copy of your ID to this email address. <a href="mailto:biz-reply@devfix.co.za">biz-reply@devfix.co.za</a></p>
							</div>
						<?php
					}
					else
					{
						?>
							<div class="errormsg alert alert-autocloseable-danger">
								<a class="clostalert">close</a>
								<strong>Error! </strong>Couldn't register your details. Technical Error!
							</div>
						<?php
					}
				}
				else
				{
					?>
						<div class="errormsg alert">
							<a class="clostalert">close</a>
							<strong>Error! </strong>An account with the same ID/Passort No <?php echo $i_d; ?> already exists in our database, please use another ID!
						</div>
					<?php
				}
			}
				?>
          <div class="checkoutsteptitle">Complete form for certification<a class="modify"></a>
          </div>
          <div class="checkoutstep">
            <div class="row">
              <form class="form-horizontal" method="POST" action="join.php">
                <fieldset>
                  <div class="span4">
                    <div class="control-group">
                      <label class="control-label" >ID / Passport <span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" name="id" required value="<?php echo $id; ?>" id="id"  placeholder="Your ID/Passport">
                      </div>
                    </div>
					          <div class="control-group">
                      <label class="control-label" >Email <span class="red">*</span></label>
                      <div class="controls">
                        <input type="email" name="email" required value="<?php echo $email; ?>"  placeholder="Email address">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Telephone <span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" name="telephone" required value="<?php echo $telephone; ?>"  placeholder="Telephone">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Surname <span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" name="surname" required value="<?php echo $surname; ?>" id="surname"  placeholder="Surname">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Names <span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" name="names" required value="<?php echo $names; ?>" id="names"  placeholder="Other Names">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Gender <span class="red">*</span></label>
                      <div class="controls">
                        <select id="gender" name="gender">
                          <option <?php if($gender == 'Male') echo 'selected="selected"'?> >Male</option>
                          <option <?php if($gender == 'Female') echo 'selected="selected"'?> >Female</option>
                        </select>
                      </div>
                    </div>
					          <div class="control-group">
                      <label class="control-label" >Race <span class="red">*</span></label>
                      <div class="controls">
                       <select id="race" name="race">
                          <option <?php if($race == 'Black') echo 'selected="selected"'?> >Black</option>
                          <option <?php if($race == 'Colored') echo 'selected="selected"'?> >Colored</option>
                          <option <?php if($race == 'White') echo 'selected="selected"'?> >White</option>
                          <option <?php if($race == 'Indian') echo 'selected="selected"'?> >Indian</option>
                          <option <?php if($race == 'Dual') echo 'selected="selected"'?> >Other</option>
						          </select>
                      </div>
                    </div>
                  </div>
                  <div class="span4">
                    <div class="control-group">
                      <label class="control-label" >Enterprise Name <span class="red">*</span></label>
                      <div class="controls">
                        <textarea class="form-control" type="text" name="enterprise_name" required placeholder="Enterprise name"><?php echo $enterprise_name; ?></textarea>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Registration Number <span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" name="reg_number" required value="<?php echo $reg_number; ?>"  placeholder="Registration number">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Residential Address <span class="red">*</span></label>
                      <div class="controls">
                        <textarea class="form-control" rows="3" type="text" name="res_address" required id="body" placeholder="Residential Address"><?php echo $res_address; ?></textarea>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Annual Turnover <span class="red">*</span></label>
                      <div class="controls">
                       <select id="turnover" name="turnover">
                          <option <?php if($turnover == 'small') echo 'selected="selected"'?> >0 - R50 000</option>
                          <option <?php if($turnover == 'medium') echo 'selected="selected"'?> >R50 000 - R500 000</option>
                          <option <?php if($turnover == 'large') echo 'selected="selected"'?> >R500 000 - R5 000 000</option>
                          <option <?php if($turnover == 'dual') echo 'selected="selected"'?> >R5 000 000 - R10 000 000</option>
						          </select>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Sub Contracting <span class="red">*</span></label>
                      <div class="controls">
                       <select id="sub_contract" name="sub_contract">
                          <option <?php if($turnover == 'yes') echo 'selected="selected"'?> >No</option>
                          <option <?php if($turnover == 'no') echo 'selected="selected"'?> >Yes</option>
						          </select>
                      </div>
                    </div>
					          <div class="control-group">
                      <label class="control-label" >Enterprise Type<span class="red">*</span></label>
                      <div class="controls">
                       <select class="form-control" name="enterprise_type">
                        <option <?php if($enterprise_type=='Private Company') echo 'selected="selected"'?> >Private Company</option>
                        <option <?php if($enterprise_type=='Cooperatives') echo 'selected="selected"'?> >Cooperatives</option>
                        <option <?php if($enterprise_type=='Partnerships') echo 'selected="selected"'?> >Partnerships</option>
                        <option <?php if($enterprise_type=='Business Trust') echo 'selected="selected"'?> >Business Trust</option>
                        <option <?php if($enterprise_type=='Public Company') echo 'selected="selected"'?> >Public Company</option>
                        <option <?php if($enterprise_type=='Sole Proprietor') echo 'selected="selected"'?> >Sole Proprietor</option>
                        <option <?php if($enterprise_type=='(Pty) Limited') echo 'selected="selected"'?> >(Pty) Limited</option>
                        </select>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Classification<span class="red">*</span></label>
                      <div class="controls">
                       <select class="form-control" name="classification">
                        <option <?php if($classification=='Manufacturer') echo 'selected="selected"'?> >Manufacturer</option>
                        <option <?php if($classification=='Supplier') echo 'selected="selected"'?> >Supplier</option>
                        <option <?php if($classification=='Professional Service Provider') echo 'selected="selected"'?> >Professional Service Provider</option>
                        <option <?php if($classification=='Other') echo 'selected="selected"'?> >Other</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </fieldset>
				        <button type="submit" name="join" class="btn btn-info  pull-right" class="pull-left">Submit</button>
              </form>
            </div>
          </div>
        </div>        
        <!-- Sidebar Start-->
        <div class="span3">
          <aside>
            <div class="sidewidt">
              <h2 class="heading2"><span> Terms & Conditions</span></h2>
              <ul class="nav nav-list categories">
                <li>
                  <a class="active" href="disclaimer/disclaimer.pdf" target="_blank">Disclaimer document</a>
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