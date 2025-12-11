// JavaScript Document
	var Path='
https://www.websitetalkingheads.com/shoulders/images/';
	var newHref="http://www.youtube.com/embed/";
	var newHrefend="?rel=0&autoplay=1";
	function changeVideo(obj){
		index=obj.selectedIndex;
		if (index<0){ return; }
		theTitle = "Virtual Set - " + obj.options[index].text;
		document.getElementById('theVideo').src="http://img.youtube.com/vi/" +obj.options[index].value + "/mqdefault.jpg";
		document.getElementById('theVideo').theTitle;
		document.getElementById('theVideo').alt=theTitle;
		document.getElementById('videoLink').title=theTitle;
		document.getElementById('videoLink').alt=theTitle;
		document.getElementById('videoLink').href=newHref+obj.options[index].value+newHrefend;
		document.getElementById('templateName').value=obj.options[index].text;
}

	function changeLength30(){
			document.getElementById('templateLength').innerHTML="30 second script can have up to 90 words and 4 images.";
			document.getElementById('scriptFull').style.height = "0px";
	}
	function changeLength60(){
			document.getElementById('templateLength').innerHTML="60 second script can have up to 180 words and 8 images.";
			document.getElementById('scriptFull').style.height = "720px";
	}

function countit(){
		var videoLength30 = document.getElementById("videoLength30").checked;
		var videoLength60 = document.getElementById("videoLength60").checked;
				var formcontent = "";
				if(document.getElementById('script1').value!="")formcontent=document.getElementById('script1').value;
				if(document.getElementById('script2').value!="")formcontent += " " + document.getElementById('script2').value;
				if(document.getElementById('script3').value!="")formcontent += " " + document.getElementById('script3').value;
					if(document.getElementById('script4').value!="")formcontent += " " + document.getElementById('script4').value;
				if(videoLength60){
					if(document.getElementById('script5').value!="")formcontent += " " + document.getElementById('script5').value;
					if(document.getElementById('script6').value!="")formcontent += " " + document.getElementById('script6').value;
					if(document.getElementById('script7').value!="")formcontent += " " + document.getElementById('script7').value;
					if(document.getElementById('script8').value!="")formcontent += " " + document.getElementById('script8').value;
				}
				var fC=formcontent.replace("  "," ");
				var fc=fC.replace("  "," ");
				var formcontentcount=fc.split(" ");
				var wordcount=formcontentcount.length;
				var n=fc.charAt(fc.length-1);
				if (n==" ") wordcount = wordcount-1;
				if(document.getElementById('script1').value=="")	{	
					orderForm.ourWordCount.value="Please Start with Part 1";
					orderForm.ourWordCount.style.outline = "solid red";
				}else{
					orderForm.ourWordCount.value=wordcount;
					orderForm.ourWordCount.style.outline = "none";
				}
				var scriptLength = orderForm.ourWordCount.value;
				if (videoLength30 && scriptLength>90){
					orderForm.ourWordCount.style.outline = "solid red";
				}else{
				orderForm.ourWordCount.style.outline = "none";
				}
						
				if (videoLength60 && scriptLength>180){
					orderForm.ourWordCount.style.outline = "solid red";
				}else{
				orderForm.ourWordCount.style.outline = "none";
				}
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
document.getElementById('script1').value = atpos +"- " + dotpos;

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

if(videoLength30 || videoLength60){
	test= "yes";
	}else{
		message +="Please Choose Video Length\n";
		r=false;
	}

//Script and video Length text
	countit();
	var scriptLength = orderForm.ourWordCount.value;
	if (videoLength30 && scriptLength>90){
				message +="Your Script is longer than 90 words.\n";
				r=false;
				orderForm.ourWordCount.style.outline = "solid red";
				}
			
	if (videoLength60 && scriptLength>180){
				message +="Your Script is longer than 180 words.\n";
				r=false;
				orderForm.ourWordCount.style.outline = "solid red";
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
if (r==false){
	var messageIntro= "";
	messageIntro+= "We would like to complete your order.\n";
	messageIntro+= "Please provide the following information.\n";
	var fullMessage = messageIntro + message;
	alert(fullMessage);
	return false;
	}else{
	return true;
	}
}