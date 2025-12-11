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
		$("body").prepend('<div id="exitpopup" />');
		$("body").prepend('<div id="exitpopup_bg" />');
		var popupWidth = 760;
		var popupHeight = 376;
		var exitLeft = popupWidth - 20;
		$("<style type='text/css'> #exitpopup { text-align: center;width:" + popupWidth + "px; height:" + popupHeight + "px; margin:0px auto; display:none; position:fixed; color:#000000;  -webkit-border-radius: 4px; -moz-border-radius: 8px; border-radius: 8px;border:thin solid #3D9CEB; z-index:999999; background:rgb(20, 20, 20); background:#FFFFFF; } #popup_title { margin-top: 0px; padding-top: 0px; } #exitpopup p { text-align: left; } #exitpopup_bg{display: none; width:100%; height:100%; position:fixed; background:#000000; opacity: .8; filter:alpha(opacity=0.8); z-index:999998;} #__vtigerWebForm{margin-top:46px}#vtigerFormSubmitBtn.btn-popup{border-radius:.5rem;border-color:#437CCC;border-width:thin;text-shadow:0 1px rgba(7,11,73,0.6);background:#3d9ceb;background:-moz-radial-gradient(center,ellipse cover,#3d9ceb 0%,#258dc8 100%);background:-webkit-radial-gradient(center,ellipse cover,#3d9ceb 0%,#258dc8 100%);background:radial-gradient(ellipse at center,#3d9ceb 0%,#258dc8 100%); filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#3d9ceb',endColorstr='#258dc8',GradientType=1);width:50%;min-width:180px;margin:0 auto} #vtigerFormSubmitBtn.btn-popup:hover{border-color:#BCE4FF;text-shadow:0 -1px rgba(7,11,73,0.6)} #popupClose{margin-top:2px;margin-left: " + exitLeft + "px;width:16px; height:16px;z-index:199200; display:block;position:absolute;cursor:pointer }#talking-popup{overflow:none}</style>").appendTo("head");
		$(document).mousemove(function (e) {
			$('#exitpopup').css('left', (window.innerWidth / 2 - $('#exitpopup').width() / 2));
			$('#exitpopup').css('top', (window.innerHeight / 2 - $('#exitpopup').height() / 2));
			if (e.pageY <= 5) {
				if (!up) {
					// Show the popup
					$("#exitpopup").prepend('<iframe id="talking-popup" width="740" height="376" frameborder="0" scrolling="no" src="popup-content.php" ?>');
					$('#exitpopup').prepend('<img id="popupClose" src="../../../popup/talkingheads/talkingheads/buttons/ExitBtn-full.png" />');
					$('#exitpopup_bg').fadeIn();
					$('#exitpopup').fadeIn();
					up = true;
				} else {
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
			$('#talking-popup').remove();
			$('#exitpopup_bg').fadeOut();
			$('#exitpopup').slideUp();
		}
	}
});
// Copyright 2017 Website Talking Heads
