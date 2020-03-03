<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<META HTTP-EQUIV="refresh" content="0;URL=thankyou.php">
<title>Email Form</title>
</head>

<body>
<?php
  $name = addslashes($_POST['name']);
  $email = addslashes($_POST['email']);
  $comments = addslashes($_POST['message']);
  $subject = addslashes($_POST['subject']);
  
  $me = isset($_POST['me'])? $_POST['me'] : '';

 // you can specify which email you want your contact form to be emailed to here

  $toemail = "biz-reply@devfix.co.za";
  $subject = "Biz Portal";

  $headers = "MIME-Version: 1.0\n"
            ."From: \"".$name."\" <".$email.">\n"
            ."Content-type: text/html; charset=iso-8859-1\n";

  $body = "Subject: ".$subject."<br>\n"
          ."Name: ".$name."<br>\n"
 			    ."Email: ".$email."<br>\n"
          ."Meesage:<br>\n"
          .$comments;

  if (!ereg("^[a-zA-Z0-9_]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$", $email))
  {
    echo "That is not a valid email address.  Please return to the"
           ." previous page and try again.";
    exit;
  }
  
  if($me != '')
  {
	mail($toemail, $subject, $body, $headers);
	mail($email, $subject, $body, $headers);
  }
  else
  {
	mail($toemail, $subject, $body, $headers);
  }
?>
</body>
</html>
