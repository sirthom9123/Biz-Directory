<?php
		session_start();

		unset($_SESSION['user_logged_in']);//Delete the user_logged_in key;
	
	//session_destroy();//This would delete all of the session keys
	header('Location:index.php');
?>