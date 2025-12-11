// JavaScript Document

			
			function countit(){
				var formcontent=orderForm.script1.value;
				formcontent =+ " " +orderForm.script2.value;
				formcontent =+ " " +orderForm.script3.value;
				formcontent =+ " " +orderForm.script4.value;
				formcontent =+ " " +orderForm.script5.value;
				formcontent =+ " " +orderForm.script6.value;
				var fc=formcontent.replace("  "," ");
				var formcontentcount=fc.split(" ");
				var wordcount=formcontentcount.length;
				var n=fc.charAt(fc.length-1);
				if (n==" ") wordcount = wordcount-1;				
				orderForm.ourWordCount.value=wordcount;
				}
