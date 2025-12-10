<script type="text/javascript">
if (document.images) {
    img1 = new Image();
    img1.src = "
https://websitetalkingheads.com/images/submit_hover.png";
}
</script>
<script type="text/javascript">
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
</script>



<form action="../cgi-sys/formmail.pl" method="POST" enctype="multipart/form-data" name="form4" target="_self" class="form4">
<input name="subject" type="hidden" value="Quote Request">
<input name="recipient" type="hidden" id="recipient" value="sales@websitetalkingheads.com">
<input name="redirect" type="hidden" id="redirect" target="self" value="https://www.websitetalkingheads.com/quoteform/ThankYou.php">
<div id ="formtoptext2">Request a Quote</div><br />


  <span class="formLabel2">Name</span>
          <input name="Name" type="text" class="formInput" id="Name" placeholder="Your name here" size="35"><br />
          <span class="formLabe2l">Company</span>
         <input name="Company" type="text" class="formInput" id="Company" size="35" placeholder="Your company here"> <br />
         <span class="formLabe2l">Email</span>
    <input name="mailfrom" type="email" class="formInput" id="email" placeholder="Your email here" size="35"><br />
  <span class="formLabe2l">Phone</span>
    <input name="Phone" type="tel" id="Phone" class="formInput" placeholder="XXX-XXX-XXXX" size=35> 
<br />
  <span class="formLabel2">Message</span>
    <textarea name="Comments" rows="3" class="formTextField2"></textarea>
         <input type="hidden" name="Sent From" value="Request a Quote on Websitetalkingheads.com" />

<div id="c"></div><br />
<div id="formSubmit"><input name="submit" type="submit" class="formSubmit" id="submit" value=""></div>

</form>

