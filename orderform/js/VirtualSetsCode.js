// JavaScript Document
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