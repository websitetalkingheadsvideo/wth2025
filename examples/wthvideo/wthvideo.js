// Copyright 2014 Website Talking Heads
// JavaScript Document

//Variables for Player
	var responsive= "no";//You must place <div id="wthvideo"></div> inside the div you want the video to be in.
	var html5= "yes";//if you want html5 fallback
	var width= "352";//video width
	var height= "320";//video height
	var position= "absolute";//fixed or absolute positioning
	var doctype= "strict";
	var left= "50%";//if centering on page change this to 50%
	var right= "auto";
	var divTop= "366";
	var bottom= "auto";
	var centeroffset= "420";//if centering on page negative numbers are left and positive numbers are right
	var color= 0xCCCCCC;//set the color of the playerbar
	var volume= 70;
	var autostart= "oncethenpic";//autostart options yes, no, mute, oncethenpic, oncethenmute, onceonlythenpic, onceonlythenmute, and loop
	var fadein= 0;//only works in some versions of flash
	var fadeout= 2;//only works in some versions of flash
	var flip= "no";//only works in some versions of flash
	var delay= 0;//delay start of video
	var delayclose= 0;//delay start of video
	var buffertime= 3;//only works in some versions of flash
	var controlbar= "mouse";//options for showing the controlbar in flash; yes, no, and mouse
	var exitbtn= "no";
	var playbtn= "PlayVideo.png";//you can set a custom playbuton for the flash player
	var playposition= "center";//left-rigth position of flash play button "left", "right", or "center"
	var playtop= "bottom";//top-bottom position of flash play button "top", "bottom", or "center"
	var exitoncomplete= "yes";//option for player to close after video completes.  "yes" or "no"
	var oncepersession= "no";//option for number of times video plays "yes", "no", or "onceonly"
	var vidlink= "no";//make the flashplayer a link.  Either leave this set to "no" or you can put a complete URL inside the quotes.
	var openin= "_blank";
	var path= "https://www.websitetalkingheads.com/examples/wthvideo";//path to where the files are located
	var actorpic= "rennyexamples";//Just name,not extension
	var posterImg= "rennyexamples";//Just name,not extension must be jpg
	var flv= "rennyexamples";//Just name,not extension
	var h264= "rennyexamples";//Just name,not extension
	 
// end Vars	
//HTML5 cookies	
var hasSeen = "hasSeen"+flv;
var hasSeenSS = sessionStorage.getItem(hasSeen);
var hasSeenLS = localStorage.getItem(hasSeen);

if(hasSeenSS == "yes"){
	switch(autostart) {
		 case "oncethenpic":
			autostart = "no";
			break;
		 case "oncethenmute":
			autostart = "mute";	
			break;
	}
}else{
	sessionStorage.setItem(hasSeen, "yes");
	switch(autostart) {
		 case "oncethenpic":
			autostart = "yes";
			break;
		 case "oncethenmute":
			autostart = "yes";	
			break;
	
	}
}
if(hasSeenLS == "yes"){
	switch(autostart) {
		 case "onceonly":
			exit;
			break;
		 case "onceonlythenmute":
			autostart = "mute";	
			break;
		 case "onceonlythenpic":
			autostart = "no";
			break;
	
		 default:
			break;
	} 
}else{
	localStorage.setItem(hasSeen, "yes");
	switch(autostart) {
		 case "onceonly":
			autostart = "yes";
			break;
		 case "onceonlythenmute":
			autostart = "yes";
			break;
		 case "onceonlythenpic":
			autostart = "yes";
			break;
	}
}
switch(oncepersession){
	case "yes":    
		if (hasSeenSS != "yes") {
		setTimeout(function () {createDiv()}, delay);
		}
		break;
    case "onceonly":
		if (hasSeenSS != "yes") {
		setTimeout(function () {createDiv()}, delay);
		}
        break;
     default:
	 	setTimeout(function () {createDiv()}, delay);
        break;
}
//End cookie creation	
// convert vars to something useful
	var playerBarHeight = ((width/4) *.6)+4;
	actorpic = path + "/" + actorpic + ".png";
	var imagePath =  path + "/";
	var buttonPath = imagePath + "buttons" +"/" ;
	var barImage = "url(" + buttonPath + "PlayerBar.png)"; 
	var playerPath = path+"/wthplayer.swf";
	var hVideo = path+"/"+h264+".mp4";
	var hBtn = buttonPath+playbtn;
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
	if (centeroffset != "auto"){
		centeroffset+="px";}	
	var inListener = null;
	var outListener = null;
	var delayOut = null;
	var delayIn = null;

