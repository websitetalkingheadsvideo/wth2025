// JavaScript Document
if (typeof wthvideo == 'undefined') {
	wthvideo = new Object();
}
wthvideo.params = {
	width:192,
	height:272,	
	left:"0px",
	right:"auto",
	top:"auto",
	bottom:"0px",
	swf:"templeteamxsi2228"};
wthvideo.hideDiv = function(){
	document.getElementById('wthvideo').style.visibility = 'hidden';
	document.getElementById('objvideo').style.visibility = 'hidden';
}

function onlyOnce() {
if (document.cookie.indexOf("hasSeen=true") == -1) {
var later = new Date();
later.setFullYear(later.getFullYear()+10);
document.cookie = 'hasSeen=true;path=/;';
wthvideo.drawVideo();
}
}
wthvideo.drawVideo= function(){
	var markUp = '';
	markUp += '<style type="text/css">';
	markUp += '#wthvideo {position:fixed;width:'+wthvideo.params.width+'px;height:'+wthvideo.params.height+'px;left:'+wthvideo.params.left+';right:'+wthvideo.params.right+';top:'+wthvideo.params.top+';bottom:'+wthvideo.params.bottom+';z-index:1;}';
	markUp += '</style>';
	markUp += '<!--[if lte IE 6]>';
	markUp += '<style type="text/css">';
	markUp += 'html, body{height: 100%;overflow: auto;}#wthvideo {position: absolute;}';
	markUp += '</style>';
	markUp += '<![endif]-->';
	markUp += '<div id="wthvideo">';
	markUp += '  <object id="objvideo" style="outline:none;" type="application/x-shockwave-flash" width="'+wthvideo.params.width+'" height="'+wthvideo.params.height+'" data="features/'+wthvideo.params.swf+'.swf">';
	markUp += '    <param name="movie" value="features/'+wthvideo.params.swf+'.swf" />';
	markUp += '    <param name="quality" value="high" />';
	markUp += '    <param name="wmode" value="transparent" />';
	markUp += '    <param name="swfversion" value="9.0.45.0" />';
	markUp += '  </object>';
	markUp += '</div>';
	document.write(markUp);
}
function hideDiv() {
	wthvideo.hideDiv();
}
//onlyOnce();
wthvideo.drawVideo();