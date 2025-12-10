<script type="text/javascript" src="https://www.websitetalkingheads.com/includes/validate-highlight.js"></script>
<?php
 
if(isset($_REQUEST['submit']))
{
$name= $_REQUEST['name'];
$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];
$company = $_REQUEST['company'];
$message = $_REQUEST['theMessage'];
//$request = $_REQUEST['request'];

$to = 'andy@websitetalkingheads.com';
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

<form name="contactform" id="contactForm" action="" method="post" >
       <input type="text" onblur="if(this.value=='') {this.value='Name';}" onfocus="if(this.value=='Name') {this.value='';}"  name="name" value="Name">
      <input type="text" onblur="if(this.value=='') {this.value='Email';}" onfocus="if(this.value=='Email') {this.value='';}" name="email" value="Email">
      <input type="text"  onblur="if(this.value=='') {this.value='Phone';}" onfocus="if(this.value=='Phone') {this.value='';}" name="phone" value="Phone">
      <input type="text"  onblur="if(this.value=='') {this.value='Company';}" onfocus="if(this.value=='Company') {this.value='';}" name="company" value="Company">
     <textarea onblur="if(this.value=='') {this.value='Message';}" onfocus="if(this.value=='Message') {this.value='';}" name="theMessage" rows="3">Message</textarea>
     <div class="formMessage">text</div>
    <div id="formSubmit"><input name="submit" type="submit" class="formSubmit" id="submit" onclick="return validate();" value=""></div>
</form>   





