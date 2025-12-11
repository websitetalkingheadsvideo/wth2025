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
		document.getElementById('theVideo').title=theTitle;
		document.getElementById('theVideo').alt=obj.theTitle;
		document.getElementById('videoLink').title=obj.theTitle;
		document.getElementById('videoLink').alt=obj.theTitle;
		document.getElementById('videoLink').href=newHref+obj.options[index].value+newHrefend;
		document.getElementById('templateName').value=obj.options[index].text;
}