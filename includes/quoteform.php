<script type="text/javascript">
if (document.images) {
    img1 = new Image();
    img1.src = "
https://websitetalkingheads.com/images/submit_hover.png";
}
</script>

<script type="text/javascript" src="https://www.websitetalkingheads.com/includes/validate.js"></script>

<form action="https://www.websitetalkingheads.com/includes/quoteSendMail.php" method="POST"  name="quoteForm"  class="form ">
<input name="subject" type="hidden" value="Quote Request">
<input name="redirect" type="hidden" id="redirect" target="self" value="https://www.websitetalkingheads.com/includes/ThankYou.php">
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
    <textarea name="Comments" id="Comments" cols="46" rows="3" class="formTextField"></textarea>
         <input type="hidden" name="SentIP" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" />
         <input type="hidden" name="Sent From" value="New Request a Quote on Websitetalkingheads.com" />
</div>
<div id="c"></div>
<div id="formMessage"></div>
<div id="formSubmit"><input name="submit" type="submit" class="formSubmit" id="submit" onclick="return validate();" value=""></div>

</form>
<br />
