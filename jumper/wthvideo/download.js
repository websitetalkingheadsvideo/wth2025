// Copyright 2013 Website Talking Heads
// JavaScript Document

// Variables for Player
	var width="160";
	var height="256";
	var position="absolute";
	var doctype="strict";
	var left="50%";
	var right="auto";
	var vTop="400";
	var bottom="auto";
	var centeroffset="-80";
	var color="0xCCCCCC";
	var volume=70;
	var autostart="yes";
	var fadein=0;
	var fadeout=2;
	var flip="no";
	var delay=0;
	var delayclose=0;
	var buffertime=3;
	var controlbar="mouse";
	var exitbtn="no";
	var playbtn="PlayVideo.png";
	var playposition="center";
	var playtop="bottom";
	var exitoncomplete="yes";
	var oncepersession="no";
	var vidlink="no";
	var openin="_blank";
	var path="http://websitetalkingheads.com/wthvideo";
	var actorpic="jedjumper";
	var flv="jedjumper 1";
	var h264="jedjumper";
// end Vars	

// convert vars to something useful
	actorpic+=".png";
	var topPx = parseFloat(vTop);
	var bottomPx = parseFloat(bottom);
	var btnTop = (height)-(122);
	var btnLeft = (width/2)-(51);
	var playerPath = path+"/wthplayer.swf";
	var hVideo = path+"/"+h264+".mp4";
	var hBtn = path+"/"+playbtn;
	var bImage = path+"/"+actorpic;
	var playbtnPath =	path+"/"+playbtn;
	var exitButton=path+"/"+"exitBtn.png";
	btnTop+="px";
	btnLeft+="px";
	flv+= ".flv"
	h264+=".mp4";

	var leftEnd = left.charAt(left.length -1);
	switch (leftEnd)
	 {
	case "%":
		break;
	case "o":
		break;
	default:
		left +="px";
	}
	if (vTop != "auto"){
		vTop+="px";}
	if (right != "auto"){
		right+="px";}
	if (bottom != "auto"){
		bottom+="px";}
	if (vTop != "auto"){
		centeroffset+="px";}
		
// start creating divs
		
