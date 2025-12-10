<?php
 $referersite = strtolower($_SERVER['HTTP_REFERER']);

$name= $_REQUEST['name'];
$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];
$company = $_REQUEST['company'];
$message = $_REQUEST['theMessage'];
$sentIP = $_REQUEST['sentIP'];
//$request = $_REQUEST['request'];

$verified = true;

$testerArray = explode(" ",$company);
$tester = $testerArray[0];
$lowerFirst = lcfirst($tester);
$lowerAll = strtolower($tester);
if($lowerFirst !== $lowerAll){
		$verified = false;
	}
	
$testerArray2 = explode(" ",$name);
$tester2 = $testerArray2[0];
$lowerFirst2 = lcfirst($tester2);
$lowerAll2 = strtolower($tester2);
if(lcfirst($tester2) !== strtolower($tester2)){
		$verified = false;
	}


if(strpos($message, "href") > 0){
	$verified = false;
	}
	
if ($phone == "123456"){
	$verified = false;
	}
if ($company == "google"){
	$verified = false;
}
if ($phone == "" || is_null($phone)){
	if ($email == "" || is_null($email)){
			$verified = false;
}
}
if ($name == "" || is_null($name)||  $sentIP == "" || is_null($sentIP)  ){
	$verified = false;
}


//Sending the email
if ($verified){

//Building the email
$to = 'sales@websitetalkingheads.com, andy@websitetalkingheads.com';
$subject = "Contact Form on WebsiteTalkingHeads.com";


$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";



// More headers
$headers .= 'From: <'.$email.'>' . "\r\n";
	$email_message = "Contact Form on WebsiteTalkingHeads.com<br>";
	$email_message .= "Name:" .$name. "<br>";
	$email_message .= "Company: ".$company." <br>";
	$email_message .= "Email: ".$email."<br>";
	$email_message .= "Phone: ".$phone." <br>";
	//$email_message .= "Request For: ".$request."<br>";
	$email_message .= "Message: ".$message."<br>";
	$email_message .= "Sent From: ".$sentIP."<br>";




	mail($to,$subject,$email_message,$headers);
	$message_send = "Thank You for Submitting Form";	
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/NewPhp.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Website Talking Heads&reg; - Add an Online Video Spokesperson to Your Website, Virtual Spokesperson, Website Video Spokesperson, Web Spokesperson, Website Actor</title>
<link href="../css/contact.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<meta name="keywords" content="online spokesperson, video spokesperson, website talking heads, website actor, website video, transparent flash, virtual spokesperson, spokesperson, video presenter, website presenter, website spokesperson, video salesperson">
<meta name="description" content="Online video spokesperson.  For only $199, add a virtual spokesperson to your website.  An online presenter can increase traffic conversion rates on your website.  Integrate flash video, website video, website actor and objects to create dynamic streaming video and easily add it your existing website.">
<META NAME="robots" CONTENT="index, follow"> <!-- (Robot commands: All, None, Index, No Index, Follow, No Follow) -->
<META NAME="revisit-after" CONTENT="30 days">
<META NAME="distribution" CONTENT="global">
<META NAME="rating" CONTENT="general">
<META NAME="Content-Language" CONTENT="english">
<meta name="verify-v1" content="YNESpqoAwK51PmBV7/PFKLG0agx7AQPKhXXcYAXGGF8=" />
<meta name="norton-safeweb-site-verification" content="iinbv24r-1ix20hgj5l94wz2rnn3aiwi0336hwysvvpiskquy6ijsh9wy12f3znbed-hz1ay8ppzhgqap-sicqtw6ui29d0wrfcpenudh1ml9xwjbej7u25xy9pnm6yr" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="
https://websitetalkingheads.com/css/fluid.css" rel="stylesheet" type="text/css" />
<link href="
https://websitetalkingheads.com/css/style.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>
<body>
<!-- InstanceBeginEditable name="MainContent" -->
/*<div id="container">
<?php include ('header25.php'); ?>

	
    
   <h1>Thank you for Contacting  Us.</h1>
   <p>Thank you for contacting us at WebsiteTalkingHeads<sup>&#174;</sup>. One of our Project Managers will be in touch with you within 2 business days. If you would like to talk to us immediately please call us at<span class="blueText"> 801-748-2281</span>.</p>
<div class="contactInfo">
	<div class="valueNames">
		<ul>    
            <li>Name: <?=$name?></li>
            <li>Company: <?=$company?></li>
            <li>Email: <?=$email?></li>
            <li>Phone: <?=$phone?></li>
            <li>Message: <?=$message?></li>
            <li>Sent From: <?=$referersite?></li>
            <li>IP: <?=$sentIP?></li>
            <li>Verified: <?=$verified?></li>
    	</ul>
	</div>


</div>
<div id="c"></div>

<?php include ('footer25.php'); ?>   
</div>

<?php include ('chatform.php'); ?>  
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>