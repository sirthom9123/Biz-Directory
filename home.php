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
	if(!isset($_SESSION["user_logged_in"])) 
	{
		header('Location:login.php');
		
	}
?>
<?php 
	$i = 3;
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
          <a href="#">Home</a>
          <span class="divider">/</span>
        </li>
        <li class="active">My Profile</li>
      </ul>
      <div class="row"> 
        <!-- Account Login-->
        <div class="span9">
          <h1 class="heading1" align="center"><span class="maintext">Business Profile</span></h1>
		  <?php
		$reg_no = isset($_POST['reg_no'])?  $_POST['reg_no']:'';
		$enterprisename = isset($_POST['enterprisename'])?  $_POST['enterprisename']:'';
		$company_type = isset($_POST['company_type'])?  $_POST['company_type']:'';
		$tax_no = isset($_POST['tax_no'])?  $_POST['tax_no']:'';
		$reg_date = isset($_POST['reg_date'])?  $_POST['reg_date']:'';
		$province = isset($_POST['province'])?  $_POST['province']:'';
		$municipality = isset($_POST['municipality'])?  $_POST['municipality']:'';
		$location = isset($_POST['location'])?  $_POST['location']:'';
		$post_address = isset($_POST['post_address'])?  $_POST['post_address']:'';
		$res_address = isset($_POST['res_address'])?  $_POST['res_address']:'';
		$telephone = isset($_POST['telephone'])?  $_POST['telephone']:'';
		$email = isset($_POST['email'])?  $_POST['email']:'';
		$cat = isset($_POST['cat'])?  $_POST['cat']:'';
		$turn = isset($_POST['turnover'])?  $_POST['turnover']:'';
		$stat = isset($_POST['status'])?  $_POST['status']:'';
		$employ = isset($_POST['employees'])?  $_POST['employees']:'';
		$asset = isset($_POST['assets'])?  $_POST['assets']:'';
		$website = isset($_POST['website'])?  $_POST['website']:'';
		$account = isset($_POST['account'])?  $_POST['account']:'No';
		$bank = isset($_POST['bank'])?  $_POST['bank']:'';
		$description = isset($_POST['description'])?  $_POST['description']:'';
		
		
		if(isset($_POST['save_company_details']))
		{
			$description = str_replace('\'', '\'\'', $description);
			$query = "SELECT * from company_details where reg_no='$reg_no'";
			$subject_set = mysqli_query($connection,$query); 
			$row = mysqli_fetch_array($subject_set);
			if(!$row)
			{
				$query ="INSERT INTO company_details VALUES ('".$user."',
																'".$reg_no."',
															   '".$enterprisename."',
															   '".$company_type."',
															   '".$tax_no."',
															   '".$reg_date."',
															   '".$province."',
															   '".$municipality."',
															   '".$location."',
															   '".$post_address."',
															   '".$res_address."',
															   '".$telephone."',
															   '".$email."',
															   '".$website."',
															   '".$turn."',
															   '".$cat."',
															   '".$stat."',
															   '".$employ."',
															   '".$asset."',
															   '".$account."',
															   '".$bank."',
															   '',
															   '".$description."',
															   '0'
															   )";
				if(mysqli_query($connection,$query))
				{
					$to = "biz-reply@dexvfix.co.za";
					$subject = "COMPANY REGISTRATION:$reg_no, $enterprisename";
					$message = "This serves to inform you that the company with Reg.No <strong>$reg_no</strong> has registered with you online and needs further reviewing to be approved!";
					$headers = "From: $enterprisename,$company_type";

					mail($to, $subject, $message, $headers);

					?>
						<div class="successmsg alert">
							<a class="clostalert">close</a>
							You have successfully registered information for your company.<br/>
							<h5>Send us scanned copies of your ID and documents for your company for further reviewing to this email address. <a href="mailto:biz-reply@dexvfix.co.za">biz-reply@dexvfix.co.za</a></h5>
							<p class="alert alert-danger">Warning! Your company/business will only be listed online in our database after we have reviewed the sent documents and have approved them.</p>

							<p class="alert alert-danger">Notice! You must also provide the details for the DIRECTOR of your Company. If you don't,it means your registration is incomplete and therefore your company can't be listed.</p>
						</div>
					<?php
				}
				else
				{
					?>
						<div class="errormsg alert alert-autocloseable-danger">
							<a class="clostalert">close</a>
							<strong>Error!</strong> Registration Unsuccessfull. Please try again.
						</div>
					<?php
				}
			}
			else
			{
				$query ="UPDATE company_details set reg_no='".$reg_no."',enterprise_name='".$enterprisename."', enterprise_type='".$company_type."', tax_number='".$tax_no."',registration_date='".$reg_date."',
													province='".$province."' , municipality='".$municipality."', location='".$location."', postal_address='".$post_address."',
													physical_address='".$res_address."' , telephone='".$telephone."',  email='".$email."', website='".$website."', business_turnover='".$turn."',
													category='".$cat."', status='".$stat."', employees='".$employ."', assets='".$asset."',account='".$account."',bank='".$bank."',description='".$description."' 
													WHERE username='$user'";


				if(mysqli_query($connection,$query))
				{
					$to = "biz-reply@dexvfix.co.za";
					$subject = "COMPANY UPDATE INFORMATION:$reg_no, $enterprisename";
					$message = "This serves to inform you that the company with Reg.No <strong>$reg_no</strong> has updated its information!";
					$headers = "From: $enterprisename,$company_type";

					mail($to, $subject, $message, $headers);
					
					?>
						<div class="successmsg alert alert-autocloseable-danger">
							<a class="clostalert">close</a>
							<strong>Sucess!</strong> Successfully Updated a company profile
						</div>
					<?php 
				}
				else
				{
					?>
						<div class="errormsg alert alert-autocloseable-danger">
							<a class="clostalert">close</a>
							<strong>Error!</strong> An error occured, Could not update a profile 
						</div>
					<?php 
		        }
			}
		}
