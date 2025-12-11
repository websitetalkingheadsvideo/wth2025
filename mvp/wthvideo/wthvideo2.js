// Copyright 2010 Website Talking Heads 
// JavaScript Document
if (typeof wthvideo == 'undefined') {
	wthvideo = new Object();
}
wthvideo.params = {
	width:256,
	height:384,
	position:"absolute",
	doctype:"strict",
	left:"50%",
	right:"auto",
	top:"260px",
	bottom:"auto",
	centeroffset:"100px",
	color:0xCCCCCC,
	volume:70,
	autostart:"yes",
	fadein:0,
	fadeout:2,
	flip:"no",
	delay:0,
	delayclose:0,
	buffertime:3,
	controlbar:"mouse",
	exitbtn:"yes",
	playbtn:"PlayVideo.png",
	playposition:"center",
	playtop:"center",
	exitoncomplete:"yes",
	oncepersession:"no",
	vidlink:"no",
	openin:"_blank",
	path:"wthvideo",
	actorpic:"leannafull1.png",
	flv:"leannafull5.flv",
};

var caution = false
function setCookie(name, value, expires, path, domain, secure) {
      var curCookie = name + "=" + escape(value) +
         ((expires) ? "; expires=" + expires.toGMTString() : "") +
         ((path) ? "; path=" + path : "") +
         ((domain) ? "; domain=" + domain : "") +
         ((secure) ? "; secure" : "")
      if (!caution || (name + "=" + escape(value)).length <= 4000)
         document.cookie = curCookie
      else
         if (confirm("Cookie exceeds 4KB and will be cut!"))
            document.cookie = curCookie
   }
function getCookie(name) {
      var prefix = name + "="
      var cookieStartIndex = document.cookie.indexOf(prefix)
      if (cookieStartIndex == -1)
         return null
      var cookieEndIndex = document.cookie.indexOf(";", cookieStartIndex +
         prefix.length)
      if (cookieEndIndex == -1)
         cookieEndIndex = document.cookie.length
      return unescape(document.cookie.substring(cookieStartIndex +
         prefix.length,
   cookieEndIndex))
   }

function deleteCookie(name, path, domain) {
      if (getCookie(name)) {
         document.cookie = name + "=" +
         ((path) ? "; path=" + path : "") +
         ((domain) ? "; domain=" + domain : "") +
         "; expires=Thu, 01-Jan-70 00:00:01 GMT"
      }
   }

function fixDate(date) {
      var base = new Date(0)
      var skew = base.getTime()
      if (skew > 0)
         date.setTime(date.getTime() - skew)
   }

var now = new Date()
fixDate(now)
now.setTime(now.getTime() + 365 * 24 * 60 * 60 * 1000)
var visits = getCookie("counter")
   if (!visits)
      visits = 1
   else
      visits = parseInt(visits) + 1
   setCookie("counter", visits, now)
   switch(visits)
 {
case 1:
  wthvideo.params.flv = "leannafull1.flv";
   break;
case 2:
  wthvideo.params.flv = "leannafull2.flv";
   break;
case 3:
 wthvideo.params.flv = "leannafull3.flv";
 break;
case 4:
 wthvideo.params.flv = "leannafull4.flv";
 break;
default:
    wthvideo.params.flv = "leannafull5.flv";
	break;
 }
 alert(wthvideo.params.flv);
var topPx = parseFloat(wthvideo.params.top);
var bottomPx = parseFloat(wthvideo.params.bottom);

wthvideo.hideDiv = function(){
	document.getElementById('wthvideo').style.visibility = 'hidden';	
}
function onlyOnce() {
if (document.cookie.indexOf("hasSeen=true") == -1) {
var later = new Date();
later.setFullYear(later.getFullYear()+10);
document.cookie = 'hasSeen=true;path=/;';
wthvideo.drawVideo();
}
}

function onlyOnce2() {
if (document.cookie.indexOf("hasSeen=true") == -1) {
var later = new Date();
later.setFullYear(later.getFullYear()+10);
document.cookie = 'hasSeen=true;expires='+later.toGMTString();
wthvideo.drawVideo();
}
}