//Set Movie Type
function thisMovie(movieName) {
         if (navigator.appName.indexOf("Microsoft") != -1) {
             return window[movieName];
         } else {
             return document[movieName];
         }
     }
//Detect iOS
	var iOS = false,
	p = navigator.platform;
	if( p === "iPad" || p === "iPhone" || p === "iPod" ){iOS = true;}
	if(iOS == true){
	overflow = "visible";
	playerBarMarginTop = -2 +"px";
	posterImg = path + "/" + posterImg + ".jpg";
	if(bottom<playerBarHeight){bottom=playerBarHeight;}
	}else{
	playerBarMarginTop = (-1)*(playerBarHeight+7)+"px";
	posterImg = actorpic;
	overflow = "hidden";
	}

	if (bottom != "auto"){
		bottom+="px";}
		
// start creating divs
function createDiv() {
	var my_div = null;
	var newDiv = null;
	if(responsive == "yes"){
		var newDiv = document.getElementById("wthvideo");
		position= "relative";
		left= "50%";
		right= "auto";
		divTop= "0";
		bottom= "auto";
		centeroffset= "-160";
	}else{
		var newDiv = document.createElement("div");
		newDiv.id = "wthvideo"; 
	}
	newDiv.style.height = height+"px";
	newDiv.style.width = width+"px";
	newDiv.style.position = position;
	newDiv.style.top = divTop;
	newDiv.style.left = left;
	newDiv.style.right = right;
	newDiv.style.bottom = bottom;
	newDiv.style.marginLeft = centeroffset;
	newDiv.style.zIndex = 9999;
	newDiv.style.overflow = overflow;
	

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
		newFlashVars += "&amp;openin="+openin;
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
		markUp += '  <object id="objvideo" style="outline:none;" type="application/x-shockwave-flash"  width="'+width+'" height="'+height+'" data="'+playerPath+'">';
		markUp += '    <param name="movie" value="'+playerPath+'" />';
		markUp += '    <param name="quality" value="high" />';
		markUp += ' 	<param name="flashvars" value="'+newFlashVars+'">';
		markUp += '    <param name="wmode" value="transparent" />';
		markUp += '    <param name="allowscriptaccess" value="always" />';
		markUp += '    <param name="swfversion" value="9.0.45.0" />';
		markUp += '  </object>';
		newDiv.innerHTML = markUp;
		if(responsive != "yes"){
			var body   = document.body || document.getElementsByTagName("body")[0];
			body.insertBefore(newDiv,body.childNodes[0]);
			var objCSS = document.getElementById("objvideo").style;
			objCSS.height = height+"px";
			objCSS.width = width+"px";
		}
		if(html5 != "no"){
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
		newP.style.zIndex = 10000;
		newP.style.height = height+"px";
		newP.style.width = width+"px";
		var dv = document.getElementById("objvideo");
		var h264Fallback = newP;
		dv.appendChild(h264Fallback);
		document.getElementById("videoBox").style.position = "relative";
		document.getElementById("videoBox").style.zIndex=1010;
		
		//Create playerbar
		var newP = document.createElement("div");
		newP.id = "PlayerBar";
		newP.style.height=playerBarHeight+6+"px";
		newP.style.width = "70%";
		newP.style.margin = "0 auto";
		newP.style.marginTop = playerBarMarginTop;
		newP.style.cursor = "pointer";
		newP.style.position = "relative";
		newP.style.zIndex = 10020;
		newP.style.paddingTop = "4px";
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
		newDiv.src = buttonPath + "PlayBtn.png";
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
		newDiv.src = buttonPath + "VolumeBtn.png";
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
		newDiv.src = buttonPath + "RestartBtn.png";
		newDiv.style.position = "relative";
		newDiv.style.zIndex = 10050;
		var dv = document.getElementById("PlayerBar");
		var restartBtn = newDiv;
		dv.appendChild(restartBtn);
		
		//Create exit button
		var newDiv = document.createElement("img");
		newDiv.id = "playerClose";
		newDiv.style.width = "24%";
		newDiv.style.position = "relative";
		newDiv.style.zIndex = 99050;
		newDiv.style.float = "right";
		newDiv.src = buttonPath + "ExitBtn.png";
		newDiv.style.paddingRight = "2%";
		var dv = document.getElementById("PlayerBar");
		var playerClose = newDiv;
		dv.appendChild(playerClose);
		HTML5Autostart();
		addListeners();
		}
}

