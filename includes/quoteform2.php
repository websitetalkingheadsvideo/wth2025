<?php
 
if(isset($_REQUEST['submit']))
{
$name= $_REQUEST['name'];
$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];
$message = $_REQUEST['message'];
//$request = $_REQUEST['request'];

$to = 'andy@websitetalkingheads.com';
$subject = "Whiteboard Request from Talking Heads&reg;";


$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";



// More headers
$headers .= 'From: <'.$email.'>' . "\r\n";
	$email_message = "Sent from explanation video landing page<br>";
	$email_message .= "Name:" .$name. "<br>";
	$email_message .= "Email: ".$email."<br>";
	$email_message .= "Phone: ".$phone." <br>";
	//$email_message .= "Request For: ".$request."<br>";
	$email_message .= "Message: ".$message."<br>";




	mail($to,$subject,$email_message,$headers);
	$message_send = "Thank You for Submitting Form";	
	
}
?>
<script type="text/javascript">
if (document.images) {
    img1 = new Image();
    img1.src = "
https://websitetalkingheads.com/images/submit_hover.png";
}
</script>

<script type="text/javascript" src="https://www.websitetalkingheads.com/includes/validate.js"></script>

<form action="../cgi-sys/formmail.pl" method="POST" enctype="multipart/form-data" name="contact" target="_self" class="form">
<input name="subject" type="hidden" value="Quote Request">
<input name="recipient" type="hidden" id="recipient" value="andy@websitetalkingheads.com">
<input name="redirect" type="hidden" id="redirect" target="self" value="https://www.websitetalkingheads.com/quoteform/ThankYou.php">
<div id ="formtoptext">Request a Quote</div><br />
<div id="c"></div>
<div id="formLeft">
       <span class="formLabel">Name</span>
          <input name="Name" type="text" class="formInput" id="Name" placeholder="Your name here" size="35"><br />
          <span class="formLabel">Company</span>
         <input name="Company" type="text" class="formInput" id="Company" size="35" placeholder="Your company here"> <br />
         <span class="formLabel">Email</span>
    <input name="mailfrom" type="email" class="formInput" id="email" placeholder="Your email here" size="35"><br />
    <span class="formLabel">Phone</span>
    <input name="Phone" type="tel" id="Phone" class="formInput" placeholder="XXX-XXX-XXXX" size=35> </div>
<div id="formRight" >
         <span class="formLabel">Message</span><br />
    <textarea name="Comments" cols="46" rows="3" class="formTextField"></textarea>
         <input type="hidden" name="Sent From" value="Request a Quote on Websitetalkingheads.com" />
</div>
<div id="c"></div><br /><br />
<div id="formSubmit"><input name="submit" type="submit" class="formSubmit" id="submit" onclick="return validate();" value=""></div>

</form>
<br />
