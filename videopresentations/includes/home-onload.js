// Copyright 2014 Website Talking Heads
// JavaScript Document
function wthPlayer(){
//Variables for Player
	var width= "336";
	var height= "288";
	var position= "absolute";
	var doctype= "strict";
	var left= "50%";
	var right= "auto";
	var divTop= "244";
	var bottom= "auto";
	var centeroffset= "-400";
	var color= "0xCCCCCC";
	var volume= 70;
	var autostart= "oncethenimage";
	var fadein= 0;
	var fadeout= 2;
	var flip= "no";
	var delay= 0;
	var delayclose= 0;
	var buffertime= 3;
	var controlbar= "mouse";
	var exitbtn= "no";
	var playbtn= "PlayVideo.png";
	var playposition= "center";
	var playtop= "bottom";
	var exitoncomplete= "no";
	var oncepersession= "no";
	var vidlink= "no";
	var openin= "_blank";
	var path= "https://websitetalkingheads.com/wthvideo";
	var actorpic= "chantelhome";//Just name,not extension
	var flv= "chantelhome";//Just name,not extension
	var h264= "chantelhome";//Just name,not extension
	var posterImg= "chantelhome";//Just name,not extension.  use a jpg for iOS, if left blank the png will be used.
// end Vars	

// convert vars to something useful

	playerBarHeight = ((width/4) *.6)+6;
	actorpic = path + "/" + actorpic + ".png";
	var barColor = "#" + color.substr(2,6);
	var imagePath =  path + "/";
	var barImage = "url(" + imagePath + "PlayerBar.png)"; 
	var btnTop = (height)-(122);
	var btnLeft = (width/2)-(51);
	var playerPath = path+"/wthplayer.swf";
	var hVideo = path+"/"+h264+".mp4";
	var hBtn = path+"/"+playbtn;
	var playbtnPath =	path+"/"+playbtn;
	var exitButton=path+"/"+"playerClose.png";
	var flvTest = true;
	btnTop+="px";
	btnLeft+="px";
	flv+= ".flv"
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
	if (divTop != "auto"){
		divTop+="px";}
	if (right != "auto"){
		right+="px";}
	if (bottom != "auto"){
		bottom+="px";}
	if (centeroffset != "auto"){
		centeroffset+="px";}

//Detect iOS
var iOS = false,
    p = navigator.platform;

if( p === 'iPad' || p === 'iPhone' || p === 'iPod' ){
    iOS = true;
	playerBarMarginTop = -2 +"px";
	if(posterImg == ""){
		posterImg = actorpic;
	}else{
		posterImg = path + "/" + posterImg + ".jpg";
	}
}else{
	playerBarMarginTop = (-1)*playerBarHeight+"px";
	posterImg = actorpic;
}
		
		
// start creating divs
function createDiv() {
	var my_div = null;
	var newDiv = null;
	var newDiv = document.createElement("div");
	newDiv.id = "wthvideo"; 
	newDiv.style.position = position;
	newDiv.style.top = divTop;
	newDiv.style.width = width;
	newDiv.style.height = height;
	newDiv.style.left = left;
	newDiv.style.right = right;
	newDiv.style.bottom = bottom;
	newDiv.style.marginLeft = centeroffset;
	newDiv.style.zIndex = 9;
	
	
	//create flashvars value
		var newFlashVars ="";
		newFlashVars += "vurl=" +flv;
		newFlashVars += "&amp;vwidth=" +width;
		newFlashVars += "&amp;vheight=" +height;
		newFlashVars += "&amp;actorpic=" +actorpic;
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
		newFlashVars += "&amp;playerClose="+playerClose;
		///add swf object
		var markUp = '';
		markUp += '  <object id="objvideo" style="outline:none;" type="application/x-shockwave-flash" width="'+width+'" height="'+height+'" data="'+playerPath+'">';
		markUp += '    <param name="movie" value="'+playerPath+'" />';
		markUp += '    <param name="quality" value="high" />';
		markUp +=  ' 	<param name="flashvars" value="'+newFlashVars+'">';
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
		var videoMarkUp = '';
		videoMarkUp += '<video id="videoBox" width="'+width+'" height="'+height+'" poster="'+posterImg+'" >';
		videoMarkUp += '    <source src="'+hVideo+'" type="video/mp4">';
		videoMarkUp += 'Your Browser Does Not support the video tag';
		videoMarkUp += '  </video>';
		newP.innerHTML = videoMarkUp;
		newP.style.position = "relative";
		newP.style.zIndex = 10;
		var dv = document.getElementById("objvideo");
		var h264Fallback = newP;
		dv.appendChild(h264Fallback);
		document.getElementById("videoBox").style.position = "relative";
		document.getElementById("videoBox").style.zIndex=11;
		
		//Create playerbar
		var newP = document.createElement("div");
		newP.id = "PlayerBar";
		newP.style.height=playerBarHeight+"px";
		newP.style.width = "70%";
		newP.style.margin = '0 auto';
		newP.style.marginTop = playerBarMarginTop;
		newP.style.cursor = "pointer";
		newP.style.position = "relative";
		newP.style.zIndex = 12;
		newP.style.backgroundImage= barImage;
		newP.style.backgroundRepeat= "no-repeat";
		newP.style.backgroundSize= "100% 100%";
		var dv = document.getElementById("h264Fallback");
		var PlayerBar = newP;
		dv.appendChild(PlayerBar);
		
		//Create PlayButton
		var newDiv = document.createElement("img");
		newDiv.id = "PlayPauseBtn";
		newDiv.style.width = "24%";
		newDiv.style.float = "left";
		newDiv.src = imagePath + "PlayBtn.png";
		newDiv.style.position = "relative";
		newDiv.style.zIndex = "inherit";
		newDiv.style.marginLeft = "2%";
		var dv = document.getElementById("PlayerBar");
		newP.style.position = "PlayPauseBtn";
		var PlayButton = newDiv;
		dv.appendChild(PlayButton);
				
		//Create Mute
		var newDiv = document.createElement("img");
		newDiv.id = "muteBtn";
		newDiv.style.width = "24%";
		newDiv.style.float = "left";
		newDiv.src = imagePath + "VolumeBtn.png";
		newDiv.style.position = "relative";
		newDiv.style.zIndex = "inherit";
		var dv = document.getElementById("PlayerBar");
		var muteBtn = newDiv;
		dv.appendChild(muteBtn);
			

			
		//Create Restart
		var newDiv = document.createElement("img");
		newDiv.id = "restartBtn";
		newDiv.style.width = "24%";
		newDiv.style.float = "left";
		newDiv.src = imagePath + "RestartBtn.png";
		newDiv.style.position = "relative";
		newDiv.style.zIndex = 13;
		var dv = document.getElementById("PlayerBar");
		var restartBtn = newDiv;
		dv.appendChild(restartBtn);
		
		//Create exit button
		var newDiv = document.createElement("img");
		newDiv.id = "playerClose";
		newDiv.style.width = "24%";
		newDiv.style.position = "relative";
		newDiv.style.zIndex = 14;
		newDiv.style.float = "right";
		newDiv.src = imagePath + "ExitBtn.png";
		newDiv.style.paddingRight = "2%";
		var dv = document.getElementById("PlayerBar");
		var playerClose = newDiv;
		dv.appendChild(playerClose);
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


//hasSeen functions creating cookies
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
//End cookie creation


//Not sure what this is
function thisMovie(movieName) {
         if (navigator.appName.indexOf("Microsoft") != -1) {
             return window[movieName];
         } else {
             return document[movieName];
         }
     }


//HTML5 Autostart
if (navigator.mimeTypes ["application/x-shockwave-flash"] == undefined){
	flvTest =false;
}else{
	flvTest = true;
}

if (flvTest == false){
if(autostart == "yes"){
			document.getElementById('videoBox').autoplay=true;
			document.getElementById('PlayPauseBtn').src= imagePath+"PauseBtn.png";
			document.getElementById('PlayerBar').style.opacity = "0";
		}else{
			document.getElementById('PlayerBar').style.opacity = "1";
		}
}

	
//add eventlisteners
e = document.getElementById('PlayPauseBtn');//Play Pause
e.addEventListener('mouseover', playPauseOver, false);
e.addEventListener('mouseout', playPauseOut, false);
e.addEventListener('click', playToggle, false);
e = document.getElementById('muteBtn');//mute
e.addEventListener('mouseover', muteOver, false);
e.addEventListener('mouseout', muteOut, false);
e.addEventListener('click', muteToggle, false);
e = document.getElementById('restartBtn');//restart 
e.addEventListener('mouseover', restartOver, false);
e.addEventListener('mouseout', restartOut, false);
e.addEventListener('click', restartClick, false);
e = document.getElementById('playerClose');//restart 
e.addEventListener('mouseover', exitOver, false);
e.addEventListener('mouseout', exitOff, false);
e.addEventListener('click', closePlayer, false);

//Play Toggle Functions
function playPauseOver(e){
	if (document.getElementById('videoBox').paused){
		document.getElementById('PlayPauseBtn').src=  imagePath +"PlayBtn_on.png";
		}else{
	document.getElementById('PlayPauseBtn').src=  imagePath +"PauseBtn_on.png";
		}
	}	
function playPauseOut(e){
	if (document.getElementById('videoBox').paused){
		document.getElementById('PlayPauseBtn').src=  imagePath +"PlayBtn.png";
		}else{
		document.getElementById('PlayPauseBtn').src=  imagePath +"PauseBtn.png";
		}
	}
function playToggle(e){
		if (document.getElementById('videoBox').paused){
		  document.getElementById('videoBox').play();
		document.getElementById('PlayPauseBtn').src= imagePath+"PauseBtn.png";
		document.getElementById('PlayerBar').style.opacity = "1";
		  } else {
			document.getElementById('PlayPauseBtn').src= imagePath+"PlayBtn.png";
		  	document.getElementById('videoBox').pause();
		  }
		}
		
//Mute Button Functions
function muteOver(){
	if (document.getElementById('videoBox').muted){
		document.getElementById('muteBtn').src=  imagePath +"VolumeBtnMute_on.png";
		}else{
		document.getElementById('muteBtn').src=  imagePath +"VolumeBtn_on.png";
		}
	}	
function muteOut(){
	if (document.getElementById('videoBox').muted){
		document.getElementById('muteBtn').src=  imagePath +"VolumeBtnMute.png";
		}else{
		document.getElementById('muteBtn').src=  imagePath +"VolumeBtn.png";
		}
	}

function muteToggle(){
		if (document.getElementById('videoBox').muted){
		  	document.getElementById('videoBox').muted=false;
			document.getElementById('muteBtn').src= imagePath +"VolumeBtn.png";
		  } else {
			document.getElementById('muteBtn').src= imagePath +"VolumeBtnMute.png";
		  	document.getElementById('videoBox').muted=true;
		  }
		}
		
//Restart Button
function restartOver(){
	document.getElementById('restartBtn').src=  imagePath +"RestartBtn_on.png";
	}
function restartOut(){
		document.getElementById('restartBtn').src= imagePath +"RestartBtn.png";
	}	
function restartClick(){
	document.getElementById('videoBox').currentTime = 0;
	document.getElementById('videoBox').play();
		}
	
//Exit Button
function exitOver(){
		document.getElementById('playerClose').src=  imagePath +"ExitBtn_on.png";
	}
function exitOff(){
		document.getElementById('playerClose').src= imagePath +"ExitBtn.png";
	}

function closePlayer(){
	if (document.getElementById("objvideo")) {
		document.getElementById('objvideo').style.visibility = "hidden";
		document.getElementById('videoBox').pause();
		hideDiv();
	}
}
			
//PlayerBar mouse functions		
var inListener = null;
var outListener = null;
e = document.getElementById('PlayerBar');//Play Pause
e.addEventListener('mouseover', PlayerBarOver, false);
e.addEventListener('mouseout', PlayerBarOut, false);

function PlayerBarOver(){
	clearInterval(outListener);
	var opacity = 1;
	var interval = 30;
	var inListener = null;
	var id = PlayerBar;
	inListener = setInterval(function(){opacity = fadeInInterval(opacity, id, inListener);} , interval);
	}
function PlayerBarOut(){
	clearInterval(inListener);
	var opacity = 1;
	var interval = 40;
	var id = PlayerBar;
	outListener = setInterval(function(){opacity = fadeOutInterval(opacity, id, outListener);} , interval);
}

function fadeOutInterval(opacity, id, outListener){
	opacity = opacity - 0.1;
	setOpacity(id, opacity);
	if(opacity <0)
	clearInterval(outListener);
	return opacity;
}
function fadeInInterval(opacity, id, inListener){
	opacity = opacity + 0.1;
	setOpacity(id, opacity);
	if(opacity >1)
	clearInterval(inListener);
	return opacity;
}
function setOpacity(id, level){
	document.getElementById('PlayerBar').style.opacity = level;	
}

//flash player functions
//Functions to access player from html
function exitWTH() {
	if(flvTest === true){
	thisMovie("objvideo").exitVideoWTH();
	}else{
		closePlayer();
	}
}
function pauseWTH() {
	if(flvTest === true){
	thisMovie("objvideo").pauseVideoWTH();
	}else{
	document.getElementById('videoBox').pause();
	}
}

function unpauseWTH() {
	if(flvTest === true){
	thisMovie("objvideo").unpauseVideoWTH();
	}else{
	document.getElementById('videoBox').play();
	}
}
function playWTH() {
	if(flvTest === true){
	thisMovie("objvideo").playVideoWTH();
	}else{
	document.getElementById('videoBox').play();
	}
}
function stopWTH() {
	if(flvTest === true){
	thisMovie("objvideo").stopVideoWTH();
	}else{
	document.getElementById('videoBox').currentTime = 0;
	document.getElementById('videoBox').pause();
	}
}
function muteWTH() {
	if(flvTest === true){
	thisMovie("objvideo").muteVolWTH();
	}else{
	muteToggle();
	}
}
function unmuteWTH() {
	if(flvTest === true){
	thisMovie('objvideo').startVolWTH();
	}else{
	muteToggle();
	}
}

function hideDiv() {
	var child= document.getElementById("wthvideo");
	var parent= child.parentNode;
	parent.removeChild(child);
}
}