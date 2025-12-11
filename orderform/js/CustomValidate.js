// JavaScript Document

function validateOrder(){
	//Set up reporting variables
	var r = true;
	var message = "";

//validate name
var cn=document.getElementById("name").value; 
if (cn == "" || cn=="null"  || cn =="Name"||  cn.length < 4 ) {
      r=false;
	  message += "Your Name.\n";
   	  document.getElementById("name").style.outline = "solid red";
    } else {
	   document.getElementById("name").style.outline = "none";
   }


//validate email and phone
var validateEmail = false;
var x=document.getElementById("email").value;

var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");

if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
 {
   validateEmail=false;
   document.getElementById("email").style.outline = "solid red";
  }else {
	   document.getElementById("email").style.outline = "none";
	   validateEmail = true;
   }

var validatePhone = false;
var phoneNumber = document.getElementById("phone").value; 
  if (phoneNumber == ""  ||  phoneNumber == "Phone"|| phoneNumber == "123456"  || phoneNumber.length<10 || phoneNumber == null) {
		document.getElementById("phone").style.outline = "solid red";
		document.getElementById("phone").value = "";
     validatePhone = false;
   }else{
		document.getElementById("phone").style.outline = "none";
		var validatePhone = true;
}
//phone and email test
if(validatePhone == false && validateEmail == false){
	message +="A valid email address or phone number.\n";
      r=false;
}

//Script and video Length text
	countit();
	var scriptLength = Number(orderForm.ourWordCount.value);
	if(isNaN(scriptLength) == true){
		message +="Please Enter Script\n";
		r=false;
	}else{
switch (customVideoLength){
	case 30: if (scriptLength>90){
	message +="Your Script is longer than 90 words.\n";
	r=false;
	orderForm.ourWordCount.style.outline = "solid red";
	}
	break;
	case 60: if (scriptLength>180){
	message +="Your Script is longer than 180 words.\n";
	r=false;
	orderForm.ourWordCount.style.outline = "solid red";
	}
	break;
	case 120: if (scriptLength>360){
	message +="Your Script is longer than 360 words.\n";
	r=false;
	orderForm.ourWordCount.style.outline = "solid red";
	}
	break;
	case 360:if (videoLength360 && scriptLength>480){
	message +="Your Script is longer than 540 words.\n";
	r=false;
	orderForm.ourWordCount.style.outline = "solid red";
	}
	break;
	default:
	message +="Please Select Video Length.\n";
	r=false;
	document.getElementById("templateLength").style.outline = "solid red";
	break;
}
	}
//test terms and conditions acceptance
	var termsMet =document.getElementById("termsCheckbox").checked;
	if(termsMet){
				document.getElementById("termsCheckbox").style.outline = "none";
	}else{
				message +="You must accept our terms and conditions.\n";
				r=false;
				document.getElementById("termsCheckbox").style.outline = "solid red";
	}

	
//Final test
	if (r){
		return true;
		}else{
		var messageIntro= "";
		messageIntro+= "We would like to complete your order.\n";
		messageIntro+= "Please provide the following information.\n";
		var fullMessage = messageIntro + message;
		alert(fullMessage);
		return false;
		}
	}