function createDiv() {
	var my_div = null;
	var newDiv = null;
	var newDiv = document.createElement('div');
	newDiv.id = "wthvideo"; 
	newDiv.style.position = position;
	newDiv.style.width = width;
	newDiv.style.height = height;
	newDiv.style.left = left;
	newDiv.style.right = right;
	newDiv.style.top = vTop;
	newDiv.style.bottom = bottom;
	newDiv.style.marginLeft = centeroffset;
	newDiv.style.cursor = "pointer";
	newDiv.style.zindex = 99999;
	
	
	//create flashvars value
		var newFlashVars ="";
		newFlashVars += "vurl=" +flv;
		newFlashVars += "&amp;vwidth=" +width;
		newFlashVars += "&amp;vheight=" +height;
		newFlashVars += "&amp;actorpic=" +bImage;
		newFlashVars += "&amp;autostart=" +autostart;
		newFlashVars += "&amp;exitoncomplete=" +exitoncomplete;
		newFlashVars += "&amp;vbuff=" +buffertime;
		newFlashVars += "&amp;vdelay=" +delay;
		newFlashVars += "&amp;vcolor=" +color;
		newFlashVars += "&amp;vlink=" +vidlink;
		newFlashVars += "&amp;openin=_blank";
		newFlashVars += "&amp;fadein=" +fadein;
		newFlashVars += "&amp;fadeout=" +fadeout;
		newFlashVars += "&amp;vvol=" +volume;
		newFlashVars += "&amp;playbtn=" +hBtn;
		newFlashVars += "&amp;playpos=" +playposition;
		newFlashVars += "&amp;playtop=" +playtop;
		newFlashVars += "&amp;hflip=" +flip;
		newFlashVars += "&amp;controlbar=" +controlbar;
		newFlashVars += "&amp;exitbtn="+exitbtn;
		
		///add swf object
		var markUp = "";
		markUp += '  <object id="objvideo" style="outline:none;" type="application/x-shockwave-flash" width="'+width+'" height="'+height+'" data="'+playerPath+'">';
		markUp += '    <param name="movie" value="'+playerPath+'" />';
		markUp += '    <param name="quality" value="high" />';
		markUp +=  ' 	<param name="flashvars" value="'+newFlashVars+'"/>';
		markUp += '    <param name="wmode" value="transparent" />';
		markUp += '    <param name="allowscriptaccess" value="always" />';
		markUp += '    <param name="swfversion" value="9.0.45.0" />';
		markUp += '  </object>';
	newDiv.innerHTML = markUp;
	my_div = document.getElementById("org_div1");
	document.body.insertBefore(newDiv, my_div);

		
		//add html5 fallback
		var newP = document.createElement("div");
		newP.id = "h264Fallback";
		newP.style.backgroundImage = "url("+bImage+")";
		newP.style.width = width+'px';
		newP.style.height = height+'px';
		var dv = document.getElementById('objvideo');
		var h264Fallback = newP;
		dv.appendChild(h264Fallback);
		
		//add exit button
		var exitBtn = document.createElement('IMG');
		exitBtn.src = exitButton;
		exitBtn.id = "h264exitBtn";
		exitBtn.style.opacity = 1;
		exitBtn.style.width = "25px";;
		exitBtn.style.height = "25px";;
		exitBtn.style.paddingTop = "0px";
		exitBtn.style.paddingLeft = width-26+"px";
		exitBtn.style.border = "none";
		exitBtn.style.alt = "Click to Exit";
		exitBtn.onclick = hideDiv;
		var addHref = document.getElementById('h264Fallback');
		var exitLink = exitBtn;
		addHref.appendChild(exitLink);
		
		//add play button link
		var a=document.createElement('a');
		a.href=hVideo;
		a.id = "hVideoLink";
		var addHref = document.getElementById('h264Fallback');
		var hVideoLink = a;
		addHref.appendChild(hVideoLink);	
		
		//add play button image
		var playBtn = document.createElement('IMG');
		playBtn.src = hBtn;
		playBtn.id = "h264playBtn";
		playBtn.style.opacity = 1;
		playBtn.style.width = 103 + "px";;
		playBtn.style.height = 122 + "px";;
		playBtn.style.paddingTop = btnTop;
		playBtn.style.paddingLeft = btnLeft;
		playBtn.style.border = "none";
		playBtn.style.alt = "Click to Play";
		a.appendChild(playBtn);

}



function hideDiv() {
	var child= document.getElementById("wthvideo");
	var parent= child.parentNode;
	parent.removeChild(child);
}

if (autostart=="oncethenpic") {
	if (document.cookie.indexOf("hasSeen=true") == -1) {
		var later = new Date();
		later.setFullYear(later.getFullYear()+10);
		document.cookie = 'hasSeen=true;path=/;';
		autostart = "yes";
		}
	else {
		autostart = "no";

	}
}

if (autostart=="oncethenmute") {
	if (document.cookie.indexOf("hasSeen=true") == -1) {
		var later = new Date();
		later.setFullYear(later.getFullYear()+10);
		document.cookie = 'hasSeen=true;path=/;';
		autostart = "yes";
		}
	else {
		autostart = "mute";
	}
}

if (autostart=="onceonly") {
	if (document.cookie.indexOf("hasSeen=true") == -1) {
		var later = new Date();
		later.setFullYear(later.getFullYear()+10);
		document.cookie = 'hasSeen=true;expires='+later.toGMTString();
		autostart = "yes";
		}
	else {
		autostart = "mute";
	}
}

if (autostart=="onceonlythenmute") {
	if (document.cookie.indexOf("hasSeen=true") == -1) {
		var later = new Date();
		later.setFullYear(later.getFullYear()+10);
		document.cookie = 'hasSeen=true;expires='+later.toGMTString();
		autostart = "yes";
		}
	else {
		autostart = "mute";
	}
}
if (autostart=="onceonlythenpic") {
	if (document.cookie.indexOf("hasSeen=true") == -1) {
		var later = new Date();
		later.setFullYear(later.getFullYear()+10);
		document.cookie = 'hasSeen=true;expires='+later.toGMTString();
		autostart = "yes";
		}
	else {
		autostart = "no";

	}
}

