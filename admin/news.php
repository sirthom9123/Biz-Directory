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
        <li class="active">News</li>
      </ul>
      <div class="row">
        <!-- Sidebar Start-->
        <aside  class="span3">  
         <!-- Category-->
           <!-- Other-->
          <div class="sidewidt">
            <h2 class="heading2"><span>Others</span></h2>
            <ul id="myTab" class="nav nav-tabs">
              <li class="active"><a href="#popular">Popular</a>
              </li>
            </ul>
            <div class="tab-content sideblog">
              <div id="popular" class="tab-pane active">
                <ul>
                  <li>
                    <img class="sideblogimage" width="50" height="50" src="img/chamber.jpg" alt="product" title="product">
                    <a class="blogtitle" href="read_news.php">My Blog Title will appear here  </a>
                    <div>                      
                      <span class="mr10"><i class="icon-calendar"></i> January 10, 2013 </span>
                      <span class="mr10"><a href="#"><i class="icon-comment"></i> 8 Comments</a> </span>
                      <span class="mr10"> <a href="#"><i class="icon-tag"></i> css3, html5, responsive</a> </span>
                      </div>
                  </li>
                  <li>
                    <img class="sideblogimage" width="50" height="50" src="img/chamber.jpg" alt="product" title="product">
                    <a class="blogtitle" href="read_news.php">My Blog Title will appear here  </a>
                    <div>                      
                      <span class="mr10"><i class="icon-calendar"></i> August 26, 2012 </span>
                      <span class="mr10"><a href="#"><i class="icon-comment"></i> 15 Comments</a> </span>
                      <span class="mr10"> <a href="#"><i class="icon-tag"></i> css3, html5, responsive</a> </span>
                      </div>
                  </li>
				  <li>
                    <img class="sideblogimage" width="50" height="50" src="img/chamber.jpg" alt="product" title="product">
                    <a class="blogtitle" href="read_news.php">My Blog Title will appear here  </a>
                    <div>                      
                      <span class="mr10"><i class="icon-calendar"></i> August 26, 2012 </span>
                      <span class="mr10"><a href="#"><i class="icon-comment"></i> 15 Comments</a> </span>
                      <span class="mr10"> <a href="#"><i class="icon-tag"></i> css3, html5, responsive</a> </span>
                      </div>
                  </li>
				  <li>
                    <img class="sideblogimage" width="50" height="50" src="img/chamber.jpg" alt="product" title="product">
                    <a class="blogtitle" href="read_news.php">My Blog Title will appear here  </a>
                    <div>                      
                      <span class="mr10"><i class="icon-calendar"></i> August 26, 2012 </span>
                      <span class="mr10"><a href="#"><i class="icon-comment"></i> 15 Comments</a> </span>
                      <span class="mr10"> <a href="#"><i class="icon-tag"></i> css3, html5, responsive</a> </span>
                      </div>
                  </li>
				  <li>
                    <img class="sideblogimage" width="50" height="50" src="img/chamber.jpg" alt="product" title="product">
                    <a class="blogtitle" href="read_news.php">My Blog Title will appear here  </a>
                    <div>                      
                      <span class="mr10"><i class="icon-calendar"></i> August 26, 2012 </span>
                      <span class="mr10"><a href="#"><i class="icon-comment"></i> 15 Comments</a> </span>
                      <span class="mr10"> <a href="#"><i class="icon-tag"></i> css3, html5, responsive</a> </span>
                      </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </aside>
        <!-- Sidebar End--> 
         <!-- Blog listing-->      
        <div class="span9 bloggrid">
          <h1 class="heading1"><span class="maintext">News</span></h1>
         <ul class="thumbnails">
          <li class="span3">
            <div class="thumbnail">
              <a href="img/product1.jpg" class="fancyboxpopup"><img alt="" src="img/product1a.jpg"><span class="viewfancypopup">&nbsp;</span></a>
              <div class="caption">
                <a href="read_news.php" class="bloggridtitle">My First Blog Title Appear 
                </a>               
                <div class="author">by : <a href="#"> pxcreate</a>
                </div>
                <div>
                      
                      <span class="mr10"><i class="icon-calendar"></i> August 26, 2012 </span>
                      <span class="mr10"><a href="#"><i class="icon-comment"></i> 5 Comments</a> </span><br>
                      <span class="mr10"> <a href="#"><i class="icon-tag"></i> css3, html5, responsive</a> </span>
                      </div>
                     
                    </div>
              </div>
            
          </li>
          <li class="span3">
            <div class="thumbnail">
              <a href="img/product2.jpg" class="fancyboxpopup"><img alt="" src="img/product2a.jpg"><span class="viewfancypopup">&nbsp;</span></a>
              <div class="caption">
                <a href="read_news.php" class="bloggridtitle">My First Blog Title Appear 
                </a>               
                <div class="author">by : <a href="#"> pxcreate</a>
                </div>
                <div>
                      
                      <span class="mr10"><i class="icon-calendar"></i> August 26, 2012 </span>
                      <span class="mr10"><a href="#"><i class="icon-comment"></i> 5 Comments</a> </span><br>
                      <span class="mr10"> <a href="#"><i class="icon-tag"></i> css3, html5, responsive</a> </span>
                      </div>
                     
                    </div>
              </div>
            
          </li>
          <li class="span3">
            <div class="thumbnail">
              <a href="img/chamber.jpg" class="fancyboxpopup"><img alt="" src="img/chamber.jpg"><span class="viewfancypopup">&nbsp;</span></a>
              <div class="caption">
                <a href="read_news.php" class="bloggridtitle">My First Blog Title Appear 
                </a>               
                <div class="author">by : <a href="#"> pxcreate</a>
                </div>
                <div>
                      
                      <span class="mr10"><i class="icon-calendar"></i> August 26, 2012 </span>
                      <span class="mr10"><a href="#"><i class="icon-comment"></i> 5 Comments</a> </span><br>
                      <span class="mr10"> <a href="#"><i class="icon-tag"></i> css3, html5, responsive</a> </span>
                      </div>
                     
                    </div>
              </div>
            
          </li>
          <li class="span3">
            <div class="thumbnail">
              <a href="img/chamber.jpg" class="fancyboxpopup"><img alt="" src="img/chamber.jpg"><span class="viewfancypopup">&nbsp;</span></a>
              <div class="caption">
                <a href="read_news.php" class="bloggridtitle">My First Blog Title Appear 
                </a>               
                <div class="author">by : <a href="#"> pxcreate</a>
                </div>
                <div>
                      
                      <span class="mr10"><i class="icon-calendar"></i> August 26, 2012 </span>
                      <span class="mr10"><a href="#"><i class="icon-comment"></i> 5 Comments</a> </span><br>
                      <span class="mr10"> <a href="#"><i class="icon-tag"></i> css3, html5, responsive</a> </span>
                      </div>
                     
                    </div>
              </div>
            
          </li>
          <li class="span3">
            <div class="thumbnail">
              <a href="img/chamber.jpg" class="fancyboxpopup"><img alt="" src="img/chamber.jpg"><span class="viewfancypopup">&nbsp;</span></a>
              <div class="caption">
                <a href="read_news.php" class="bloggridtitle">My First Blog Title Appear 
                </a>               
                <div class="author">by : <a href="#"> pxcreate</a>
                </div>
                <div>
                      
                      <span class="mr10"><i class="icon-calendar"></i> August 26, 2012 </span>
                      <span class="mr10"><a href="#"><i class="icon-comment"></i> 5 Comments</a> </span><br>
                      <span class="mr10"> <a href="#"><i class="icon-tag"></i> css3, html5, responsive</a> </span>
                      </div>
                     
                    </div>
              </div>
            
          </li>
          <li class="span3">
            <div class="thumbnail">
              <a href="img/chamber.jpg" class="fancyboxpopup"><img alt="" src="img/chamber.jpg"><span class="viewfancypopup">&nbsp;</span></a>
              <div class="caption">
                <a href="read_news.php" class="bloggridtitle">My First Blog Title Appear 
                </a>               
                <div class="author">by : <a href="#"> pxcreate</a>
                </div>
                <div>
                      
                      <span class="mr10"><i class="icon-calendar"></i> August 26, 2012 </span>
                      <span class="mr10"><a href="#"><i class="icon-comment"></i> 5 Comments</a> </span><br>
                      <span class="mr10"> <a href="#"><i class="icon-tag"></i> css3, html5, responsive</a> </span>
                      </div>
                     
                    </div>
              </div>
            
          </li>
          <li class="span3">
            <div class="thumbnail">
              <a href="img/chamber.jpg" class="fancyboxpopup"><img alt="" src="img/chamber.jpg"><span class="viewfancypopup">&nbsp;</span></a>
              <div class="caption">
                <a href="read_news.php" class="bloggridtitle">My First Blog Title Appear 
                </a>               
                <div class="author">by : <a href="#"> pxcreate</a>
                </div>
                <div>
                      
                      <span class="mr10"><i class="icon-calendar"></i> August 26, 2012 </span>
                      <span class="mr10"><a href="#"><i class="icon-comment"></i> 5 Comments</a> </span><br>
                      <span class="mr10"> <a href="#"><i class="icon-tag"></i> css3, html5, responsive</a> </span>
                      </div>
                     
                    </div>
              </div>
            
          </li>
          <li class="span3">
            <div class="thumbnail">
              <a href="img/chamber.jpg" class="fancyboxpopup"><img alt="" src="img/chamber.jpg"><span class="viewfancypopup">&nbsp;</span></a>
              <div class="caption">
                <a href="read_news.php" class="bloggridtitle">My First Blog Title Appear 
                </a>               
                <div class="author">by : <a href="#"> pxcreate</a>
                </div>
                <div>
                      
                      <span class="mr10"><i class="icon-calendar"></i> August 26, 2012 </span>
                      <span class="mr10"><a href="#"><i class="icon-comment"></i> 5 Comments</a> </span><br>
                      <span class="mr10"> <a href="#"><i class="icon-tag"></i> css3, html5, responsive</a> </span>
                      </div>
                     
                    </div>
              </div>
            
          </li>
          <li class="span3">
            <div class="thumbnail">
              <a href="img/chamber.jpg" class="fancyboxpopup"><img alt="" src="img/chamber.jpg"><span class="viewfancypopup">&nbsp;</span></a>
              <div class="caption">
                <a href="read_news.php" class="bloggridtitle">My First Blog Title Appear 
                </a>               
                <div class="author">by : <a href="#"> pxcreate</a>
                </div>
                <div>
                      
                      <span class="mr10"><i class="icon-calendar"></i> August 26, 2012 </span>
                      <span class="mr10"><a href="#"><i class="icon-comment"></i> 5 Comments</a> </span><br>
                      <span class="mr10"> <a href="#"><i class="icon-tag"></i> css3, html5, responsive</a> </span>
                      </div>
                     
                    </div>
              </div>
          </li>
        </ul>
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
              <li><a href="#">5</a>
              </li>
              <li><a href="#">6</a>
              </li>
              <li><a href="#">7</a>
              </li>
              <li><a href="#">8</a>
              </li>
              <li><a href="#">Next</a>
              </li>
            </ul>
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
</body>
</html>