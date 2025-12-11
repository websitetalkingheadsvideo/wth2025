// JavaScript Document
var customVideoLength = 0;
function changeLength30(){
			document.getElementById('templateLength').innerHTML="Basic Package has up to 90 words.";
			document.getElementById('script1').style.height = "140px";
			customVideoLength =30;
	}
function changeLength60(){
			document.getElementById('templateLength').innerHTML="Business Package has up to 180 words.";
			document.getElementById('script1').style.height = "280px";
				customVideoLength =60;
	}
function changeLength120(){
			document.getElementById('templateLength').innerHTML="Executive Package has up to 360 words.";
			document.getElementById('script1').style.height = "420px";
			customVideoLength =120;
	}
function changeLength360(){
			document.getElementById('templateLength').innerHTML="Corporate Package has up to 480 words.";
			document.getElementById('script1').style.height = "560px";
			customVideoLength =360;
	}

function countit(){
				orderForm.ourWordCount.style.outline = "none";
				var formcontent = "";
				if(document.getElementById('script1').value!="")formcontent=document.getElementById('script1').value;
				var fC=formcontent.replace("  "," ");
				var fc=fC.replace("  "," ");
				var formcontentcount=fc.split(" ");
				var wordcount=formcontentcount.length;
				var n=fc.charAt(fc.length-1);
				if (n==" ") wordcount = wordcount-1;
				if(document.getElementById('script1').value=="")	{	
					orderForm.ourWordCount.value="Enter Your Script";
					orderForm.ourWordCount.style.outline = "solid red";
				}else{
					orderForm.ourWordCount.value=wordcount;
					orderForm.ourWordCount.style.outline = "none";
				}
				var scriptLength = orderForm.ourWordCount.value;
				
				switch (customVideoLength){
					case 30: if (scriptLength>90)orderForm.ourWordCount.style.outline = "solid red";
						break;
					case 60: if (scriptLength>180)orderForm.ourWordCount.style.outline = "solid red";
						break;
					case 120: if (scriptLength>360)orderForm.ourWordCount.style.outline = "solid red";
						break;
					case 240: if (scriptLength>540)orderForm.ourWordCount.style.outline = "solid red";
						break;
				}
}