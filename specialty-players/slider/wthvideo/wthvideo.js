// Copyright 2017 Website Talking Heads
//Version 1.2.2
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
	var responsive = "yes", //You must place <div id="wthvideo"></div> inside the div you want the video to be in.
		device = "true", //Display Talking Head On Devices
		deviceWidth = "0", //When the above happens, the witdh of the image
		width = "320", //video width
		height = "320", //video height
		position = "fixed", //fixed or absolute positioning
		left = "50%", //if centering on page change this to 50%
		right = "auto",
		divTop = "auto",
		bottom = "0",
		centeroffset = "-300", //if centering on page negative numbers are left and positive numbers are right
		color = "rgba(255,255,255,0.6)", //the color of the player bar.
		volume = "0.8",
		delay = 0, //delay start of video
		goStop = "0",
		controlbar = "mouse", //options for showing the controlbar, yes, no, and mouse
		playbtn = "click-to-play.png", //you can set a custom playbuton
		exitbtn = "yes", //show or not show exitbtn
		autostart = "slide", //autostart options yes, no, mute, oncethenpic, oncethenmute, onceonlythenpic, onceonlythenmute, slide and loop
		exitoncomplete = "no", //option for player to close after video completes. "yes" or "no"
		oncepersession = "no", //option for number of times video plays "yes", "no", or "onceonly"
		vidLink = "", //make the Talking Heads Player a link. Either leave this set to "no" or you can put a complete URL inside the quotes.
		openIn = "_blank",
		path = "wthvideo", //path to where the files are located
		actorpic = "slider", //transparent gif
		canvasVideo = "Slider-Matte-hb", //Just name,not extension
		h264 = "slider", //Just name,not extension h264
		// end Main Player Vars
		imagePath = path + "/",
		gb = imagePath + actorpic,
		gifBackground = "url('" + gb + ".png')",
		buttonPath = imagePath + "buttons" + "/",
		hVideo = path + "/" + canvasVideo + ".mp4",
		hBtn = buttonPath + playbtn,
		leftEnd = left.charAt(left.length - 1),
		overflow = "hidden",
		setWidth = 200,
		iOS = !1,
		isDevice = !1,
		isMobileDevice = (navigator.userAgent.match(/iPhone/i)),
		platform = navigator.platform,
		ua = navigator.userAgent.toLowerCase(),
		isAndroid = ua.indexOf("android") > -1,
		playerBarWidth = 132,
		btnWidth = 32,
		playerBarHeight = btnWidth + 2,
		playerBarMarginBase = (playerBarHeight * (-1)) + "px",
		playerBarMargin = (width - playerBarWidth) / 2,
		hasSeenLS, hasSeenSS = !1,
		curTime, theParent, actorGif, iPhoneVideo, clickImage, thplayer, spokespersonImage, thb, thv, PlayerBar, newP, playerClose, restartBtn, muteBtn, createTH, dv, playingS, outputCanvas, theCanvas, thc, imgLink = null,
		myPause = false,
		vendors = ["-moz-", "-webkit-", "-o-", "-ms-", "-khtml-", ""],
		i10, toLoop, toMute = !1,
		toPlay = true,
		hasSeen = "hasSeen" + canvasVideo;
	btnWidth = btnWidth + "px";
	delay = delay * 1000;
	actorGif = imagePath + actorpic + ".png";
	buttonPath = imagePath + "buttons" + "/";
	leftEnd = left.charAt(left.length - 1);
	switch (leftEnd) {
		case "%":
			break;
		case "o":
			break;
		default:
			left += "px";
	}
	if (divTop !== "auto") {
		divTop += "px";
	}
	if (right !== "auto") {
		right += "px";
	}
	if (centeroffset !== "auto") {
		centeroffset += "px";
	}
	if (bottom !== "auto") {
		bottom += "px";
	}
	ua.indexOf("iphone os 10") > -1 ? i10 = !0 : ("iPad" !== platform && "iPhone" !== platform && "iPod" !== platform || (iOS = !0), (iOS || isAndroid || null !== isMobileDevice) && (isDevice = !0));
	if (isDevice && !device) {
		return;
	};
	if (window.innerWidth < deviceWidth) {
		return;
	};
	if (!isDevice) {
		hVideo = path + "/" + canvasVideo + ".mp4"
	} else {
		hVideo = path + "/" + h264 + ".mp4";
	}
	hasSeenSS = sessionStorage.getItem(hasSeen);
	hasSeenLS = localStorage.getItem(hasSeen);
	if (hasSeenLS === null) {
		if (autostart !== "slide" && autostart !== "no" || autostart === "mute") {
			toPlay = !0;
			autostart = "yes";
		}
	} else {
		oncepersessionSwitch();
		autostartSwitch();
	}
	if (hasSeenSS !== null) {
		switch (autostart) {
			case "oncethenmute":
			case "mute":
			case "loop":
				toLoop = !0;
				toMute = !0;
				autostart = "mute";
				break;
			case "oncethenpic":
			case "onceonlythenpic":
				autostart = "no";
				break;
		}
	}
	sessionStorage.setItem(hasSeen, !0);
	localStorage.setItem(hasSeen, !0);
	if (toPlay === !0) {
		setTimeout(function () {
			createDiv();
		}, delay)
	} else {
		return
	}

	function autostartSwitch() {
		switch (autostart) {
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

	function oncepersessionSwitch() {
		switch (oncepersession) {
			case "yes":
				if (hasSeenSS === "true") {
					toPlay = !1;
				} else {
					toPlay = !0;
				}
				break;
			case "onceonly":
				if (hasSeenLS === "true") {
					toPlay = !1;
				} else {
					toPlay = !0;
				}
				break;
			default:
				toPlay = !0;
				break;
		}
	}

	function createDiv() {
		if (responsive === "yes") {
			if (autostart === "slide") {
				var style = document.createElement('style');
				style.type = 'text/css';
				var keyFrames = '\
					@-webkit-keyframes moveUp {\
						100% {\
							-webkit-transform: translateY(A_DYNAMIC_VALUE);\
						}\
					}\
					@-moz-keyframes moveUp {\
						100% {\
							-webkit-transform: translateY(A_DYNAMIC_VALUE);\
						}\
					}';
				style.innerHTML = keyFrames.replace(/A_DYNAMIC_VALUE/g, height * (-1) + "px");
				document.getElementsByTagName('head')[0].appendChild(style);
				var newDiv = document.createElement("div");
				newDiv.id = "wthvideo";
				newDiv.style.top = (height) + "px";
				newDiv.style.animation = 'moveUp 2s linear forwards';
				var talkingHead = document.getElementById("talkingHead");
				talkingHead.style.overflow = "hidden";
				talkingHead.style.position = "relative";
				talkingHead.style.marginLeft = centeroffset;
				talkingHead.style.left = left;
				talkingHead.style.right = right;
				talkingHead.style.marginLeft = centeroffset;
				talkingHead.style.top = "auto";
				talkingHead.style.bottom = 0;
				talkingHead.style.height = height + "px";
				talkingHead.style.width = width + "px";
				talkingHead.appendChild(newDiv);
			}
			createTH = document.getElementById("wthvideo");
			createTH.style.position = "relative";
			createTH.style.left = "50%";
			createTH.style.marginLeft = (width / 2) * -1 + "px";
			createTH.style.bottom = 0;
		} else {
			createTH = document.createElement("div");
			createTH.id = "wthvideo";
			createTH.style.position = position;
			createTH.style.marginLeft = centeroffset;
			createTH.style.left = left;
			createTH.style.right = right;
			createTH.style.marginLeft = centeroffset;
			createTH.style.top = divTop;
			createTH.style.bottom = bottom;
			var wthbody = document.body || document.getElementsByTagName("body")[0];
			wthbody.insertBefore(createTH, wthbody.childNodes[0]);
		}
		thv = document.getElementById("wthvideo");
		createTH.style.height = height + "px";
		createTH.style.width = width + "px";
		createTH.style.zIndex = 9999;
		createTH.style.cursor = "pointer";
		createTH.style.overflow = overflow;
		if (isDevice) {
			createVideo();
			createControls();
			HTML5Autostart();
		} else {
			createVideo();
			createControls();
			createCanvas();
			HTML5Autostart();
		}
	}

	function createVideo() {
		var v = document.createElement("VIDEO");
		v.id = "talkinghead";
		v.setAttribute("playsinline", "");
		if (autostart === "yes") {
			v.setAttribute("autostart", "");
		}
		v.src = hVideo;
		v.zIndex = 1;
		v.poster = actorGif;
		if (!isDevice) {
			v.style.display = "none";
		}
		v.volume = volume;
		v.style.width = width + "px";
		if (toLoop) {
			v.loop = !0;
		}
		if (toMute) {
			v.muted = !0;
			if (autostart !== "loop") {
				startBtnCreate();
			}
		}
		if (!isDevice) {
			v.style.height = height * 2 + "px";
		} else {
			v.style.height = height + "px";
		}
		thv.appendChild(v);
		thplayer = document.getElementById("talkinghead");
		var p = document.createElement("p");
		p.innerHTML = "Your Browser does not support the <video> tag";
		v.appendChild(p);
	}

	function createCanvas() {
		thb = document.createElement("CANVAS");
		thb.id = "bufferCanvas";
		thb.width = width;
		thb.height = height * 2;
		thb.style.display = "none";
		thb.style.position = "absolute";
		thv.appendChild(thb);
		thc = document.createElement("CANVAS");
		thc.style.position = "absolute";
		thc.style.top = "0";
		thc.style.left = "0";
		thc.id = "talkingCanvas";
		thc.width = width;
		thc.height = height * 2;
		thv.appendChild(thc);
	}

	function createControls() {
		var newD = document.createElement("div");
		newD.id = "playholder";
		newD.style.position = "relative";
		if (isDevice) {
			newD.style.top = (height * -1) + "px";
		} else {
			newD.style.top = 0;
		}
		newD.style.width = width + "px";
		newD.style.height = height + "px";
		thv.appendChild(newD);
		if (exitbtn === "yes") {
			var newI = document.createElement("img");
			newI.id = "htmlClose";
			newI.style.marginLeft = (width - 20) + "px";
			newI.style.width = "16px";
			newI.style.display = "block";
			newI.style.position = "relative";
			newI.src = buttonPath + "ExitBtn-full.png";
			newI.style.zIndex = 10020;
			dv = document.getElementById("playholder");
			var windowClose = newI;
			dv.appendChild(windowClose);
		}
		newP = document.createElement("div");
		newP.id = "PlayerBar";
		newP.style.height = playerBarHeight + "px";
		newP.style.width = playerBarWidth + "px";
		newP.style.borderRadius = "8px";
		newP.style.paddingLeft = "3px";
		newP.style.paddingTop = "1px";
		newP.style.marginTop = "0px";
		newP.style.left = playerBarMargin + "px";
		newP.style.bottom = "0px";
		if (isDevice) {
			newP.style.position = "absolute";
		} else {
			newP.style.position = "relative";
		}
		newP.style.zIndex = 10020;
		newP.style.background = color;
		PlayerBar = newP;
		thv.appendChild(PlayerBar);
		createTH = document.createElement("img");
		createTH.style.maxWidth = btnWidth;
		createTH.id = "PlayPauseBtn";
		createTH.style.float = "left";
		createTH.src = buttonPath + "PlayBtn.png";
		createTH.style.position = "relative";
		createTH.style.zIndex = "inherit";
		dv = document.getElementById("PlayerBar");
		newP.style.position = "PlayPauseBtn";
		var PlayButton = createTH;
		dv.appendChild(PlayButton);
		createTH = document.createElement("img");
		createTH.style.width = btnWidth;
		createTH.id = "muteBtn";
		if (document.getElementById("talkinghead").muted) {
			createTH.src = buttonPath + "VolumeBtnMute.png";
		} else {
			createTH.src = buttonPath + "VolumeBtn.png";
		}
		createTH.style.float = "left";
		dv = document.getElementById("PlayerBar");
		muteBtn = createTH;
		dv.appendChild(muteBtn);
		createTH = document.createElement("img");
		createTH.style.width = btnWidth;
		createTH.id = "restartBtn";
		createTH.style.float = "left";
		createTH.src = buttonPath + "RestartBtn.png";
		createTH.style.position = "relative";
		createTH.style.float = "left";
		createTH.style.zIndex = 10050;
		dv = document.getElementById("PlayerBar");
		restartBtn = createTH;
		dv.appendChild(restartBtn);
		createTH = document.createElement("img");
		createTH.style.width = btnWidth;
		createTH.id = "playerClose";
		createTH.style.position = "relative";
		createTH.style.zIndex = 99050;
		createTH.style.float = "left";
		createTH.src = buttonPath + "ExitBtn.png";
		dv = document.getElementById("PlayerBar");
		playerClose = createTH;
		dv.appendChild(playerClose);
		addListeners();
		if ("ontouchstart" in window || controlbar === "yes") {
			document.getElementById("PlayerBar").style.marginTop = playerBarMarginBase;
		} else {
			setCss3Style(document.getElementById("PlayerBar"), "transition", "all 1s");
		}
	}

	function startPlaying() {
		theCanvas = document.getElementById("talkingCanvas");
		outputCanvas = document.getElementById("bufferCanvas");
		try {
			thplayer.play();
			document.getElementById("PlayPauseBtn").src = buttonPath + "PauseBtn.png";
		} catch (err) {}
		if (theCanvas && theCanvas.getContext) {
			var ctx = theCanvas.getContext("2d");
			if (ctx) {
				playingS = setInterval(function () {
					showVideo();
				}, 16)
			}
		}
	}

	function showVideo() {
		try {
			var theCanvas = document.getElementById("talkingCanvas"),
				ctx = theCanvas.getContext("2d"),
				srcVid = thplayer,
				buffer = outputCanvas.getContext("2d");
			buffer.drawImage(srcVid, 0, 0);
			var image = buffer.getImageData(0, 0, width, height, { willReadFrequently: true }),
				imageData = image.data,
				alphaData = buffer.getImageData(0, height, width, height, { willReadFrequently: true }).data;
			for (var i = 3, len = imageData.length; i < len; i = i + 4) {
				imageData[i] = alphaData[i - 1]
			}
			ctx.putImageData(image, 0, 0, 0, 0, width, height)
		} catch (err) {}
	}

	function HTML5Autostart() {
		if (autostart === "yes" || toLoop === !0) {
			thplayer.oncanplay = function () {
				if (thplayer.paused === !0) {
					autostart = "cant auto play";
					addBackground()
				}
			}
		}
		if (autostart === "yes" || toLoop === !0) {
			thplayer.autoplay = !0;
			document.getElementById("PlayPauseBtn").src = buttonPath + "PauseBtn.png";
			document.getElementById("PlayerBar").style.opacity = "1";
			startPlaying()
		} else {
			addBackground()
		}
		if (exitoncomplete === "yes") {
			thplayer.addEventListener("ended", closePlayer, !1)
		}
	}

	function addListeners() {
		theParent = document.querySelector("#wthvideo");
		theParent.addEventListener("click", doSomething, !1);
		theParent.addEventListener("mouseover", overVideo, !1);
		theParent.addEventListener("mouseout", outVideo, !1);
		if (goStop > 0) {
			var frameRate = 30;
			thplayer.ontimeupdate = function () {
				if (myPause === false) {
					timeUpdate()
				}
			}
		}

		function timeUpdate() {
			curTime = thplayer.currentTime;
			var theCurrentFrame = Math.floor(curTime * frameRate);
			if (theCurrentFrame >= goStop && theCurrentFrame <= goStop + 10) {
				document.getElementById("PlayPauseBtn").src = buttonPath + "PlayBtn.png";
				myPause = true;
				thplayer.pause();
				startBtnCreate()
			}
		}

		function outVideo(e) {
			if (e.target !== e.currentTarget) {
				switch (e.target.id) {
					case "talkingCanvas":
						document.getElementById("PlayerBar").style.marginTop = "0px";
						break;
					case "PlayPauseBtn":
					case "muteBtn":
					case "restartBtn":
					case "playerClose":
					case "htmlClose":
					case "imgLnk":
						e.target.style.opacity = 1;
						break
				}
			}
			e.stopPropagation()
		}

		function overVideo(e) {
			if (e.target !== e.currentTarget) {
				switch (e.target.id) {
					case "talkingCanvas":
						document.getElementById("PlayerBar").style.marginTop = playerBarMarginBase;
						break;
					case "PlayPauseBtn":
					case "muteBtn":
					case "restartBtn":
					case "playerClose":
					case "htmlClose":
					case "imgLnk":
						e.target.style.opacity = 0.5;
						document.getElementById("PlayerBar").style.marginTop = playerBarMarginBase;
						break
				}
			}
			e.stopPropagation()
		}

		function doSomething(e) {
			if (e.target !== e.currentTarget) {
				if (toMute) {
					removeMuted()
				}
				switch (e.target.id) {
					case "PlayPauseBtn":
						if (spokespersonImage) {
							if (spokespersonImage.style.display === "none") {
								playToggle()
							}
						} else {
							playToggle()
						}
						break;
					case "muteBtn":
						muteToggle();
						break;
					case "restartBtn":
						restartClick();
						break;
					case "playerClose":
					case "htmlClose":
						closePlayer();
						break;
					case "click-to-play":
					case "spokespersonImage":
						playClick();
						break;
					case "talkingCanvas":
					case "talkinghead":
						if (vidLink !== "") {
							openLink()
						} else {
							try {
								document.getElementById("click-to-play").parentNode.removeChild(document.getElementById("click-to-play"))
							} catch (err) {}
							playToggle()
						}
						break;
					case "imgLnk":
					case "Spokesperson":
					case "videoBtn":
						iPhonePlay();
						break;
					case "talkinghead":
						if (platform === "iPhone") {
							iPhonePlay()
						} else {
							openLink()
						}
						break
				}
			}
			e.stopPropagation()
		}
		try {
			thplayer.addEventListener("ended", videoEnded, !1)
		} catch (err) {}
		try {
			iPhoneVideo.addEventListener("ended", iPhoneEnded, !1)
		} catch (err) {}
	}

	function setCss3Style(el, prop, val) {
		for (var i = 0, l = vendors.length; i < l; i++) {
			el.style[toCamelCase(vendors[i] + prop)] = val
		}
	}

	function toCamelCase(str) {
		return str.toLowerCase().replace(/(\-[a-z])/g, function ($1) {
			return $1.toUpperCase().replace("-", "")
		})
	}

	function videoEnded() {
		document.getElementById("PlayPauseBtn").src = buttonPath + "PlayBtn.png";
		if (exitoncomplete === "yes") {
			closePlayer()
		} else if (isDevice) {
			startBtnCreate()
		} else {
			addBackground()
		}
	}

	function playClick() {
		try {
			spokespersonImage.style.display = "none"
		} catch (err) {}
		try {
			document.getElementById("click-to-play").parentNode.removeChild(document.getElementById("click-to-play"))
		} catch (err) {}
		if (isDevice) {
			thplayer.play();
			document.getElementById("PlayPauseBtn").src = buttonPath + "PauseBtn.png"
		} else {
			startPlaying()
		}
	}

	function playToggle() {
		if (thplayer.paused) {
			try {
				document.getElementById("click-to-play").parentNode.removeChild(document.getElementById("click-to-play"))
			} catch (err) {}
			thplayer.play();
			document.getElementById("PlayPauseBtn").src = buttonPath + "PauseBtn.png";
			document.getElementById("PlayerBar").style.opacity = "1"
		} else {
			document.getElementById("PlayPauseBtn").src = buttonPath + "PlayBtn.png";
			thplayer.pause()
		}
	}

	function muteToggle() {
		if (thplayer.muted) {
			thplayer.muted = !1;
			document.getElementById("muteBtn").src = buttonPath + "VolumeBtn.png"
		} else {
			document.getElementById("muteBtn").src = buttonPath + "VolumeBtnMute.png";
			thplayer.muted = !0
		}
	}

	function restartClick() {
		thplayer.currentTime = 0;
		document.getElementById("PlayPauseBtn").src = buttonPath + "PauseBtn.png";
		playClick();
		thplayer.play()
	}

	function closePlayer() {
		thplayer.pause();
		clearInterval(playingS);
		try {
			thv.parentNode.removeChild(document.getElementById("wthvideo"))
		} catch (err) {}
		return
	}

	function addBackground() {
		spokespersonImage = document.createElement("DIV");
		spokespersonImage.id = "spokespersonImage";
		spokespersonImage.style.backgroundImage = gifBackground;
		spokespersonImage.style.backgroundRepeat = "no-repeat";
		spokespersonImage.style.position = "absolute";
		spokespersonImage.style.cursor = "pointer";
		spokespersonImage.style.height = height + "px";
		spokespersonImage.style.width = width + "px";
		spokespersonImage.style.zIndex = 100;
		thv.insertBefore(spokespersonImage, thv.firstChild);
		spokespersonImage = document.getElementById("spokespersonImage");
		startBtnCreate()
	}

	function startBtnCreate() {
		var startBtn = document.createElement("img");
		startBtn.id = "click-to-play";
		startBtn.src = hBtn;
		startBtn.alt = "Click to Play";
		startBtn.style.zIndex = 100;
		startBtn.style.width = setWidth + "px";
		startBtn.style.left = (width - setWidth) / 2 + "px";
		startBtn.style.bottom = "30px";
		startBtn.style.cursor = "pointer";
		startBtn.style.display = "block";
		startBtn.style.position = "absolute";
		if (myPause) {
			thv.appendChild(startBtn)
		}
		if (isDevice) {
			thv.appendChild(startBtn)
		} else {
			if (toMute) {
				thv.appendChild(startBtn)
			} else {
				spokespersonImage.appendChild(startBtn)
			}
		}
		clickImage = document.getElementById("click-to-play")
	}

	function openLink() {
		document.getElementById("PlayPauseBtn").src = buttonPath + "PlayBtn.png";
		thplayer.pause();
		window.open(vidLink, openIn)
	}

	function removeMuted() {
		document.getElementById("muteBtn").src = buttonPath + "VolumeBtn.png";
		toMute = !1;
		toLoop = !1;
		thplayer.muted = !1;
		thplayer.loop = !1;
		setTimeout(function () {
			restartClick()
		}, 150)
	}
}
// Copyright 2017 Website Talking Heads
