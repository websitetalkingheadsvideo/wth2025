// JavaScript Document
$(document).ready(function(){
	var title = $(document).find("title").text();
	if(title.indexOf("Whiteboard")>-1){
		$('#whiteboard').addClass("current-page");
	}else if(title.indexOf("Animation")>-1){
		$('#animation').addClass("current-page");	
	}else if(title.indexOf("Contact")>-1){
		$('#nav-contact').addClass("current-page");		
	}
})