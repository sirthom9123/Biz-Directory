<?php
		session_start();

		unset($_SESSION['usernameAdmin']);//Delete the user_logged_in key;
	
	//session_destroy();//This would delete all of the session keys
	header('Location:index.php');
?>