// Copyright 2018 Website Talking Heads
//Version 1.0.0
// JavaScript Document
jQuery.fn.extend({
	talkingPopup: function () {
		"use strict";
		if (window.innerWidth < 760) {
			console.log('Small Screen');
			return;
		}
		var up = false;
		var popPlayer;
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
					try {
						$('#talkinghead')[0].pause();
					} catch (e) {
						console.log('error:' + e);
					}
					$('#exitpopup_bg').fadeIn();
					$('#exitpopup').fadeIn();
					up = true;
					if (popPlayer) {
						$('#spokespersonImage').remove();
						popPlayer.play();
					} else {
						popupPlayer();
					}
				}else{
					return;
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
			popPlayer.pause();
		}

		function popupPlayer() {
			//Variables for Player
			var width = "320", //video width
				height = "320", //video height
				left = "auto", //if centering on page change this to 50%
				right = "0",
				divTop = "auto",
				bottom = "0",
				centeroffset = "auto", //if centering on page negative numbers are left and positive numbers are right
				color = "rgba(255,255,255,0.8)", //the color of the player bar.
				volume = "0.8",
				delay = 0, //delay start of video
				autostart = "no", //autostart options yes, no, mute, oncethenpic, oncethenmute, onceonlythenpic, onceonlythenmute, and loop
				exitoncomplete = "no", //option for player to close after video completes. "yes" or "no"
				oncepersession = "no", //option for number of times video plays "yes", "no", or "onceonly"
				path = "talkingheads", //path to where the files are located
				actorpic = "Shona-GIF", //transparent gif
				h264 = "Exit-shona", //Just name,not extension h264
				// end Main Player Vars
				imagePath = path + "/",
				buttonPath = imagePath + "buttons" + "/",
				leftEnd = left.charAt(left.length - 1),
				overflow = "hidden",
				setWidth = 180,
				playerBarWidth = 132,
				btnWidth = 32,
				playerBarHeight = btnWidth + 2,
				playerBarMargin = (width - playerBarWidth) / 2,
				hasSeenLS, hasSeenSS = !1,
				hVideo, theParent, actorGif, clickImage, talkingHead, toLoop, toMute = !1,
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
			hVideo = imagePath + h264 + ".mp4";
			hasSeenSS = sessionStorage.getItem(hasSeen);
			hasSeenLS = localStorage.getItem(hasSeen);
			if (hasSeenLS === null) {
				if (autostart !== "no" || autostart === "mute") {
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
				talkingHead = $("#talkingPopup");
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
				$('#talking-popup').append(talkingHead);
				createVideo();
				createControls();
			}

			function createVideo() {
				var talkingheadplayer = $('<video id: "talkingheadplayer" />');
				talkingheadplayer.attr({
					"src": hVideo,
					"poster": actorGif,
					"volume": volume,
					"type": 'video/mp4',
					"height": height,
					"width": width,
					"playsinline": "",
					"autoplay": autostart
				});
				talkingHead.append(talkingheadplayer);
				$('#talkingheadplayer').append('<p>Your Browser does not support the <video> tag</p>');
				popPlayer = talkingheadplayer[0];
			}

			function createControls() {
				var videoHolder = $('<div id: "videoHolder" />');
				videoHolder.css({
					"position": "relative",
					"width": width + "px",
					"height": height + "px"
				});
				$('#talkingPopup').append(videoHolder);
				var bar = $('<div id="bar" />');
				bar.css({
					"height": playerBarHeight + "px",
					"width": playerBarWidth + "px",
					"borderRadius": "8px",
					"paddingLeft": "3px",
					"paddingTop": "1px",
					"marginTop": "0px",
					"left": playerBarMargin + "px",
					"bottom": "0px",
					"position": "absolute",
					"zIndex": 10020,
					"background": color
				});
				talkingHead.append(bar);
				var buttons = ["th-PlayPause", "th-Mute", "th-Restart", "th-Close"];
				var btnSrc = ["PauseBtn", "VolumeBtn", "RestartBtn", "ExitBtn"];
				$.each(buttons, function (index, value) {
					var btn = $('<img id="' + value + '" />');
					btn.css({
						float: "left",
						position: "relative",
						zIndex: "inherit",
						width: btnWidth,
						height: btnWidth
					});
					var bSrc = buttonPath + btnSrc[index] + ".png";
					btn.attr("src", bSrc);
					bar.append(btn);
				});
				addListeners();
			}

			function addListeners() {
				theParent = document.querySelector("#talkingPopup");
				theParent.addEventListener("click", doSomething, !1);
				theParent.addEventListener("mouseover", overVideo, !1);
				theParent.addEventListener("mouseout", outVideo, !1);

				function outVideo(e) {
					if (e.target !== e.currentTarget) {
						switch (e.target.id) {
							case "th-PlayPause":
							case "th-Mute":
							case "th-Restart":
							case "th-Close":
								e.target.style.opacity = 1;
								break
						}
					}
					e.stopPropagation()
				}

				function overVideo(e) {
					if (e.target !== e.currentTarget) {
						switch (e.target.id) {
							case "th-PlayPause":
							case "th-Mute":
							case "th-Restart":
							case "th-Close":
								e.target.style.opacity = 0.5;
								break;
						}
					}
					e.stopPropagation();
				}

				function doSomething(e) {
					if (e.target !== e.currentTarget) {
						if (toMute) {
							removeMuted();
						}
						switch (e.target.id) {
							case "th-PlayPause":
							case "talkingheadplayer":
							case "click-to-play":
								if (clickImage) {
									clickImage.remove();
									console.log(clickImage.css("display"));
								}
								playToggle();
								break;
							case "th-Mute":
								muteToggle();
								break;
							case "th-Restart":
								restartClick();
								break;
							case "th-Close":
								closePlayer();
								break;
						}
					}
					e.stopPropagation();
				}
				try {
					popPlayer.addEventListener("ended", videoEnded, !1);
				} catch (err) {}
			}

			function videoEnded() {
				$('#th-PlayPause').src = buttonPath + "PlayBtn.png";
				if (exitoncomplete === "yes") {
					closePlayer();
				}
				popPlayer.removeAttribute("autoplay");
				popPlayer.load();
				startBtnCreate();
			}

			function playToggle() {
				if (popPlayer.paused) {
					$('#th-PlayPause').attr('src', buttonPath + "PauseBtn.png");
					$("#bar").css("opacity", "1");
					popPlayer.play();
				} else {
					$('#th-PlayPause').attr('src', buttonPath + "PlayBtn.png");
					popPlayer.pause();
				}
			}

			function muteToggle() {
				if (popPlayer.muted) {
					popPlayer.muted = !1;
					$('#th-Mute').attr('src', buttonPath + "VolumeBtn.png");
				} else {
					$('#th-Mute').attr('src', buttonPath + "VolumeBtnMute.png");
					popPlayer.muted = !0;
				}
			}

			function restartClick() {
				popPlayer.currentTime = 0;
				$('#th-PlayPause').attr('src', buttonPath + "PauseBtn.png");
				popPlayer.play();
			}

			function closePlayer() {
				exitPopUp();
			}

			function startBtnCreate() {
				$('#th-PlayPause').attr('src', buttonPath + "PlayBtn.png");
				var startBtn = $('<h3 id="click-to-play" />');
				startBtn.css({
					zIndex: 100,
					width: setWidth + "px",
					left: (width - setWidth) / 2 + "px",
					bottom: "50px",
					cursor: "pointer",
					position: "absolute",
					border: "#0474ff thin solid",
					borderRadius: "8px",
					padding: "1rem 0",
					background: color
				});
				startBtn.text('Click to Play');
				talkingHead.append(startBtn);
				clickImage = $("#click-to-play");
			}

			function removeMuted() {
				$('#th-Mute').src = buttonPath + "VolumeBtn.png";
				toMute = !1;
				toLoop = !1;
				popPlayer.muted = !1;
				popPlayer.loop = !1;
				setTimeout(function () {
					restartClick();
				}, 150);
			}
		}
	}
});
// Copyright 2017 Website Talking Heads
