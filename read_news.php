<?php
	include('object.php');
	include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>BizPortal | News</title>
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
	$i = 6;
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
        <li class="active">Blog</li>
      </ul>
      <div class="row">        
        <!-- Sidebar Start-->
        <aside  class="span3">
          <div class="sidewidt">
            <h2 class="heading2"><span>Related Topics</span></h2>
            <ul id="myTab" class="nav nav-tabs">
              <li class="active"><a href="#popular">Topics</a>
              </li>
            </ul>
            <div class="tab-content sideblog">
              <div id="popular" class="tab-pane active">
                <ul>
                  <li>
                    <img class="sideblogimage" width="50" height="50" src="img/prodcut-40x40.jpg" alt="product" title="product">
                    <a class="blogtitle" href="product.html">My Blog Title will appear here </a>
                    <div class="pull-left">
                      <span class="mr10"><i class="icon-calendar"></i> January 10, 2013 </span>
                      <span class="mr10"><a href="#"><i class="icon-comment"></i> 8 Comments</a>
                      </span>
                      <span class="mr10">
                      <a href="#"><i class="icon-tag"></i> css3, html5, responsive</a>
                      </span>
                    </div>
                  </li>
                  <li>
                    <img class="sideblogimage" width="50" height="50" src="img/prodcut-40x40.jpg" alt="product" title="product">
                    <a class="blogtitle" href="product.html">My Blog Title will appear here </a>
                    <div class="pull-left">
                      <span class="mr10"><i class="icon-calendar"></i> August 26, 2012 </span>
                      <span class="mr10"><a href="#"><i class="icon-comment"></i> 15 Comments</a>
                      </span>
                      <span class="mr10">
                      <a href="#"><i class="icon-tag"></i> css3, html5, responsive</a>
                      </span>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </aside>
        <!-- Sidebar End-->
        <div class="span9">
         <!-- Blog start-->   
          <section id="latestblog">         
            <div class="blogdetail">
              <h2 class="heading2"><span>BLog Title Appear</span></h2>
              <div class="blogicons">
                <div class="pull-left">
                  <span class="mr10"><i class="icon-calendar"></i> August 26, 2012 </span>
                  <span class="mr10"><a href="#"><i class="icon-comment"></i> 5 Comments</a>
                  </span>
                  <span class="mr10">
                  <a href="#"><i class="icon-tag"></i> css3, html5, responsive</a>
                  </span>
                </div>
              </div>
              <ul class="margin-none">
                <li class="listblcok">
                  <div class="mb20">
                    <a class="fancyboxpopup thumbnail" href="img/product1big.jpg"><img src="img/productblog.jpg" alt=""></a>
                  </div>
                  <div class="caption">
                    <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.</p>
                    <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard. </p>
                    <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard. </p>
                    <br>
                    <br>
                    <div class="author">by:<a href="#"> themeforest</a>
                    </div>
                  </div>
                </li>
              </ul>
              <!-- Comment-->
              <section class="commentsblog">
                <h2 class="heading2"><span>Comments (2)</span></h2>
                <ul class="comments">
                  <li>
                    <a class="avtar thumbnail" ><img src="img/avtar.jpg" alt=""></a>
                    <div class="commentdetail">
                      <a class="blogtitle" href="#">themeforest</a>
                      <p> Hi, I am themeforest. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.</p>
                      <p> I am themeforest. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.</p>
                      <a href="#">http://www.themeforest.net</a>
                    </div>
                  </li>
                  <li>
                    <a class="avtar thumbnail " ><img src="img/avtar.jpg" alt=""></a>
                    <div class="commentdetail">
                      <a class="blogtitle" href="#">themeforest</a>
                      <p> Hi, I am themeforest. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.</p>
                      <p> I am themeforest. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.</p>
                      <a href="#">http://www.themeforest.net</a>
                    </div>
                  </li>
                </ul>
              </section>
              <!-- Leave Comment-->
              <section class="leavecomment">
                <h2 class="heading2"><span>Leave a comment</span></h2>
                <form method="post" class="form-horizontal commentform2" novalidate="novalidate">
                  <fieldset>
                    <div class="control-group">
                      <label class="control-label" >Name <span class="required">*</span></label>
                      <div class="controls">
                        <input type="text" name="name" value="" id="name" class="required">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Email <span class="required">*</span></label>
                      <div class="controls">
                        <input type="email" name="email" value="" id="email" class="required email">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Url</label>
                      <div class="controls">
                        <input type="url" name="url" value="" id="url">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Your Comment</label>
                      <div class="controls">
                        <textarea name="messagee" id="message" cols="40" rows="6" class="required"></textarea>
                      </div>
                    </div>
                    <div class="controls">
                      <input type="submit" id="submit_id" value="Submit" class="btn btn-orange">
                      <input type="reset" value="Reset" class="btn">
                    </div>
                  </fieldset>
                </form>
              </section>
            </div>
             <!-- Paging-->
            <div class="row">
              <div class="pagination pull-right">
                <ul>
                  <li><a href="#">Prev</a>
                  </li>
                  <li class="active">
                    <a href="#">1</a>
                  </li>
                  <li><a href="#">2</a>
                  </li>
                  <li><a href="#">3</a>
                  </li>
                  <li><a href="#">4</a>
                  </li>
                  <li><a href="#">Next</a>
                  </li>
                </ul>
              </div>
            </div>
          </section>
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
</body>
</html>