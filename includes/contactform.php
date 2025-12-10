<script type="text/javascript" src="https://www.websitetalkingheads.com/includes/validate-highlight.js"></script>

<script type="text/javascript">
if (document.images) {
    img1 = new Image();
    img1.src = "
https://websitetalkingheads.com/images/submit_hover.png";
}
</script>
<div id ="formtoptext">Contact Us</div>
<form name="contactform" id="contactForm" action="https://www.websitetalkingheads.com/includes/contactSendMail.php" method="post" class="form2" >
<div id="formLeft">
       <span class="formLabel">Name</span>
       <input type="text" onblur="if(this.value=='') {this.value='Name';}" onfocus="if(this.value=='Name') {this.value='';}"  name="name" value="Name" size="35"><br />
          <span class="formLabel">Company</span>
      <input type="text"  onblur="if(this.value=='') {this.value='Company';}" onfocus="if(this.value=='Company') {this.value='';}" name="company" value="Company" size="35"><br />
         <span class="formLabel">Email</span>
      <input type="text" onblur="if(this.value=='') {this.value='Email';}" onfocus="if(this.value=='Email') {this.value='';}" name="email" value="Email" size="35"><br />
    <span class="formLabel">Phone</span>
      <input type="text"  onblur="if(this.value=='') {this.value='Phone';}" onfocus="if(this.value=='Phone') {this.value='';}" name="phone" value="Phone" size="35">
      </div>
      <div id="formRight">
         <span class="formLabel">Message</span><br />
     <textarea onblur="if(this.value=='') {this.value='Message';}" onfocus="if(this.value=='Message') {this.value='';}" name="theMessage" cols="46" rows="4">Message</textarea>
     </div>
<div class="c"></div>
<input type="hidden" name="sentIP" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" />
<div id="formMessage"></div>
    <div id="formSubmit"><input name="submit" type="submit" class="formSubmit" id="submit" onclick="return validate();" value=""></div>
    
</form>   





