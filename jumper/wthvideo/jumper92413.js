// Copyright 2010 Website Talking Heads 
// JavaScript Document
if (typeof wthvideo == 'undefined') {
	wthvideo = new Object();
}
wthvideo.params = {
	width:160,
	height:256,
	position:"absolute",
	doctype:"strict",
	left:"50%",
	right:"auto",
	top:"400px",
	bottom:"auto",
	centeroffset:"-80px",
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
	exitbtn:"no",
	playbtn:"PlayVideo.png",
	playposition:"center",
	playtop:"center",
	exitoncomplete:"yes",
	oncepersession:"no",
	vidlink:"no",
	openin:"_blank",
	path:"wthvideo",
	actorpic:"jenguardtraining3974.png",
	flv:"jedjumper.flv"
};

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

wthvideo.drawVideo= function(){
	var markUp = '';
	markUp += '<style type="text/css">';
	markUp += '#wthvideo {position:'+wthvideo.params.position+';width:'+wthvideo.params.width+'px;height:'+wthvideo.params.height+'px;margin-left:'+wthvideo.params.centeroffset+';left:'+wthvideo.params.left+';right:'+wthvideo.params.right+';top:'+wthvideo.params.top+';bottom:'+wthvideo.params.bottom+';z-index:99999;}';
	markUp += '</style>';
	markUp += '<div id="wthvideo">';
	markUp += '  <object id="objvideo" style="outline:none;" type="application/x-shockwave-flash" width="'+wthvideo.params.width+'" height="'+wthvideo.params.height+'" data="'+wthvideo.params.path+'/wthplayer.swf">';
	markUp += '    <param name="movie" value="'+wthvideo.params.path+'/wthplayer.swf" />';
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
		wthvideo.drawVideo();
	}

function thisMovie(movieName) {
         if (navigator.appName.indexOf("Microsoft") != -1) {
             return window[movieName];
         } else {
             return document[movieName];
         }
     }

function exitWTH() {
	thisMovie('objvideo').exitVideoWTH();
}
function pauseWTH() {
	thisMovie('objvideo').pauseVideoWTH();
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

function cue1() {
	document.getElementById('wthvideo').style.top="210px";
	document.getElementById('wthvideo').style.marginLeft="-490px";

}

function cue2() {
	document.getElementById('wthvideo').style.top="210px";
	document.getElementById('wthvideo').style.marginLeft="-220px";
}
function cue3() {
	document.getElementById('wthvideo').style.top="210px";
	document.getElementById('wthvideo').style.marginLeft="297px";
}
function cue4() {
	document.getElementById('wthvideo').style.top="380px";
	document.getElementById('wthvideo').style.marginLeft="175px";
}

function cue5() {
	document.getElementById('wthvideo').style.top="38px";
	document.getElementById('wthvideo').style.marginLeft="-390px";
}

function cue6() {
	document.getElementById('wthvideo').style.top="20px";
	document.getElementById('wthvideo').style.marginLeft="80px";
}

function cue7() {
	document.getElementById('wthvideo').style.top="380px";
	document.getElementById('wthvideo').style.marginLeft="175px";
}