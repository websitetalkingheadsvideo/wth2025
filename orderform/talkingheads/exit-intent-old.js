// Copyright 2018 Website Talking Heads
//Version 1.0.0
// JavaScript Document
$(document).ready(function () {
	"use strict";
	$('#talking-popup').talkingPopup();
});
jQuery.fn.extend({
	talkingPopup: function () {
		"use strict";
		$('body').prepend($("<div id='holder' class='container'></div>"));
		$('body').prepend($("<div id='exitpopup_bg'></div>"));
		$('#holder').append('<div id="exitpopup"></div>');
		$('#exitpopup').css('background-image', 'url(talkingheads/keep-background.jpg)');
		$('#exitpopup').append('<div id="row"></div>');
		$('#row').append('<div id="column-1"></div>');
		$('#column-1').append('<div id="talkingPopup"></div>');
		$('#row').append('<div id="column-2"></div>');
		$('#column-2').append('<h3 id="reporter"></h3>');
		$('#column-2').append('<p id="message"></p>');
		var startTime = new Date().getTime();
		var up = false;
		var popupWidth = 720;
		var popupHeight = 405;
		var exitLeft = popupWidth - 24;
		var h264, hVideo; //Just name,not extension h264
		$("<style type='text/css'>#message{font-size:2rem}#column-2{padding-right:.5rem} #column-1{width:330px} #column-1,column-2{float:left;margin:2px}#column-2{padding-top:210px} #row{max-width:760px;margin:0;clear:both} #exitpopup { text-align: center;width:" + popupWidth + "px; height:" + popupHeight + "px;background-position: center 0%;background-repeat: no-repeat; margin:0px auto; display:none; position:fixed; color:#000000;  -webkit-border-radius: 4px; -moz-border-radius: 8px; border-radius: 8px;border:2px solid #A6E556; z-index:999999; background:rgb(20, 20, 20); background:#FFFFFF; }  #popup_title { margin-top: 0px; padding-top: 0px; } #exitpopup p { text-align: left; } #exitpopup_bg{display: none; width:100%; height:100%; position:fixed; background:#000000; opacity: .8; filter:alpha(opacity=0.8); z-index:999998;}#popupClose{margin-left: " + exitLeft + "px;}#reporter{color:#e900f7}</style>").appendTo("head");
		$('#exitpopup').css('left', (window.innerWidth / 2 - $('#exitpopup').width() / 2));
		$('#exitpopup').css('top', (window.innerHeight / 2 - $('#exitpopup').height() / 2));
		$(document).mousemove(function (e) {
			if (e.pageY <= 5) {
				if (!up) {
					var moveTime = Math.round((new Date().getTime() - startTime) * 0.001);
					if (moveTime < 3) {
						h264 = "Keep Vid 1 Matte-hb";
						$('#reporter').text('Less than 3 Second Message ');
						$('#message').text("Videos grab an audience's attention more effectively than other medium. It is quick, succinct, and it engages an individual's psychological and physical senses to a higher degree.");
					} else if (moveTime < 10) {
						h264 = "Keep Vid 2 Matte-hb";
						$('#reporter').text('3-10 Second Message ');
						$('#message').text('Our Online Spokesperson features the most robust, totally free, copyrighted gamer on the marketplace today.');
					} else {
						h264 = "Keep Vid 3 Matte-hb";
						$('#reporter').text('More than 10 Seconds Message ');
						$('#message').text('Our Virtual Actor may convey details, give headlines updates, give information or even guide guests around your web site.');
					}
					$('#exitpopup').prepend('<img id="popupClose" src="talkingheads/buttons/ExitBtn-full.png" />');
					hVideo = imagePath + h264 + ".mp4";
					$("#talkingheadplayer").attr({
						"src": hVideo
					});
					$('#exitpopup_bg').fadeIn();
					$('#exitpopup').fadeIn();
					up = true;
					$('#popupClose').click(function () {
						exitPopUp();
					});
					console.log('click');
					if (clickImage) {
						clickImage.remove();
						console.log('try');
					}
					popPlayer.pause();
					playToggle();
				} else {
					return;
				}
			}
		});
		$('#exitpopup_bg').click(function () {
			exitPopUp();
		});

		function exitPopUp() {
			$('#talkingPopup').remove();
			$('#exitpopup_bg').fadeOut();
			$('#exitpopup').slideUp();
		}
		//Variables for Player
		var width = "320", //video width
			height = "320", //video height
			left = "auto", //if centering on page change this to 50%
			right = "0",
			divTop = "auto",
			bottom = "0",
			centeroffset = "auto", //if centering on page negative numbers are left and positive numbers are right
			color = "rgba(155,155,255,0.8)", //the color of the player bar.
			volume = "0",
			delay = 0, //delay start of video
			exitoncomplete = "no", //option for player to close after video completes. "yes" or "no"
			path = "talkingheads", //path to where the files are located
			actorpic = "Shona-GIF", //transparent gif
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
			popPlayer, theParent, actorGif, clickImage, talkingHead, toLoop, toMute = !1;
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
		createDiv();

		function createDiv() {
			talkingHead = $("#talkingPopup");
			talkingHead.css({
				"position": "relative",
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
			var talkingheadplayer = $('<video id="talkingheadplayer" />');
			talkingheadplayer.attr({
				"src": hVideo,
				"poster": actorGif,
				"volume": volume,
				"type": 'video/mp4',
				"height": height,
				"width": width,
				"playsinline": ""
			});
			talkingHead.append(talkingheadplayer);
			$('#talkingheadplayer').append('<p>Your Browser does not support the <video> tag</p>');
			popPlayer = talkingheadplayer[0];
		}

		function createControls() {
			var videoHolder = $('<div id="videoHolder" />');
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
							break;
					}
				}
				e.stopPropagation();
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
						case "talkingheadplayer":
						case "th-PlayPause":
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
			console.log('poster');
		}

		function playToggle() {
			if (popPlayer.paused) {
				$('#th-PlayPause').attr('src', buttonPath + "PauseBtn.png");
				$("#bar").css("opacity", "1");
				if (clickImage) {
					clickImage.remove();
					console.log('removed');
				}
				popPlayer.play();
				if (popPlayer.paused) {
					startBtnCreate();

				}
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
});
// Copyright 2017 Website Talking Heads