function HTML5Autostart(){
if (navigator.mimeTypes ["application/x-shockwave-flash"] == undefined){
	flvTest =false;
	if(html5 =="no"){
		document.getElementById("objvideo").style.visibility = "hidden";
		var div=document.getElementById("objvideo");
		div.parentNode.removeChild(div);
		var div=document.getElementById("wthvideo");
		div.parentNode.removeChild(div);
	}
}else{
	flvTest = true;
}
if (flvTest == false){
	if(autostart == "yes" &&iOS == false && html5 != "no"){
				document.getElementById("videoBox").autoplay=true;
				document.getElementById("PlayPauseBtn").src= buttonPath+"PauseBtn.png";
				document.getElementById("PlayerBar").style.opacity = "1";
		}
	if(exitoncomplete=="yes" && html5 != "no"){
		eoc=document.getElementById("videoBox");
		eoc.addEventListener("ended", exitWTH, false);
	}
}
}

function addListeners(){
	//add eventlisteners
	e = document.getElementById("PlayPauseBtn");//Play Pause
	e.addEventListener("mouseover", playPauseOver, false);
	e.addEventListener("mouseout", playPauseOut, false);
	e.addEventListener("click", playToggle, false);
	e = document.getElementById("muteBtn");//mute
	e.addEventListener("mouseover", muteOver, false);
	e.addEventListener("mouseout", muteOut, false);
	e.addEventListener("click", muteToggle, false);
	e = document.getElementById("restartBtn");//restart 
	e.addEventListener("mouseover", restartOver, false);
	e.addEventListener("mouseout", restartOut, false);
	e.addEventListener("click", restartClick, false);
	e = document.getElementById("playerClose");//restart 
	e.addEventListener("mouseover", exitOver, false);
	e.addEventListener("mouseout", exitOff, false);
	e.addEventListener("click", closePlayer, false);
	// event listener for video ending
	myVidPlayed=document.getElementById("videoBox");
	myVidPlayed.addEventListener("ended", videoEnded, false); 
	
	//PlayerBar mouse functions		
	var inListener = null;
	var outListener = null;
	var delayOut = null;
	var delayIn = null;
	e = document.getElementById("h264Fallback");//Play Pause
	e.addEventListener("mouseover", PlayerBarOver, false);
	e.addEventListener("mouseout", PlayerBarOut, false);
}

//Play Toggle Functions
function playPauseOver(e){
	if (document.getElementById("videoBox").paused){
		document.getElementById("PlayPauseBtn").src=  buttonPath +"PlayBtn_on.png";
		}else{
	document.getElementById("PlayPauseBtn").src=  buttonPath +"PauseBtn_on.png";
		}
	}	
function playPauseOut(e){
	if (document.getElementById("videoBox").paused){
		document.getElementById("PlayPauseBtn").src=  buttonPath +"PlayBtn.png";
		}else{
		document.getElementById("PlayPauseBtn").src=  buttonPath +"PauseBtn.png";

		}
	}
