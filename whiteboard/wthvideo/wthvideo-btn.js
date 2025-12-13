// Copyright 2014 Website Talking Heads
// JavaScript Document
//Delay creation until page is loaded
if (window.addEventListener) {
    window.addEventListener("load", wthplayer, false);
} else if (window.attachEvent) {
    window.attachEvent("onload", wthplayer);
} else {
    window.onload = wthplayer;
}
function wthplayer() {
    "use strict";
//Variables for Player
	var responsive= "no",//You must place <div id="wthvideo"></div> inside the div you want the video to be in.
       player = "both", //player options; both-flash with HTML5 fallback(default), flash-flash player only, html5- html5 player only
       linkWidth = "281",
       width= "440",
       height= "360",
       position= "fixed",//fixed or absolute positioning
       left= "auto",//if centering on page change this to 50%
       right= "0",
       divTop= "auto",
       bottom= "0",
	   barColor = "rgba(179,200,219,0.8)",
       centeroffset= "auto",//if centering on page negative numbers are left and positive numbers are right
       volume= 0.8,//range is 0 to 1
       autostart= "oncethenpic",//autostart options yes, no, mute, oncethenpic, oncethenmute, onceonlythenpic, onceonlythenmute, and loop
		exitbtn = "yes",
       delay= 1,//delay start of video
       playbtn= "click-to-play.png",//you can set a custom playbuton for the flash player
       playposition= "center",//left-rigth position of flash play button "left", "right", or "center"
       playtop= "bottom",//top-bottom position of flash play button "top", "bottom", or "center"
       controlbar= "mouse",//options for showing the controlbar in flash; yes, no, and mouse
       exitoncomplete= "no",//option for player to close after video completes.  "yes" or "no"
       oncepersession= "no",//option for number of times video plays "yes", "no", or "onceonly"
       vidlink= "no",//make the flashplayer a link.  Either leave this set to "no" or you can put a complete URL inside the quotes.
       openin= "_blank",
       path= "http://www.websitetalkingheads.com/whiteboard/wthvideo",//path to where the files are located
       posterImg= "TheHand",//Just name,not extension must be gif
       h264= "TheHand",//Just name,not extension h264
       actorpic= "TheHand",//Just name,not extension png
       jpgImg= "TheHand",//Just name,not extension must be jpg
       flv= "TheHand",//Just name,not extension
//----------------------------------------------------------------------------------------------------------------------------------------	 
        // convert vars to something useful
    	imagePath = path + "/",
        buttonPath = imagePath + "buttons" + "/",
        hVideo = path + "/" + h264 + ".mp4",
        hBtn = buttonPath + playbtn,
        leftEnd = left.charAt(left.length - 1),
        overflow = "hidden",
        doc = window.document,
        iOS = false,
        playerPath = path + "/wthplayer-exitbtn.swf",
        flvTest = true,
        platform = navigator.platform,
        cancelFullScreen = doc.exitFullscreen || doc.mozCancelFullScreen || doc.webkitExitFullscreen || doc.msExitFullscreen,
		playerBarWidth = "86",
 	 	playerBarHeight = 20,
  	    playerBarMarginTop = "0px",
		btnWidth = "20px",
		btnPad = "2px",
        //Detect window width
		objCSS, newLnk, newImg, PlayerBar, newP, e, playerClose, restartBtn, muteBtn, myVidPlayed, newDiv, toPlay, h264Fallback, dv = null,
		vendors = ['-moz-','-webkit-','-o-','-ms-','-khtml-',''],
        //Detect window width
        windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth, 
		hasSeen = "hasSeen"+h264, hasSeenSS = sessionStorage.getItem(hasSeen), hasSeenLS = localStorage.getItem(hasSeen);
// convert vars to something useful
	actorpic = imagePath + actorpic + ".png";
	buttonPath = imagePath + "buttons" +"/" ;
	hVideo = path+"/"+h264+".mp4";
	leftEnd = left.charAt(left.length -1);
	switch (leftEnd)
	 {
	case "%":
		break;
	case "o":
		break;
	default:
		left +="px";
	}
	if (divTop !== "auto"){
		divTop+="px";}
	if (right !== "auto"){
		right+="px";}
	if (centeroffset !== "auto"){
		centeroffset+="px";}
	if (bottom !== "auto"){
		bottom+="px";}
	if (navigator.mimeTypes ["application/x-shockwave-flash"] === undefined){
	flvTest =false;
	}
//--------------------------------------------------------------------------------------------------------------
//HTML5 cookies	
if(hasSeenSS === "yes" || hasSeenLS === "yes"){
	oncepersessionSwitch();
	autostartSwitch();
}else{
	switch(autostart) {
		 case "oncethenpic":
		 case "oncethenmute":
		 case "onceonlythenmute":
		 case "onceonlythenpic":
			autostart = "yes";
			break;
	}
	sessionStorage.setItem(hasSeen, "yes");
	localStorage.setItem(hasSeen, "yes");
	toPlay = true;
}
if(toPlay === true){
		setTimeout(function () {createDiv();}, delay);
}else{
	return;
}
function autostartSwitch(){
	switch(autostart) {
		 case "oncethenpic":
			autostart = "no";
			break;
		 case "oncethenmute":
			autostart = "mute";	
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
}
function oncepersessionSwitch(){
	if(oncepersession === "no"){
		toPlay = true;
	}else{
		if(oncepersession === "yes" && hasSeenSS === "yes"){
			toPlay = false;
		}else{
			if(oncepersession === "onceonly" && hasSeenLS === "yes"){toPlay = false;
			}else{
				toPlay = true;
			}}
	}
}
//End cookie creation	
//--------------------------------------------------------------------------------------------------------------
//Detect iOS
	if( platform === "iPad" || platform === "iPhone" || platform === "iPod" ){iOS = true;}
		if(iOS === true){
		posterImg = jpgImg;
		if(platform === "iPhone"){
 		overflow = "visible";
		playerBarMarginTop = -2 +"px";
	posterImg = imagePath + posterImg + ".jpg";
		}
	}else{
		overflow = "hidden";
	posterImg = imagePath + posterImg + ".gif";
	}

//-----------------------------------------------------------------------------------------------------------------------	
// start creating divs
function createDiv() {
	if(responsive === "yes"){
		newDiv = document.getElementById("wthvideo");
		position= "relative";
		newDiv.style.marginRight = centeroffset;
	}else{
		newDiv = document.createElement("div");
		newDiv.id = "wthvideo"; 
		newDiv.style.position = position;
	}
	newDiv.style.height = height+"px";
	newDiv.style.width = width+"px";
	newDiv.style.top = divTop;
	newDiv.style.left = left;
	newDiv.style.right = right;
	newDiv.style.bottom = bottom;
	newDiv.style.marginLeft = centeroffset;
	newDiv.style.zIndex = 9999;
	newDiv.style.overflow = overflow;
	if(windowWidth<linkWidth){
		playImg();
	}else{
			if(player === "html5"){
				html5Player();
			}else{
				addFlash();
			}
	}
}
//----------------------------------------------------------------------------------------------------------------------
//html Player
function html5Player(){
		//add html5 fallback
		newP = document.createElement("div");
		newP.id = "h264Fallback";
		var videoMarkUp = '';
		videoMarkUp += '<video id="videoBox" width="'+width+'" height="'+height+'" poster="'+posterImg+'" >';
		videoMarkUp += '    <source src="'+hVideo+'" type="video/mp4">';
		videoMarkUp += 'Your Browser Does Not support the video tag';
		videoMarkUp += '  </video>';
		newP.innerHTML = videoMarkUp;
		newP.style.position = "relative";
		newP.style.zIndex = 1;
		newP.style.height = height+"px";
		newP.style.width = width+"px";
        if (player === "html5") {
             dv = document.getElementById("wthvideo");
        } else {
            dv = document.getElementById("objvideo");
        }
		h264Fallback = newP;
		dv.appendChild(h264Fallback);
		document.getElementById("videoBox").style.position = "relative";
		document.getElementById("videoBox").style.zIndex=1010;
		//create controls holder
		
		var newD = document.createElement("div");
		newD.id = "playholder";
		newD.style.position = "relative";
		newD.style.marginTop= height *(-1) + "px";
		newD.style.width="100%";
		newD.style.height="100%";
		dv = document.getElementById("h264Fallback");
		dv.appendChild(newD);
		//upper exit btn
		newDiv = document.createElement("img");
		newDiv.id = "htmlClose";
		newDiv.style.marginLeft = (width-10)+"px";
		newDiv.style.marginTop = (height)*(-1)+"px";
		newDiv.style.width = "10px";
		newDiv.style.display = "block";
		newDiv.style.position = "relative";
		newDiv.style.cursor = "pointer";
		newDiv.src = buttonPath + "ExitBtn-full.png";
		newDiv.style.zIndex = 10020;
		dv = document.getElementById("playholder");
		var windowClose = newDiv;
		dv.appendChild(windowClose);
		windowClose.addEventListener("click", closePlayer, false);
		//--------------------------------------------------------------------------------------
		if(autostart !== "yes"){startBtnCreate();}
		//Create playerbar--------------------------------------------------------------------------------------
		newP = document.createElement("div");
		newP.id = "PlayerBar";
		newP.style.height=playerBarHeight +"px";
		newP.style.width = playerBarWidth +"px";
		newP.style.borderRadius = "8px";
		newP.style.paddingLeft = "3px";
		newP.style.marginLeft = "auto";
		newP.style.marginRight = "auto";
		newP.style.marginTop = playerBarMarginTop;
		newP.style.cursor = "pointer";
		newP.style.display = "block";
		newP.style.position = "relative";
		newP.style.zIndex = 10020;
		newP.style.background = barColor;
		dv = document.getElementById("h264Fallback");
		PlayerBar = newP;
		dv.appendChild(PlayerBar);
		
		//Create PlayButton
		newDiv = document.createElement("img");
		newDiv.style.width = btnWidth;
		newDiv.style.padding = btnPad;
		newDiv.id = "PlayPauseBtn";
		newDiv.style.float = "left";
		newDiv.src = buttonPath + "PlayBtn.png";
		newDiv.style.position = "relative";
		newDiv.style.zIndex = "inherit";
		dv = document.getElementById("PlayerBar");
		newP.style.position = "PlayPauseBtn";
		var PlayButton = newDiv;
		dv.appendChild(PlayButton);
				
		//Create Mute
		newDiv = document.createElement("img");
		newDiv.style.width = btnWidth;
		newDiv.style.padding = btnPad;
		newDiv.id = "muteBtn";
		newDiv.src = buttonPath + "VolumeBtn.png";
		newDiv.style.float = "left";
		dv = document.getElementById("PlayerBar");
		muteBtn = newDiv;
		dv.appendChild(muteBtn);
		//Create Restart
		newDiv = document.createElement("img");
		newDiv.style.width = btnWidth;
		newDiv.style.padding = btnPad;
		newDiv.id = "restartBtn";
		newDiv.style.float = "left";
		newDiv.src = buttonPath + "RestartBtn.png";
		newDiv.style.position = "relative";
		newDiv.style.float = "left";
		newDiv.style.zIndex = 10050;
		dv = document.getElementById("PlayerBar");
		restartBtn = newDiv;
		dv.appendChild(restartBtn);
		
		//Create exit button
		newDiv = document.createElement("img");
		newDiv.style.width = btnWidth;
		newDiv.style.padding = btnPad;
		newDiv.id = "playerClose";
		newDiv.style.position = "relative";
		newDiv.style.zIndex = 99050;
		newDiv.style.float = "left";
		newDiv.src = buttonPath + "ExitBtn.png";
		dv = document.getElementById("PlayerBar");
		playerClose = newDiv;
		dv.appendChild(playerClose);
		
//----------------------------------------------------------------------------------------------------
		HTML5Autostart();
		addListeners();
		document.getElementById('videoBox').volume = volume;
		if ('ontouchstart' in window) {
			newP.style.marginTop="-22px";
		}else{
			addCSSRule(document.styleSheets[0], "#h264Fallback:hover >#PlayerBar", "margin-top: -22px!important");
			setCss3Style(document.getElementById('PlayerBar'),'transition','all 1s');
		}
}
//----------------------------------------------------------------------------------------------------
function HTML5Autostart(){
	if(autostart === "yes"){
				document.getElementById("videoBox").autoplay=true;
				document.getElementById("PlayPauseBtn").src= buttonPath+"PauseBtn.png";
				document.getElementById("PlayerBar").style.opacity = "1";
		}
	if(exitoncomplete === "yes"){
		document.getElementById("videoBox").addEventListener("ended", closePlayer, false);
	}
}
//----------------------------------------------------------------------------------------------------
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
}

//------------------------------------------------------------------------------------------------------------
//move playerbar    
function setCss3Style(el,prop,val){
        for(var i=0,l=vendors.length;i<l;i++){
            el.style[toCamelCase(vendors[i] + prop)] = val;
		}
    }
function toCamelCase(str){return str.toLowerCase().replace(/(\-[a-z])/g, function($1){return $1.toUpperCase().replace('-','');});}
//-----------------------------------------------------------------------------------------------------------------------	
function addCSSRule(sheet, selector, rules, index) {
	if("insertRule" in sheet) {
		sheet.insertRule(selector + "{" + rules + "}", index);
	}
	else if("addRule" in sheet) {
		sheet.addRule(selector, rules, index);
	}
}
//-----------------------------------------------------------------------------------------------------------------------	
function rgb2hex(rgb){
 rgb = rgb.match(/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i);
 return (rgb && rgb.length === 4) ?  "0x" +
  ("0" + parseInt(rgb[1],10).toString(16)).slice(-2) +
  ("0" + parseInt(rgb[2],10).toString(16)).slice(-2) +
  ("0" + parseInt(rgb[3],10).toString(16)).slice(-2) : '';
}
//------------------------------------------------------------------------------------------------------------
//function for when video Ends
    function videoEnded() {
            if (doc.fullscreenElement || doc.mozFullScreenElement || doc.webkitFullscreenElement ||  doc.msFullscreenElement) {
                cancelFullScreen.call(doc);
            }
            switch(exitoncomplete){
			case "yes":
                closePlayer();
				break;
			case "no":
            document.getElementById("videoBox").load();
            document.getElementById("videoBox").pause();
            document.getElementById("PlayPauseBtn").src = buttonPath + "PlayBtn.png";
			startBtnCreate();
				break;
			}
        }

 //click to play
function clickPlay() {
            document.getElementById("PlayerBar").style.opacity = 1;
            document.getElementById("h264Fallback").removeEventListener( "click", clickPlay, false);
            document.getElementById("PlayPauseBtn").addEventListener( "click", playToggle, false);
			playClick();
            document.getElementById("videoBox").play();
        }
//Play Toggle Functions
function playPauseOver(){
		document.getElementById("PlayPauseBtn").style.opacity = 0.5;
	}	
function playPauseOut(){
		document.getElementById("PlayPauseBtn").style.opacity = 1;
	}
function playToggle(){
		if (document.getElementById("videoBox").paused){
		  document.getElementById("videoBox").play();
		document.getElementById("PlayPauseBtn").src= buttonPath+"PauseBtn.png";
		document.getElementById("PlayerBar").style.opacity = "1";
		clickPlay();
		  } else {
			document.getElementById("PlayPauseBtn").src= buttonPath+"PlayBtn.png";
		  	document.getElementById("videoBox").pause();
		  }
		}
		
//Mute Button Functions
function muteOver(){
		document.getElementById("muteBtn").style.opacity = 0.5;
	}	
function muteOut(){
		document.getElementById("muteBtn").style.opacity = 1;
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
	document.getElementById("restartBtn").style.opacity = 0.5;
	}
function restartOut(){
		document.getElementById("restartBtn").style.opacity = 1;
	}	
function restartClick(){
	document.getElementById("videoBox").currentTime = 0;
	document.getElementById("PlayPauseBtn").src= buttonPath+"PauseBtn.png";
	playClick();
	document.getElementById("videoBox").play();
		}
	
//Exit Button
function exitOver(){
		document.getElementById("playerClose").style.opacity = 0.5;
	}
function exitOff(){
		document.getElementById("playerClose").style.opacity = 1;
	}	

function closePlayer(){
		try{document.getElementById("reporter").innerHTML = "Close Button Clicked";}catch(err){}
		try{document.getElementById("objvideo").style.visibility = "hidden";
		}
		catch(err){}
	 	try{document.getElementById("playerClose").removeEventListener("mouseout", exitOff, false);
        document.getElementById("playerClose").removeEventListener("mouseover", exitOver, false);
        document.getElementById("playerClose").removeEventListener("mouseout", exitOff, false);
		document.getElementById("wthvideo").parentNode.removeChild(document.getElementById("wthvideo"));}
		catch(err){}
		return;
	}
//----------------------------------------------------------------------------------------------------
//HTML Playbutton
function startBtnCreate(){
			//Create click to play
			var startBtn = document.createElement("img");
			startBtn.id = "click-to-play";
			startBtn.src = hBtn;
			startBtn.alt = "Click to Play";
			startBtn.src = hBtn;
			var setWidth = 200;
			if (width<200){setWidth=width;}
			startBtn.style.width = setWidth + "px";
			startBtn.style.marginLeft = "auto";
			startBtn.style.marginRight = "auto";
			startBtn.style.marginTop = (height*0.6) + "px";
			startBtn.style.cursor = "pointer";
			startBtn.style.position = "relative";
			startBtn.style.display = "block";
			startBtn.style.zIndex = 1111;
			dv = document.getElementById("playholder");
			dv.appendChild(startBtn);
			startBtn.addEventListener("click", playToggle, false);
	}
function playClick(){
			document.getElementById("click-to-play").removeEventListener("click", playClick, false);
			document.getElementById("click-to-play").parentNode.removeChild(document.getElementById("click-to-play"));
	}
//----------------------------------------------------------------------------------------------------------------------
function playImg(){
			//Create Link
			newLnk = document.createElement("a");
			newLnk.href = hVideo;
			document.getElementById('wthvideo').appendChild(newLnk);
			//Create Image
			newImg = document.createElement("img");
			newImg.id = "spokesperson";
			newImg.src = posterImg;
			newImg.alt = "WTH Video Spokesperson";
			newLnk.appendChild(newImg);
			//Create Link
			newLnk = document.createElement("a");
			newLnk.href = hVideo;
			newLnk.id = "click-to-play-link";
			document.getElementById('wthvideo').appendChild(newLnk);
			//Create click to play
			PlayerBar = document.createElement("img");
			PlayerBar.id = "click-to-play";
			PlayerBar.src = hBtn;
			PlayerBar.alt = "Click to Play";
			PlayerBar.style.marginTop = "-100px";
			PlayerBar.style.marginLeft = "50%";
			PlayerBar.style.left = "-100px";
			PlayerBar.style.cursor = "pointer";
			PlayerBar.style.position = "relative";
			PlayerBar.style.zIndex = 10020;
			dv = document.getElementById("click-to-play-link");
			dv.appendChild(PlayerBar);
	}
//----------------------------------------------------------------------------------------------------------------------
function addFlash(){
	//create flashvars value
	var color = rgb2hex(barColor);
		var newFlashVars ="";
		newFlashVars += "vurl=" +flv + ".flv";
		newFlashVars += "&amp;vwidth=" +width;
		newFlashVars += "&amp;vheight=" +height;
		newFlashVars += "&amp;actorpic=" +actorpic;
		newFlashVars += "&amp;autostart=" +autostart;
		newFlashVars += "&amp;exitoncomplete=" +exitoncomplete;
		newFlashVars += "&amp;vbuff=" +delay;
		newFlashVars += "&amp;vdelay=" +delay;
		newFlashVars += "&amp;vcolor=" +color;
		newFlashVars += "&amp;vlink=" +vidlink;
		newFlashVars += "&amp;openin="+openin;
		newFlashVars += "&amp;vvol=" +volume*100;
		newFlashVars += "&amp;playbtn=" +hBtn;
		newFlashVars += "&amp;playpos=" +playposition;
		newFlashVars += "&amp;playtop=" +playtop;
		newFlashVars += "&amp;controlbar=" +controlbar;
		newFlashVars += "&amp;exitbtn="+exitbtn;
		///add swf object
		var markUp = '';
		markUp += '  <object id="objvideo" style="outline:none;" type="application/x-shockwave-flash"  width="'+width+'" height="'+height+'" data="'+playerPath+'">';
		markUp += '    <param name="movie" value="'+playerPath+'" />';
		markUp += '    <param name="quality" value="high" />';
		markUp += '    <param name="wmode" value="transparent" />';
		markUp += '    <param name="allowscriptaccess" value="sameDomain" />';
		markUp += ' 	<param name="flashvars" value="'+newFlashVars+'">';
		markUp += '  </object>';
		newDiv.innerHTML = markUp;
		if(responsive !== "yes"){
			var body   = document.body || document.getElementsByTagName("body")[0];
			body.insertBefore(newDiv,body.childNodes[0]);
			objCSS = document.getElementById("objvideo").style;
			objCSS.height = height+"px";
			objCSS.width = width+"px";
		}
		if(player === "both" && flvTest === false){
			html5Player();
			}
	}
}
function closePlayer(){
	"use strict";
		try{document.getElementById("reporter").innerHTML = "Close Button Clicked";}catch(err){}
		try{document.getElementById("objvideo").style.visibility = "hidden";
		}
		catch(err){}
	 	try{
			document.getElementById("wthvideo").parentNode.removeChild(document.getElementById("wthvideo"));}
		catch(err){}
		return;
	}