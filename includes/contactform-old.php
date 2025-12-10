<script type="text/javascript">
if (document.images) {
    img1 = new Image();
    img1.src = "
https://websitetalkingheads.com/images/submit_hover.png";
}
</script>
<script type="text/javascript" src="https://www.websitetalkingheads.com/includes/validate.js"></script>
<form action="cgi-sys/formmail.pl" method="POST" enctype="multipart/form-data" name="contactform" target="_self" class="form2">
<input name="subject" type="hidden" value="Quote Request">
<input name="recipient" type="hidden" id="recipient" value="sales@websitetalkingheads.com">
<input name="redirect" type="hidden" id="redirect" target="_self" value="https://www.websitetalkingheads.com/quoteform/ThankYou.php">
<div id ="formtoptext">Contact Us</div>
<br />
<div id="c"></div>
<div id="formLeft">
       <span class="formLabel">Name</span>
          <input name="Name" type="text" class="formInput" id="Name" placeholder="Your name here" size="35"><br /><span class="formLabel">Company</span>
         <input name="Company" type="text" class="formInput" id="Company" size="35" placeholder="Your company here"> <br /><span class="formLabel">Email</span>
    <input name="mailfrom" type="email" class="formInput" id="email" placeholder="Your email here" size="35"><br />
    <span class="formLabel">Phone</span><input name="Phone" type="tel" id="Phone" class="formInput" placeholder="XXX-XXX-XXXX" size=35 maxlength=12> </div>
<div id="formRight">
         <span class="formLabel">Message</span><br />
    <textarea name="Comments" cols="46" rows="3" class="formTextField"></textarea>
         <input type="hidden" name="Sent From" value="Contact us Page on Websitetalkingheads.com" />
</div>
<div id="c"></div><br /><br /><br /><br /><br />
<div id="formSubmit"><input name="submit" type="submit" class="formSubmit" id="submit" onclick="MM_validateForm('Name','','R','email','','RisEmail');return document.MM_returnValue" value=""></div>


</form>

<br />