?>
          <div class="checkoutsteptitle">Step 1: Company Details<a class="modify">Modify</a>
          </div>
		  <?php
			$query = "SELECT * FROM company_details WHERE username='$user'";
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
          <div class="checkoutstep">
            <div class="row">
              <form class="form-horizontal" method="POST" action="home.php">
                <fieldset>
                  <div class="span4">
                    <div class="control-group">
                      <label class="control-label" >Registration No: <span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" name="reg_no" required placeholder="Enter Reg.No" value="<?php echo $reg_no; ?>">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Enterprise Name: <span class="red">*</span></label>
                      <div class="controls">
						<textarea class="form-control" rows="3" placeholder="Enter trading name" name="enterprisename" required id="cons" ><?php echo $enterprise_name;?></textarea>
                      </div>
                    </div>
					<div class="control-group">
                      <label class="control-label" >Enterprise Type<span class="red">*</span></label>
                      <div class="controls">
                       <select class="form-control" name="company_type">
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
						<label class="control-label" >Category<span class="red">*</span></label>
						<div class="controls">
						<select class="form-control" name="cat">
						  <option <?php if($category=='Agriculture') echo 'selected="selected"'?> >Agriculture</option>
						  <option <?php if($category=='Mining and Quarrying') echo 'selected="selected"'?> >Mining and Quarrying</option>
						  <option <?php if($category=='Manufucturing') echo 'selected="selected"'?> >Manufucturing</option>
						  <option <?php if($category=='Construction') echo 'selected="selected"'?> >Construction</option>
						  <option <?php if($category=='Electricity Gas Water') echo 'selected="selected"'?> >Electricity Gas Water</option>
						  <option <?php if($category=='Retail Motor Trade and Repairs') echo 'selected="selected"'?> >Retail Motor Trade and Repairs</option>
						  <option <?php if($category=='IT Solutions') echo 'selected="selected"'?> >IT Solutions</option>
						  <option <?php if($category=='Advertising') echo 'selected="selected"'?> >Advertising</option>
						  <option <?php if($category=='Business') echo 'selected="selected"'?> >Business</option>
						  <option <?php if($category=='Farming') echo 'selected="selected"'?> >Farming</option>
						 </select>
						 </div>
					</div>
                    <div class="control-group">
                      <label class="control-label" >Tax Number:<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" name="tax_no" required placeholder="taxt no" value="<?php echo $tax_number;?>">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Location:</label>
                      <div class="controls">
                        <input type="text"  name="location" required placeholder="Location" value="<?php echo $location;?>">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Telephone<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" name="telephone" required placeholder="telephone" value="<?php echo $telephone;?>">
                      </div>
                    </div>
					<div class="control-group">
                      <label class="control-label" >Email: <span class="red">*</span></label>
                      <div class="controls">
                        <input type="email" name="email" required placeholder="Email" value="<?php echo $email; ?>">
                      </div>
                    </div>
					<div class="control-group">
						<label class="control-label" >Province<span class="red">*</span></label>
						<div class="controls">
						<select class="form-control" name="province">
						  <option <?php if($province=='Gauteng') echo 'selected="selected"'?> >Gauteng</option>
						  <option <?php if($province=='Free State') echo 'selected="selected"'?> >Free State</option>
						  <option <?php if($province=='Limpopo') echo 'selected="selected"'?> >Limpopo</option>
						  <option <?php if($province=='Eastern Cape') echo 'selected="selected"'?> >Eastern Cape</option>
						  <option <?php if($province=='Western Cape') echo 'selected="selected"'?> >Western Cape</option>
						 </select>
						 </div>
					</div>
					<div class="control-group">
                      <label class="control-label" >Municipality</label>
						<div class="controls">
						  <input type="text"  name="municipality" required placeholder="Municipality" value="<?php echo $municipality;?>">
						</div>
                    </div>
                  </div>
                  <div class="span4">
					<div class="control-group">
                      <label class="control-label" >Registration Date<span class="red">*</span></label>
                      <div class="controls">
                        <input type="date" name="reg_date" required placeholder="Registration date" value="<?php echo $registration_date;?>">
                      </div>
                    </div>
					<div class="control-group">
                      <label class="control-label" >Website</label>
                      <div class="controls">
                        <input type="text" name="website" placeholder="Website Url" value="<?php echo $website;?>">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Business Turnover</label>
                      <div class="controls">
                        <input type="text"  name="turnover" required placeholder="business tunover" value="<?php echo $business_turnover;?>">
                      </div>
                    </div>
					<div class="control-group">
                      <label class="control-label" >Status<span class="red">*</span></label>
                      <div class="controls">
                        <select class="form-control" name="stat">
							  <option <?php if($status=='Start Up') echo 'selected="selected"'?> >Start Up</option>
							  <option <?php if($status=='Existing') echo 'selected="selected"'?> >Existing</option>
							  <option <?php if($status=='Established') echo 'selected="selected"'?> >Established</option>
						 </select>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >No of Employees<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" name="employees" required placeholder="No of Employees" value="<?php echo $employees;?>">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Gross Assets: <span class="red">*</span></label>
                      <div class="controls">
                        <input type="text"  name="assets" required placeholder="Gross Assets avlue" value="<?php echo $assets;?>">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Business Account?<span class="red">*</span></label>
                      <div class="controls">
                        <select class="form-control" name="account">
						  <option <?php if($account=='Yes') echo 'selected="selected"'?> >Yes</option>
						  <option <?php if($account=='No') echo 'selected="selected"'?> >No</option>
						 </select>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Bank: <span class="red">*</span></label>
                      <div class="controls">
                       <select class="form-control" name="bank">
						  <option <?php if($bank=='None') echo 'selected="selected"'?> >None</option>
						  <option <?php if($bank=='NEDBANK') echo 'selected="selected"'?> >NEDBANK</option>
						  <option <?php if($bank=='FNB') echo 'selected="selected"'?> >FNB</option>
						  <option <?php if($bank=='ABSA') echo 'selected="selected"'?> >ABSA</option>
						  <option <?php if($bank=='STANDARD BANK') echo 'selected="selected"'?> >STANDARD BANK</option>
						  <option <?php if($bank=='CAPITEC') echo 'selected="selected"'?> >CAPITEC</option>
						  <option <?php if($bank=='UBANK') echo 'selected="selected"'?> >UBANK</option>
						 </select>
                      </div>
                    </div>
					<div class="control-group">
                      <label class="control-label" >Residential: <span class="red">*</span></label>
                      <div class="controls">
                        <textarea class="form-control" rows="3" type="text" name="res_address" required id="body" ><?php echo $physical_address; ?></textarea>
                      </div>
                    </div>
					<div class="control-group">
                      <label class="control-label" >Postal: <span class="red">*</span></label>
                      <div class="controls">
                        <textarea class="form-control" rows="3" type="text" name="post_address" required id="cons" ><?php echo $postal_address; ?></textarea>
                      </div>
                    </div>
                  </div>
				  <div class="span9">
					<div class="control-group">
                      <label class="control-label" >Description: <span class="red">*</span></label>
                      <div class="controls">
                        <textarea class="form-control" rows="10" type="text" name="description" required id="body" ><?php echo $description; ?></textarea>
                      </div>
                    </div>
				  </div>
				  <button type="submit" name="save_company_details" class="btn btn-info  pull-right" class="pull-left">Save Information</button>
                </fieldset>
              </form>
            </div>
          </div>
		  
		  <div id="director" >
		  <?php
				$director_ID = isset($_POST['director_ID'])?  $_POST['director_ID']:'';
				$director_surname = isset($_POST['director_surname'])?  $_POST['director_surname']:'';
				$director_other_names = isset($_POST['director_other_names'])?  $_POST['director_other_names']:'';
				$director_telephone = isset($_POST['director_telephone'])?  $_POST['director_telephone']:'';
				$director_email = isset($_POST['director_email'])?  $_POST['director_email']:'';
				$director_postal_address = isset($_POST['director_postal_address'])?  $_POST['director_postal_address']:'';
				$director_residential = isset($_POST['director_residential'])?  $_POST['director_residential']:'';
				$director_gender = isset($_POST['director_gender'])?  $_POST['director_gender']:'';
				$director_race = isset($_POST['director_race'])?  $_POST['director_race']:'';
				$director_DOB = isset($_POST['director_DOB'])?  $_POST['director_DOB']:'';
				$director_academic_qualifications = isset($_POST['director_academic_qualifications'])?  $_POST['director_academic_qualifications']:'';
				$director_profession = isset($_POST['director_profession'])?  $_POST['director_profession']:'';
				
				if(isset($_POST['save_company_director']))
				{
					$query = "SELECT * from company_members where ID='$director_ID'";
					$subject_set = mysqli_query($connection,$query); 
					$row = mysqli_fetch_array($subject_set);

					if(!$row)
					{
						$query ="INSERT INTO company_members VALUES ('".$director_ID."',
																		'".$reg_no."',
																	   '".$director_surname."',
																	   '".$director_other_names."',
																	   '".$director_telephone."',
																	   '".$director_email."',
																	   '".$director_postal_address."',
																	   '".$director_residential."',
																	   '".$director_gender."',
																	   '".$director_race."',
																	   '".$director_DOB."',
																	   '".$director_academic_qualifications."',
																	   '".$director_profession."'
																	   )";
						if(mysqli_query($connection,$query))
						{
							?>
								<div class="successmsg alert alert-autocloseable-danger">
									<a class="clostalert">close</a>
									<strong>Sucess!</strong> You have successfully registered a member's information.
								</div>
							<?php
						}
						else
						{
							?>
								<div class="errormsg alert alert-autocloseable-danger">
									<a class="clostalert">close</a>
									<strong>Error!</strong> Registration Unsuccessfull. Please try again.
								</div>
							<?php
						}
					}
					else
					{
						$query ="UPDATE company_members SET reg_no='".$reg_no."',surname='".$director_surname."', other_names='".$director_other_names."', telephone='".$director_telephone."',
															email='".$director_email."',postal_address='".$director_postal_address."', residential_address='".$director_residential."',
																			gender='".$director_gender."', race='".$director_race."', DOB='".$director_DOB."',
																			academic_qualifications='".$director_academic_qualifications."', profession='".$director_profession."' 
																			WHERE ID='$director_ID'";


						if(mysqli_query($connection,$query))
						{
							?>
								<div class="successmsg alert alert-autocloseable-danger">
									<a class="clostalert">close</a>
									<strong>Sucess!</strong> Successfully Updated a record.
								</div>
							<?php 
						}
						else
						{
							?>
								<div class="errormsg alert alert-autocloseable-danger">
									<a class="clostalert">close</a>
									<strong>Error!</strong> An error occured, Could not update a record.
								</div>
							<?php 
						}
					}
				}
		  ?>
		  </div>
		  
		  <?php
			$query = "SELECT * FROM company_members WHERE reg_no='$reg_no'";
			$subject_set = mysqli_query($connection,$query); 
			$row = mysqli_fetch_array($subject_set);
			
			$director_ID = $row['ID'];
			$director_surname = $row['surname'];
			$director_other_names = $row['other_names'];
			$director_telephone = $row['telephone'];
			$director_email = $row['email'];
			$director_gender = $row['gender'];
			$director_postal_address = $row['postal_address'];
			$director_residential = $row['residential_address'];
			$director_gender = $row['gender'];
			$director_race = $row['race'];
			$director_DOB = $row['DOB'];
			$director_academic_qualifications = $row['academic_qualifications'];
			$director_profession = $row['profession'];
			
			if(!$row)
			{
				?>
					<div class="alertmsg alert">
						<a class="clostalert">close</a>
						<strong>Warning! </strong> You haven't specified the director of your business. Please specify the director of your business below.
					</div>
				<?php 
			}

		?>
          <div class="checkoutsteptitle">Step 2: Business Director<a class="modify">Modify</a>
          </div>
          <div class="checkoutstep">
            <div class="row">
              <form class="form-horizontal" method="POST" action="home.php#director">
                <fieldset>
                  <div class="span4">
					<div class="control-group">
                      <label class="control-label" >ID<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" name="director_ID" required placeholder="ID" value="<?php echo $director_ID; ?>">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Names<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" name="director_other_names" required placeholder="Names" value="<?php echo $director_other_names; ?>">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Surname<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" name="director_surname" required placeholder="Surnames" value="<?php echo $director_surname; ?>">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Telephone<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" name="director_telephone" required placeholder="Telephone" value="<?php echo $director_telephone; ?>">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >E-Mail<span class="red">*</span></label>
                      <div class="controls">
                        <input type="email" name="director_email" required placeholder="Email" value="<?php echo $director_email; ?>">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Gender<span class="red">*</span></label>
                      <div class="controls">
						<select class="form-control" name="director_gender">
							  <option <?php if($director_gender=='Female') echo 'selected="selected"'?> >Female</option>
							  <option <?php if($director_gender=='Male') echo 'selected="selected"'?> >Male</option>
						 </select>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Race</label>
                      <div class="controls">
							<select class="form-control" id="director_race" name="director_race">
								  <option <?php if($director_race == 'Black') echo 'selected="selected"'?> >Black</option>
								  <option <?php if($director_race == 'Colored') echo 'selected="selected"'?> >Colored</option>
								  <option <?php if($director_race == 'White') echo 'selected="selected"'?> >White</option>
								  <option <?php if($director_race == 'Indian') echo 'selected="selected"'?> >Indian</option>
								  <option <?php if($director_race == 'Dual') echo 'selected="selected"'?> >Dual</option>
							 </select>
                      </div>
                    </div>
                  </div>
                  <div class="span4">
                    <div class="control-group">
                      <label class="control-label" >DOB</label>
                      <div class="controls">
											<input type="date" name="director_DOB" required placeholder="DOB" value="<?php echo $director_DOB;?>">
                      </div>
                    </div>
										<div class="control-group">
                      <label class="control-label" >Qualification</label>
                      <div class="controls">
                       <select id="director_academic_qualifications" name="director_academic_qualifications">
											<option <?php if($director_academic_qualifications=='None') echo 'selected="selected"'?> >None</option>
											<option <?php if($director_academic_qualifications=='Certificate') echo 'selected="selected"'?> >Certificate</option>
											<option <?php if($director_academic_qualifications=='Dimploma') echo 'selected="selected"'?> >Diploma</option>
											<option <?php if($director_academic_qualifications=='Degree') echo 'selected="selected"'?> >Degree</option>
											<option <?php if($director_academic_qualifications=='Honours') echo 'selected="selected"'?> >Honours</option>
											<option <?php if($director_academic_qualifications=='Masters') echo 'selected="selected"'?> >Masters</option>
											<option <?php if($director_academic_qualifications=='PHD') echo 'selected="selected"'?> >PHD</option>
							</select>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Profession: <span class="red">*</span></label>
                      <div class="controls">
                        <textarea class="form-control" rows="3" type="text" name="director_profession" required id="body" ><?php echo $director_profession; ?></textarea>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Postal<span class="red">*</span></label>
                      <div class="controls">
                        <textarea class="form-control" rows="3" type="text" name="director_postal_address" required id="body" ><?php echo $director_postal_address; ?></textarea>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Residential<span class="red">*</span></label>
                      <div class="controls">
                        <textarea class="form-control" rows="3" type="text" name="director_residential" required id="body" ><?php echo $director_residential; ?></textarea>
                      </div>
                    </div>
                  </div>
				  <button type="submit" name="save_company_director" class="btn btn-info  pull-right" class="pull-left">Save Information</button>
                </fieldset>
              </form>
            </div>
          </div>
		  <div id="uploaded">
		  <?php
				if(isset($_POST['upload']))
				{
					if(isset($_FILES['file']))
					{
						if(file_exists( 'profiles/'.$logo ) && $logo!="")
						{
							unlink('profiles/'.$logo);
						}
			
					  $file = $_FILES['file'];
					  $path_parts = pathinfo($_FILES["file"]["name"]);
					  $extension = $path_parts['extension'];
					  //file properties
					  $logo_upload = $user.'.'.$extension;
					  $file_tmp = $file['tmp_name'];
					  $path = $_SERVER['DOCUMENT_ROOT'] . '/chamber/profiles/'.$logo_upload;
						
						if(move_uploaded_file($file_tmp,$path))
						{
							$query ="UPDATE company_details SET logo='".$logo_upload."' WHERE username='$user'";
							if(mysqli_query($connection,$query))
							{
								?>
									<div class="successmsg alert alert-autocloseable-success">
										<a class="clostalert">close</a>
										<strong>Sucess!</strong> Successfully added a profile. Refresh the page to see the profile.
									</div>
								<?php 
							}
							else
							{
								?>
									<div class="errormsg alert alert-autocloseable-danger">
										<a class="clostalert">close</a>
										<strong>Error!</strong> Could not add a profile!
									</div>
								<?php 
							}
						}
					}
				}
		  ?>
		</div>
		  <div class="checkoutsteptitle">Step 3: Company Logo<a class="modify">Modify</a>
          </div>
          <div class="checkoutstep ">
            <section class="newcustomer ">
              <h3 class="heading3">Business Logo </h3>
              <div class="loginbox">
				<form enctype="multipart/form-data" class="form-horizontal" method="POST" action="home.php#uploaded">
					<label class="inline">
					  <input type="file" required name="file" required >
					 </label>
					<p><br>
					<div class="infomsg alert">
						<strong>NOTE! </strong> Please upload your company Logo ONLY. Must not be larger than 2MB!
					</div>
					 </p>
					<br>
					<button type="submit" name="upload" class="btn btn-info  pull-right" class="pull-left">Upload</button>
				</form>
              </div>
            </section>
            <section class="returncustomer">
              <div class="loginbox">
				<?php
					if($logo == '')
					{
						?>
							<img src="image/default.jpg" width="100%" height="100%" />
						<?php
					}
					else
					{
						?>
							<img src="profiles/<?php echo $logo; ?>" width="100%" height="100%" />
						<?php
					}
				?>
              </div>
            </section>
          </div>
        </div>        
        <!-- Sidebar Start-->
        <div class="span3">
          <aside>
            <div class="sidewidt">
              <h2 class="heading2"><span> Join Chamber</span></h2>
              <ul class="nav nav-list categories">
                <li>
                  <a class="active" href="join.php">Join</a>
                </li>
                <li>
                  <a href="members.php">Members</a>
                </li>
                <li>
                  <a href="deregister.php">Deresgister</a>
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