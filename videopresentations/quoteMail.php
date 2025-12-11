<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php $yourName = $_POST['leadName']; // the variable needsto match your Actionscript

$fromEmail = $_POST['email']; // the variable needs to match your Actionscript

$yourSubject = $_POST['phone']; // the variable needs to match your Actionscript

$YourMsg = $_POST['comments']; // the variable needs to match your Actionscript

if( $yourName == true ) { $sender = $fromEmail; $yourEmail ="sales@websitetalkingheads.com, andy@websitetalkingheads.com"; // This will be your email address so please change this

$ipAddress = $_SERVER['REMOTE_ADDR']; // This gets the user's ip Address

$emailMsg = "Name: $yourName 
Email: $sender
Phone: $yourSubject
Company: $YourMsg 
\n\n
This was sent from IP:$ipAddress
This email was sent using quote form on the video presentation page of Website Talking Heads";
$return = "From: $sender\r\n" .
"Reply-To:$sender \r\n" ."X-Mailer: PHP/" . phpversion();

if( mail( $yourEmail, "Lead from your website", $emailMsg, $return))

{ 
echo "sentStatus=yes"; }

else { echo "sentStatus=no"; } }
?> 

</body>
</html>
