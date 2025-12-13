// JavaScript Document


function validate(){
	var fieldFinder = document.contact.message.value.search("http");
 	var urlFinder = document.contact.message.value.search("url=");
	 if(fieldFinder > -1 || urlFinder > -1){
		document.contact.message.focus();
		alert( "Please do not enter url= or http in message field." );
		return false ;
	}
	var realName = document.contact.name.value;
	var culledName = realName.replace(/[^a-zA-Z ]/g, "");
	
 if (document.contact.name.value == "" || document.contact.name.value == "Name" || realName !== culledName) {
    alert( "Please enter your Name." );
  document.contact.name.focus();
    return false ;
  }
  
  if(document.contact.email.value.search("@sima.com")>0){
    alert( "Please enter a valid Email Id." );
   document.contact.email.focus();
    return false ;
  }
  if (document.contact.email.value == "" || document.contact.email.value == "Email") {
    alert( "Please enter your Email Id." );
   document.contact.email.focus();
    return false ;
  }
  else if(!checkMail(document.contact.email.value))
 {
  alert("Please Enter Valid Email-id.\n");
  document.contact.email.focus();
  return false;
 }
 
  if (document.contact.phone.value == "" || document.contact.phone.value == "Phone" || document.contact.phone.value == "123456") {
    alert( "Please enter your phone." );
   document.contact.phone.focus();
    return false ;
   }
    else if (IsNumeric(document.contact.phone.value) == false) 
      {
      alert("Invaild phone number entered");
   document.contact.phone.focus();
    return false ;
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