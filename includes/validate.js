// JavaScript Document



function validate(){
var r = true;
var message = "";

//validate Name
	var realName = document.quoteForm.Name.value;
	var culledName = realName.replace(/[^a-zA-Z ]/g, "");
 if (document.quoteForm.Name.value == "" || document.quoteForm.Name.value == "Name" || realName !== culledName) {
  	document.quoteForm.Name.style.outline = "solid red";
      r=false;
	  message += "Please enter your name\n";
  }else{
  	document.quoteForm.Name.style.outline = "none";
  }


//validate email and phone
var validateEmail = true;
//validate email
if (document.quoteForm.email.value == "" || document.quoteForm.email.value == "Email") {
  	document.quoteForm.email.style.outline = "solid red";
      validateEmail=false;
  	}else{
  	if(!checkMail(document.quoteForm.email.value))
		 {
			 validateEmail = false;
		  document.quoteForm.email.style.outline = "solid red";
		 }
		 }
 

 //verify phone
var validatePhone = true;
 var phoneNumber = document.quoteForm.Phone.value;
  if (phoneNumber == "" || phoneNumber == "Phone" || phoneNumber == "123456"  || phoneNumber.length<10) {
  document.quoteForm.Phone.style.outline = "solid red";
     validatePhone=false;
   }else{
	  if (IsNumeric(document.quoteForm.Phone.value) == false)
		  {
		validatePhone=false;
		}else{
			document.quoteForm.Phone.style.outline = "none";
		  }
   }

if(validatePhone == false && validateEmail == false){
	message +="We would like to be able to contact you.  Please enter a valid email address or phone number";
      r=false;
}
  

 
 //return validation
  if (r==false){
	alert(message);
	return false;
	}else{
		document.getElementById('formMessage').innerHTML = "Thank You for Submitting Form";
	return true;
	}
}

function IsNumeric(strString)
   //  check for valid numeric strings 
   {
   var strValidChars = "0123456789.-";
   var strChar;
   var blnResult = true;

   if (strString.length == 0) return false;

   //  test strString consists of valid characters listed above
   for (i = 0; i < strString.length && blnResult == true; i++)
      {
      strChar = strString.charAt(i);
      if (strValidChars.indexOf(strChar) == -1)
         {
         blnResult = false;
         }
      }
   return blnResult;
   }

function checkMail(email)
{
 var x = email;
 var filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
 if (filter.test(x)) 
 {
  return true;
 }
 else 
 {
   return false;
 }
}


