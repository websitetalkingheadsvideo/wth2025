// Copyright 2018 Website Talking Heads
//Version 1.0.0
// JavaScript Document
jQuery.fn.extend({
	talkingPopup: function () {
		"use strict";
		var up = false;
		var thplayer;
		var popupWidth = 760;
		var popupHeight = 376;
		var exitLeft = popupWidth - 42;
		$("<style type='text/css'> #exitpopup { text-align: center;width:" + popupWidth + "px; height:" + popupHeight + "px; margin:0px auto; display:none; position:fixed; color:#000000; padding:20px; -webkit-border-radius: 4px; -moz-border-radius: 8px; border-radius: 8px;border:thin solid #3D9CEB; z-index:999999; background:rgb(20, 20, 20); background:#FFFFFF; } #popup_title { margin-top: 0px; padding-top: 0px; } #exitpopup p { text-align: left; } #exitpopup_bg{display: none; width:100%; height:100%; position:fixed; background:#000000; opacity: .8; filter:alpha(opacity=0.8); z-index:999998;} #__vtigerWebForm{margin-top:46px}#vtigerFormSubmitBtn.btn-popup{border-radius:.5rem;border-color:#437CCC;border-width:thin;text-shadow:0 1px rgba(7,11,73,0.6);background:#3d9ceb;background:-moz-radial-gradient(center,ellipse cover,#3d9ceb 0%,#258dc8 100%);background:-webkit-radial-gradient(center,ellipse cover,#3d9ceb 0%,#258dc8 100%);background:radial-gradient(ellipse at center,#3d9ceb 0%,#258dc8 100%); filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#3d9ceb',endColorstr='#258dc8',GradientType=1);width:50%;min-width:180px;margin:0 auto} #vtigerFormSubmitBtn.btn-popup:hover{border-color:#BCE4FF;text-shadow:0 -1px rgba(7,11,73,0.6)} #popupClose{margin-top:-16px;margin-left: " + exitLeft + "px;width:16px; height:16px;z-index:199200; display:block;position:absolute;cursor:pointer }</style>").appendTo("head");
		$('#exitpopup').prepend('<img id="popupClose" src="../../../popup/talkingheads/talkingheads/buttons/ExitBtn-full.png" />');
		$(document).mousemove(function (e) {
			$('#exitpopup').css('left', (window.innerWidth / 2 - $('#exitpopup').width() / 2));
			$('#exitpopup').css('top', (window.innerHeight / 2 - $('#exitpopup').height() / 2));
			if (e.pageY <= 5) {
				if (!up) {
					// Show the popup
					$('#exitpopup_bg').fadeIn();
					$('#exitpopup').fadeIn();
					up = true;
					if (thplayer) {
						console.log('remove');
						$('#spokespersonImage').remove();
						thplayer.play();
					} else {
						wthplayer();
					}
				}
			}
		});
		$('#exitpopup_bg').click(function () {
			exitPopUp();
		});
		$('#popupClose').click(function () {
			exitPopUp();
		});

		function exitPopUp() {
			$('#exitpopup_bg').fadeOut();
			$('#exitpopup').slideUp();
			up = false;
			thplayer.pause();
		}

		function wthplayer() {
			//Variables for Player
			var responsive = "yes", //You must place <div id="popup"></div> inside the div you want the video to be in.
				width = "320", //video width
				height = "320", //video height
				position = "fixed", //fixed or absolute positioning
				left = "auto", //if centering on page change this to 50%
				right = "0",
				divTop = "auto",
				bottom = "0",
				centeroffset = "auto", //if centering on page negative numbers are left and positive numbers are right
				color = "rgba(255,255,255,0.6)", //the color of the player bar.
				volume = "0.8",
				delay = 0, //delay start of video
				controlbar = "mouse", //options for showing the controlbar, yes, no, and mouse
				playbtn = "click-to-play.png", //you can set a custom playbuton
				exitbtn = "yes", //show or not show exitbtn
				autostart = "yes", //autostart options yes, no, mute, oncethenpic, oncethenmute, onceonlythenpic, onceonlythenmute, and loop
				exitoncomplete = "no", //option for player to close after video completes. "yes" or "no"
				oncepersession = "no", //option for number of times video plays "yes", "no", or "onceonly"
				vidLink = "", //make the Talking Heads Player a link. Either leave this set to "no" or you can put a complete URL inside the quotes.
				openIn = "_blank",
				path = "talkingheads", //path to where the files are located
				actorpic = "Shona-GIF", //transparent gif
				h264 = "Exit-shona", //Just name,not extension h264
				// end Main Player Vars
				imagePath = path + "/",
				gb = imagePath + actorpic,
				gifBackground = "url('" + gb + ".gif')",
				buttonPath = imagePath + "buttons" + "/",
				hBtn = buttonPath + playbtn,
				leftEnd = left.charAt(left.length - 1),
				overflow = "hidden",
				setWidth = 200,
				playerBarWidth = 132,
				btnWidth = 32,
				playerBarHeight = btnWidth + 2,
				playerBarMarginBase = (playerBarHeight * (-1)) + "px",
				playerBarMargin = (width - playerBarWidth) / 2,
				hasSeenLS, hasSeenSS = !1,
				hVideo, theParent, actorGif, clickImage, spokespersonImage, thb, PlayerBar, newP, playerClose, restartBtn, muteBtn, talkingHead, dv, playingS, outputCanvas, theCanvas, thc, imgLink = null,
				vendors = ["-moz-", "-webkit-", "-o-", "-ms-", "-khtml-", ""],
				i10, toLoop, toMute = !1,
				toPlay = true,
				hasSeen = "hasSeen" + h264;
			btnWidth = btnWidth + "px";
			delay = delay * 1000;
			actorGif = imagePath + actorpic + ".gif";
			buttonPath = imagePath + "buttons" + "/";
			leftEnd = left.charAt(left.length - 1);
			switch (leftEnd) {
				case "%":
					break;
				case "o":
					break;
				default:
					left += "px"
			}
			if (divTop !== "auto") {
				divTop += "px"
			}
			if (right !== "auto") {
				right += "px"
			}
			if (centeroffset !== "auto") {
				centeroffset += "px"
			}
			if (bottom !== "auto") {
				bottom += "px"
			}
			hVideo = path + "/" + h264 + ".mp4";
			hasSeenSS = sessionStorage.getItem(hasSeen);
			hasSeenLS = localStorage.getItem(hasSeen);
			if (hasSeenLS === null) {
				if (autostart !== "no" || autostart === "mute") {
					toPlay = !0;
					autostart = "yes"
				}
			} else {
				oncepersessionSwitch();
				autostartSwitch()
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
						break
				}
			}
			sessionStorage.setItem(hasSeen, !0);
			localStorage.setItem(hasSeen, !0);
			if (toPlay === !0) {
				setTimeout(function () {
					createDiv()
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
						break
				}
			}

			function oncepersessionSwitch() {
				switch (oncepersession) {
					case "yes":
						if (hasSeenSS === "true") {
							toPlay = !1
						} else {
							toPlay = !0
						}
						break;
					case "onceonly":
						if (hasSeenLS === "true") {
							toPlay = !1
						} else {
							toPlay = !0
						}
						break;
					default:
						toPlay = !0;
						break
				}
			}

			function createDiv() {
				talkingHead = $("#talking-popup");
				talkingHead.css({
					"position": "relative",
					"left": "50%",
					"marginLeft": (width / 2) * -1 + "px",
					"top": "auto",
					"bottom": "1px",
					"height": height + "px",
					"width": width + "px",
					"zIndex": 9999,
					"cursor": "pointer",
					"overflow": overflow
				});
				createVideo();
				createControls();
				HTML5Autostart();
			}

			function createVideo() {
				var videoPlayer = $('<video id: "videoPlayer" />');
				videoPlayer.attr({
					"src": hVideo,
					"poster": actorGif,
					"volume": volume,
					"type": 'video/mp4',
					"height": height,
					"width": width,
					"playsinline": "",
					"autoplay": ""
				});
				console.log('hit:' + videoPlayer);
				talkingHead.append(videoPlayer);
				var p = document.createElement("p");
				p.innerHTML = "Your Browser does not support the <video> tag";
				thplayer = $('#videoPlayer');
				thplayer.append(p);
			}

			function createControls() {
				var newD = document.createElement("div");
				newD.id = "playholder";
				newD.style.position = "relative";
				newD.style.width = width + "px";
				newD.style.height = height + "px";
				talkingHead.append(newD);
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
				newP.style.position = "absolute";
				newP.style.zIndex = 10020;
				newP.style.background = color;
				PlayerBar = newP;
				talkingHead.append(PlayerBar);
				talkingHead = document.createElement("img");
				talkingHead.style.maxWidth = btnWidth;
				talkingHead.id = "PlayPauseBtn";
				talkingHead.style.float = "left";
				talkingHead.src = buttonPath + "PauseBtn.png";
				talkingHead.style.position = "relative";
				talkingHead.style.zIndex = "inherit";
				dv = document.getElementById("PlayerBar");
				newP.style.position = "PlayPauseBtn";
				var PlayButton = talkingHead;
				dv.append(PlayButton);
				talkingHead = document.createElement("img");
				talkingHead.style.width = btnWidth;
				talkingHead.id = "muteBtn";
				talkingHead.src = buttonPath + "VolumeBtn.png";
				talkingHead.style.float = "left";
				dv = document.getElementById("PlayerBar");
				muteBtn = talkingHead;
				dv.append(muteBtn);
				talkingHead = document.createElement("img");
				talkingHead.style.width = btnWidth;
				talkingHead.id = "restartBtn";
				talkingHead.style.float = "left";
				talkingHead.src = buttonPath + "RestartBtn.png";
				talkingHead.style.position = "relative";
				talkingHead.style.float = "left";
				talkingHead.style.zIndex = 10050;
				dv = document.getElementById("PlayerBar");
				restartBtn = talkingHead;
				dv.append(restartBtn);
				talkingHead = document.createElement("img");
				talkingHead.style.width = btnWidth;
				talkingHead.id = "playerClose";
				talkingHead.style.position = "relative";
				talkingHead.style.zIndex = 99050;
				talkingHead.style.float = "left";
				talkingHead.src = buttonPath + "ExitBtn.png";
				dv = document.getElementById("PlayerBar");
				playerClose = talkingHead;
				dv.append(playerClose);
				addListeners();
				if ("ontouchstart" in window || controlbar === "yes") {
					document.getElementById("PlayerBar").style.marginTop = playerBarMarginBase
				} else {
					setCss3Style(document.getElementById("PlayerBar"), "transition", "all 1s")
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
							showVideo()
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
					var image = buffer.getImageData(0, 0, width, height),
						imageData = image.data,
						alphaData = buffer.getImageData(0, height, width, height).data;
					for (var i = 3, len = imageData.length; i < len; i = i + 4) {
						imageData[i] = alphaData[i - 1]
					}
					ctx.putImageData(image, 0, 0, 0, 0, width, height)
				} catch (err) {}
			}

			function HTML5Autostart() {}

			function addListeners() {
				theParent = document.querySelector("#talking-popup");
				theParent.addEventListener("click", doSomething, !1);
				theParent.addEventListener("mouseover", overVideo, !1);
				theParent.addEventListener("mouseout", outVideo, !1);

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
									console.log(spokespersonImage.style.display);
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
							case "spokespersonImage":
								playClick();
								break;
							case "talkingCanvas":
							case "talkinghead":
								if (vidLink !== "") {
									openLink()
								} else {
									playToggle()
								}
								break;
							case "imgLnk":
							case "Spokesperson":
							case "talkinghead":
								openLink();
								break
						}
					}
					e.stopPropagation()
				}
				try {
					thplayer.addEventListener("ended", videoEnded, !1)
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
				}
				thplayer.removeAttribute("autoplay");
				thplayer.src = thplayer.src;
				thplayer.load();
			}

			function playClick() {
				try {
					spokespersonImage.style.display = "none"
				} catch (err) {}
				startPlaying();
			}

			function playToggle() {
				if (thplayer.paused) {
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
				exitPopUp();
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
				talkingHead.insertBefore(spokespersonImage, talkingHead.firstChild);
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
				startBtn.style.position = "absolute";
				talkingHead.append(startBtn);
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
	}
});
// Copyright 2017 Website Talking Heads
