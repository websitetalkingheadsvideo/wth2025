// JavaScript Document

function validate()
{
var r = true;
var message = "";
var cn=document.contactform.name.value; 
if (cn == "" || cn=="null"  || cn =="Name"||  cn.length < 4 ) {
      r=false;
	  message += "Please enter your name\n";
   	  document.contactform.name.style.outline = "solid red";
    } else {
	   document.contactform.name.style.outline = "none";
   }


//validate email and phone
var validateEmail = true;
var x=document.contactform.email.value;

var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");

if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
 {
   validateEmail=false;
   document.contactform.email.style.outline = "solid red";
  }else {
	   document.contactform.email.style.outline = "none";
   }

var validatePhone = true;
var phoneNumber = document.contactform.phone.value; 
  if (phoneNumber == ""  ||  phoneNumber == "Phone"|| phoneNumber == "123456"  || phoneNumber.length<10) {
		document.contactform.phone.style.outline = "solid red";
     validatePhone = false;
   }else{
		document.contactform.phone.style.outline = "none";
}

//phone and email test
if(validatePhone == false && validateEmail == false){
	message +="We would like to be able to contact you.  Please enter a valid email address or phone number\n";
      r=false;
}
   
//Final test
if (r==false){
	alert(message);
	return false;
	}else{
		document.getElementById('formMessage').innerHTML = "Thank You for Submitting Form";
	return true;
	}
}



 