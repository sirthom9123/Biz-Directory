<header>
  <div class="headerstrip">
    <div class="container">
      <div class="row">
        <div class="span12">
          <!--<a href="index-2.html" class="logo pull-left"><img src="image/logo2.png" alt="SimpleOne" title="SimpleOne"></a>-->
          
          <!-- Top Nav End -->
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
		if(isset($_SESSION["usernameAdmin"])) 
		{
			include('logged_in.php');
		}
	?>
    <div id="categorymenu">
      <nav class="subnav">
        <ul class="nav-pills categorymenu">
          <li><a <?php if($i == 1) echo 'class="active"'; ?>  href="index.php">Home</a></li>
          <li>
          <li>
				<a <?php if($i == 4) echo 'class="active"'; ?>  href="search_directory.php">Directory</a>
          <div>
            <ul>
            <li><a href="directory.php">Enterprise Directory</a>
            </li>
            </ul>
          </div>
          </li>
          </li>
          <li><a <?php if($i == 5) echo 'class="active"'; ?>  href="accounts.php">Accounts</a>
            <div>
              <ul>
                <li><a href="member.php">Members</a>
                </li>
                <li><a href="deregister.php">Deregister</a>
                </li>
				        <li><a href="complaints.php">Complaints</a>
                </li>
              </ul>
            </div>
            </li>
		       <li><a href="logout.php">Logout</a>
          </li>         
        </ul>
      </nav>
    </div>
  </div>
</header>