if (oncepersession == "yes") {
	onlyOnce();}
	else {
		if (oncepersession == "onceonly") {
			onlyOnce2();}
		else {
		createDiv();
	}
	}


function thisMovie(movieName) {
         if (navigator.appName.indexOf("Microsoft") != -1) {
             return window[movieName];
         } else {
             return document[movieName];
         }
     }

function onlyOnce() {
if (document.cookie.indexOf("hasSeen=true") == -1) {
var later = new Date();
later.setFullYear(later.getFullYear()+10);
document.cookie = 'hasSeen=true;path=/;';
createDiv();
}
}
function onlyOnce2() {
if (document.cookie.indexOf("hasSeen=true") == -1) {
var later = new Date();
later.setFullYear(later.getFullYear()+10);
document.cookie = 'hasSeen=true;path=/;';
createDiv();
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

function cue0() {
	wthvideo.style.top="240px";
	wthvideo.style.marginLeft="20px";
	bounce("JedDownload2.flv");
}

function cue1() {
	document.getElementById('wthvideo').style.top="370px";
	document.getElementById('wthvideo').style.marginLeft="-564px";
	bounce("JedDownload3.flv");
}
function cue2() {
	document.getElementById('wthvideo').style.top="210px";
	document.getElementById('wthvideo').style.marginLeft="297px";
	bounce("JedDownload4.flv");
}
function cue3() {
	document.getElementById('wthvideo').style.top="380px";
	document.getElementById('wthvideo').style.marginLeft="175px";
}

function cue4() {
	document.getElementById('wthvideo').style.top="38px";
	document.getElementById('wthvideo').style.marginLeft="-390px";
}

function cue5() {
	document.getElementById('wthvideo').style.top="20px";
	document.getElementById('wthvideo').style.marginLeft="80px";
}

function cue6() {
	document.getElementById('wthvideo').style.top="380px";
	document.getElementById('wthvideo').style.marginLeft="175px";
}
function pausecomp(ms) {
	document.getElementById("wthvideo").innerHTML = document.getElementById("wthvideo").innerHTML;
 } 
 function bounce(newflv){
	 	//create flashvars value
		var newFlashVars ="";
		newFlashVars += "vurl=" +newflv;
		newFlashVars += "&amp;vwidth=" +width;
		newFlashVars += "&amp;vheight=" +height;
		newFlashVars += "&amp;actorpic=" +bImage;
		newFlashVars += "&amp;autostart=" +autostart;
		newFlashVars += "&amp;exitoncomplete=" +exitoncomplete;
		newFlashVars += "&amp;vbuff=" +0;
		newFlashVars += "&amp;vdelay=" +delay;
		newFlashVars += "&amp;vcolor=" +color;
		newFlashVars += "&amp;vlink=" +vidlink;
		newFlashVars += "&amp;openin=_blank";
		newFlashVars += "&amp;fadein=" +fadein;
		newFlashVars += "&amp;fadeout=" +fadeout;
		newFlashVars += "&amp;vvol=" +volume;
		newFlashVars += "&amp;playbtn=" +hBtn;
		newFlashVars += "&amp;playpos=" +playposition;
		newFlashVars += "&amp;playtop=" +playtop;
		newFlashVars += "&amp;hflip=" +flip;
		newFlashVars += "&amp;controlbar=" +controlbar;
		newFlashVars += "&amp;exitbtn="+exitbtn;
		
		///add swf object
		var markUp = "";
		markUp += '  <object id="objvideo" style="outline:none;" type="application/x-shockwave-flash" width="'+width+'" height="'+height+'" data="'+playerPath+'">';
		markUp += '    <param name="movie" value="'+playerPath+'" />';
		markUp += '    <param name="quality" value="high" />';
		markUp +=  ' 	<param name="flashvars" value="'+newFlashVars+'"/>';
		markUp += '    <param name="wmode" value="transparent" />';
		markUp += '    <param name="allowscriptaccess" value="always" />';
		markUp += '    <param name="swfversion" value="9.0.45.0" />';
		markUp += '  </object>';
	document.getElementById("wthvideo").innerHTML = markUp;
 }