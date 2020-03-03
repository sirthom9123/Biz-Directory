<?php
	if(isset($_SESSION['usernameAdmin']))
	{
		$user_session = $_SESSION['usernameAdmin'];
		$query = "SELECT * FROM admin WHERE  SHA1(username)='$user_session'";
		$subject_set = mysqli_query($connection,$query);
		$row = mysqli_fetch_array($subject_set);

		$names = $row['surname'].' '.$row['name'];
		$user = $row['username'];
		$level = $row['level'];
		

		//Expire the session if user is inactive for 30
		//minutes or more.
		$expireAfter = 10;

		//Check to see if our "last action" session
		//variable has been set.
		if(isset($_SESSION['last_action'])){
			
			//Figure out how many seconds have passed
			//since the user was last active.
			$secondsInactive = time() - $_SESSION['last_action'];
			
			//Convert our minutes into seconds.
			$expireAfterSeconds = $expireAfter * 60;
			
			//Check to see if they have been inactive for too long.
			if($secondsInactive >= $expireAfterSeconds){
				//User has been inactive for too long.
				//Kill their session.
				session_unset();
				session_destroy();
			}
			
		}

		//Assign the current timestamp as the user's
		//latest activity
		$_SESSION['last_action'] = time();
	}
	else
	{
		header('Location:index.php');
	}
?>