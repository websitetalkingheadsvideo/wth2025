// JavaScript Document

function countit(){
				var formcontent = document.getElementById('script').value;
				var fc=formcontent.replace("  "," ");
				var formcontentcount = fc.split(" ");
				var wordcount = formcontentcount.length;
				var n=fc.charAt(fc.length-1);
				if (n==" ") wordcount = wordcount-1;				
				document.getElementById('ourWordCount').value=wordcount;
				}
function validate()
{
var r = true;
var message = "";
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


	countit();
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
if (r==false){
	var messageIntro= "";
	messageIntro+= "We would like to complete your order.\n";
	messageIntro+= "Please provide the following information.\n";
	var fullMessage = messageIntro + message;
	alert(fullMessage);
	return false;
	}else{
	return true;
	alert("passed!");
	}
}