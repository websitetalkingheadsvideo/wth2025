// JavaScript Document
function setWidth(){
var w= (document.body.width/2)-500;
	document.getElementById("centerThis").style.marginLeft = w+"px";
	
}
function overCall(){
	document.getElementById("callQuote").innerHTML = '<a href="tel:801-748-2281" title="Give us a call.">801-748-2281</a>';
	
}
function outCall(){
	document.getElementById("callQuote").innerHTML = '<a href="tel:801-748-2281" title="Give us a call.">Call for a Quote</a>';
}

