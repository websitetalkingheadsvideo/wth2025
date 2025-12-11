// JavaScript Document
var winWidth,w,h;
$(document).ready(function () {
	"use strict";
	lightboxWidth();
});

$(window).resize(function () {
	"use strict";
	lightboxWidth();
});

function lightboxWidth() {
	"use strict";
	winWidth = $(window).width();
	if (winWidth > 1200) {
		w = 1200;
		h = 720;
	} else {
		w = parseInt(winWidth * 0.8);
		h = parseInt(w * 0.5625);
	}
	$('.lightbox').lightbox({
		width: w,
		height: h
	});
}
