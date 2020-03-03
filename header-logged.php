<header>
  <div class="headerstrip">
    <div class="container">
      <div class="row">
        <div class="span12">
          <!--<a href="index-2.html" class="logo pull-left"><img src="" alt="" title=""></a>-->
          <div class="pull-right">
            <form class="form-search top-search">
              <input type="text" class="input-medium search-query" placeholder="Search Here…">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
	
	<?php
		if(isset($_SESSION["user_logged_in"])) 
		{
			include('logged_in.php');
		}
	?>
    <div id="categorymenu">
      <nav class="subnav">
        <ul class="nav-pills categorymenu">
          <li><a <?php if($i == 3) echo 'class="active"'; ?> href="home.php">My Account</a></li>
          <li><a <?php if($i == 5) echo 'class="active"'; ?>  href="">Compliance</a>
            <div>
              <ul>
                <li><a href="join.php">Register B-BBEE</a>
                </li>
                <li><a href="deregister.php">Deregister</a>
                </li>
				        <li><a href="complaints.php">Submit Complaint</a>
                </li>
              </ul>
            </div>
          </li>       
        </ul>
      </nav>
    </div>
  </div>
</header>