function playToggle(e){
		if (document.getElementById("videoBox").paused){
		  document.getElementById("videoBox").play();
		document.getElementById("PlayPauseBtn").src= buttonPath+"PauseBtn.png";
		document.getElementById("PlayerBar").style.opacity = "1";
		  } else {
			document.getElementById("PlayPauseBtn").src= buttonPath+"PlayBtn.png";
		  	document.getElementById("videoBox").pause();
		  }
		}
		
//Mute Button Functions
function muteOver(){
	if (document.getElementById("videoBox").muted){
		document.getElementById("muteBtn").src=  buttonPath +"VolumeBtnMute_on.png";
		}else{
		document.getElementById("muteBtn").src=  buttonPath +"VolumeBtn_on.png";
		}
	}	
function muteOut(){
	if (document.getElementById("videoBox").muted){
		document.getElementById("muteBtn").src=  buttonPath +"VolumeBtnMute.png";
		}else{
		document.getElementById("muteBtn").src=  buttonPath +"VolumeBtn.png";
		}
	}

function muteToggle(){
		if (document.getElementById("videoBox").muted){
		  	document.getElementById("videoBox").muted=false;
			document.getElementById("muteBtn").src= buttonPath +"VolumeBtn.png";
		  } else {
			document.getElementById("muteBtn").src= buttonPath +"VolumeBtnMute.png";
		  	document.getElementById("videoBox").muted=true;
		  }
		}
		
//Restart Button
function restartOver(){
	document.getElementById("restartBtn").src=  buttonPath +"RestartBtn_on.png";
	}
function restartOut(){
		document.getElementById("restartBtn").src= buttonPath +"RestartBtn.png";
	}	
function restartClick(){
	document.getElementById("videoBox").currentTime = 0;
	document.getElementById("PlayPauseBtn").src= buttonPath+"PauseBtn.png";
	document.getElementById("videoBox").play();
		}
	
//Exit Button
function exitOver(){
		document.getElementById("playerClose").src=  buttonPath +"ExitBtn_on.png";
	}
function exitOff(){
		document.getElementById("playerClose").src= buttonPath +"ExitBtn.png";
	}

function closePlayer(){
		document.getElementById("objvideo").style.visibility = "hidden";
		document.getElementById("videoBox").pause();
	}
	
//function for when video Ends
function videoEnded(e) { 
	clearInterval(outListener);
	var opacity = .2;
	var interval = 30;
	var inListener = null;
	var id = PlayerBar;
	inListener = setInterval(function(){opacity = fadeInInterval(opacity, id, inListener);} , interval);
	document.getElementById("PlayPauseBtn").src= buttonPath+"PlayBtn.png";
};		


function PlayerBarOver(){
	clearInterval(delayOut);
	clearInterval(outListener);
	var opacity = 1;
	var interval = 30;
	var inListener = null;
	var id = PlayerBar;
	inListener = setInterval(function(){opacity = fadeInInterval(opacity, id, inListener);} , interval);
}
function PlayerBarOut(){
	delayOut=setTimeout(function(){	clearInterval(inListener);
	var opacity = 1;
	var interval = 40;
	var id = PlayerBar;
	outListener = setInterval(function(){opacity = fadeOutInterval(opacity, id, outListener);} , interval);},300);
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
	document.getElementById("PlayerBar").style.opacity = level;	
}

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
	document.getElementById("videoBox").pause();
	}
}

function unpauseWTH() {
	if(flvTest === true){
	thisMovie("objvideo").unpauseVideoWTH();
	}else{
	document.getElementById("videoBox").play();
	}
}
function playWTH() {
	if(flvTest === true){
	thisMovie("objvideo").playVideoWTH();
	}else{
	document.getElementById("videoBox").play();
	}
}
function stopWTH() {
	if(flvTest === true){
	thisMovie("objvideo").stopVideoWTH();
	}else{
	document.getElementById("videoBox").currentTime = 0;
	document.getElementById("videoBox").pause();
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
	thisMovie("objvideo").startVolWTH();
	}else{
	muteToggle();
	}
}

function hideDiv() {
	var child= document.getElementById("wthvideo");
	var parent= child.parentNode;
	parent.removeChild(child);
}
function cue0() {
	pauseWTH();
}