// JavaScript Document
function changeLength30(){
			document.getElementById('templateLength').innerHTML="30 second script can have up to 90 words and has 4 images and 2 text fields.";
			document.getElementById('scriptFull').style.height = "320px";
			customVideoLength =30;
	}
function changeLength15(){
			document.getElementById('templateLength').innerHTML="15 second script is up to 45 words and has 2 images and 1 text field.";
			document.getElementById('scriptFull').style.height = "0px";
			customVideoLength =15;
	}

function countit(){
		var videoLength30 = document.getElementById("videoLength30").checked;
		var videoLength15 = document.getElementById("videoLength15").checked;
				var formcontent = "";
				if(document.getElementById('script1').value!="")formcontent=document.getElementById('script1').value;
				if(videoLength30){
					if(document.getElementById('script2').value!="")formcontent += " " + document.getElementById('script2').value;
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
		switch (customVideoLength){
			case 15: if (scriptLength>45){
			message +="Your Script is longer than 45 words.\n";
			r=false;
			orderForm.ourWordCount.style.outline = "solid red";
			}
			break;
			case 30: if (scriptLength>90){
			message +="Your Script is longer than 90 words.\n";
			r=false;
			orderForm.ourWordCount.style.outline = "solid red";
			}
			break;
		}
}