wthvideo.drawVideo= function(){
	var markUp = '';
	markUp += '<style type="text/css">';
	markUp += '#wthvideo {position:'+wthvideo.params.position+';width:'+wthvideo.params.width+'px;height:'+wthvideo.params.height+'px;margin-left:'+wthvideo.params.centeroffset+';left:'+wthvideo.params.left+';right:'+wthvideo.params.right+';top:'+wthvideo.params.top+';bottom:'+wthvideo.params.bottom+';z-index:99999;}';
	markUp += '</style>';
	markUp += '<div id="wthvideo">';
	markUp += '  <object id="objvideo" style="outline:none;" type="application/x-shockwave-flash" width="'+wthvideo.params.width+'" height="'+wthvideo.params.height+'" data="../../mvp3/wthvideo/'+wthvideo.params.path+'/wthplayer.swf">';
	markUp += '    <param name="movie" value="../../mvp3/wthvideo/'+wthvideo.params.path+'/wthplayer.swf" />';
	markUp += '    <param name="quality" value="high" />';
	markUp += '    <param name="flashvars" value="vurl='+wthvideo.params.flv+'&amp;vwidth='+wthvideo.params.width+'&amp;vheight='+wthvideo.params.height+'&amp;actorpic='+wthvideo.params.path+'/'+wthvideo.params.actorpic+'&amp;autostart='+wthvideo.params.autostart+'&amp;exitoncomplete='+wthvideo.params.exitoncomplete+'&amp;vbuff='+wthvideo.params.buffertime+'&amp;vdelay='+wthvideo.params.delay+'&amp;vcolor='+wthvideo.params.color+'&amp;vlink='+wthvideo.params.vidlink+'&amp;openin='+wthvideo.params.openin+'&amp;delayclose='+wthvideo.params.delayclose+'&amp;fadein='+wthvideo.params.fadein+'&amp;fadeout='+wthvideo.params.fadeout+'&amp;vvol='+wthvideo.params.volume+'&amp;playbtn='+wthvideo.params.path+'/'+wthvideo.params.playbtn+'&amp;playpos='+wthvideo.params.playposition+'&amp;playtop='+wthvideo.params.playtop+'&amp;hflip='+wthvideo.params.flip+'&amp;controlbar='+wthvideo.params.controlbar+'&amp;exitbtn='+wthvideo.params.exitbtn+'" />';
	markUp += '    <param name="wmode" value="transparent" />';
	markUp += '    <param name="allowscriptaccess" value="always" />';
	markUp += '    <param name="swfversion" value="9.0.45.0" />';
	markUp += '  </object>';
	markUp += '</div>';
	if (wthvideo.params.position == "fixed") {
		if (wthvideo.params.doctype == "quirks") {
			if (wthvideo.params.top == "auto") {
						markUp += '<!--[if IE]>';
						markUp += '<style type="text/css">';
						markUp += '#wthvideo {position:absolute; top: expression(offsetParent.scrollTop - 1 + (offsetParent.clientHeight-this.clientHeight) + '+bottomPx+' + "px")}';
						markUp += '</style>';
						markUp += '<![endif]-->';}
					else {
							markUp += '<!--[if IE]>';
							markUp += '<style type="text/css">';
							markUp += '#wthvideo {position: absolute !important;top: expression(((document.documentElement.scrollTop || document.body.scrollTop) + (!this.offsetHeight && 0)) + '+topPx+' + "px")';
							markUp += '</style>';
							markUp += '<![endif]-->';}
					}
				else {
						markUp += '<!--[if lte IE 6]>';
						markUp += '<style type="text/css">';
						markUp += 'html, body{height: 100%;overflow: auto;}#wthvideo {position: absolute;}';
						markUp += '</style>';
						markUp += '<![endif]-->';
			}
		}		
	document.write(markUp);
}
function hideDiv() {
	wthvideo.hideDiv();
}

if (wthvideo.params.autostart=="oncethenpic") {
	if (document.cookie.indexOf("hasSeen=true") == -1) {
		var later = new Date();
		later.setFullYear(later.getFullYear()+10);
		document.cookie = 'hasSeen=true;path=/;';
		wthvideo.params.autostart = "yes";
		}
	else {
		wthvideo.params.autostart = "no";

	}
}

if (wthvideo.params.autostart=="oncethenmute") {
	if (document.cookie.indexOf("hasSeen=true") == -1) {
		var later = new Date();
		later.setFullYear(later.getFullYear()+10);
		document.cookie = 'hasSeen=true;path=/;';
		wthvideo.params.autostart = "yes";
		}
	else {
		wthvideo.params.autostart = "mute";
	}
}

if (wthvideo.params.oncepersession == "yes") {
	onlyOnce();}
	else {
		if (wthvideo.params.oncepersession == "onceonly") {
			onlyOnce2();}
		else {
		wthvideo.drawVideo();
	}

function thisMovie(movieName) {
         if (navigator.appName.indexOf("Microsoft") != -1) {
             return window[movieName];
         } else {
             return document[movieName];
         }
     }
	}
function exitWTH() {
	thisMovie('objvideo').exitVideoWTH();
}
function pauseWTH() {
	thisMovie('objvideo').pauseVideoWTH();
}

function unpauseWTH() {
	thisMovie('objvideo').unpauseVideoWTH();
}
function playWTH() {
	thisMovie('objvideo').playVideoWTH();
}
function stopWTH() {
	thisMovie('objvideo').stopVideoWTH();
}
function muteWTH() {
	thisMovie('objvideo').muteVolWTH();
}
function unmuteWTH() {
	thisMovie('objvideo').startVolWTH();
}
