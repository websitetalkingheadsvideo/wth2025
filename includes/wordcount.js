// JavaScript Document

			
			function countit(){
				var formcontent=orderForm.otherTextArea.value
				var fc=formcontent.replace("  "," ");
				var formcontentcount=fc.split(" ");
				var wordcount=formcontentcount.length;
				var n=fc.charAt(fc.length-1);
				if (n==" ") wordcount = wordcount-1;				
				orderForm.ourWordCount.value=wordcount;
				}
