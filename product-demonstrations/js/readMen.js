// JavaScript Document
$(document).ready(function () {
	"use strict";
	var theElement = "#men";
	$.ajax({
		url: "../spokespeople/maleactors.xml",
		dataType: "xml",
		success: parse,
		error: function () {
			alert("Error: Something went wrong");
		}
	});

	function parse(document) {
		var x = 0;
		var actor = Array();
		var thumb = '<div class="thumb-wrapper"></div>';
		var overlay = '<div class="overlay img-circle"></div>';
		var close = '</div>';
		$(document).find('item').each(function () {
			actor[x] = $(this).attr('caption');
			var holder = "<div class='col-sm-4 actor'  title='" + actor[x] + "'  data-actor='" + actor[x] + "'>";
			var img = "<img src='http://websitetalkingheads.com/carimages/" + actor[x] + ".png' class='img-responsive center-block' alt='" + actor[x] + "'/>";
			var thisAppend = holder + thumb + overlay + img + close;
			$(theElement).append(thisAppend);
			x++;
		});
	}
});
