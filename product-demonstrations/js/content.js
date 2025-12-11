// JavaScript Document
$(document).ready(function () {
	"use strict";
	$.ajax({
		url: "js/content.xml",
		dataType: "xml",
		success: parse,
		error: function () {
			alert("Error: Something went wrong");
		}
	});

	function parse(document) {
		var x = 0;
		var paragraph = Array();
		var title = Array();
		var random2 = null;
		var random3 = null;
		$(document).find('content').each(function () {
			title[x] = $(this).find('title').text();
			paragraph[x] = $(this).find('paragraph').text();
			x++;
		});
		var random = Math.floor(Math.random() * paragraph.length);
		$("#elearning-title").text(title[random]);
		$("#elearning-title").addClass('text-center');
		$("#elearning-content").append("<p>" + paragraph[random] + "</p>");
		$("#elearning-content").addClass('important');
		random2 = random+1;
		if(random2>paragraph.length-1){random2=0;}
		$("#elearning-title2").text(title[random2]);
		$("#elearning-title2").addClass('text-center');
		$("#elearning-content2").append("<p>" + paragraph[random2] + "</p>");
		$("#elearning-content2").addClass('important');

		random3 = random2+1;
		if(random3>paragraph.length-1){random3=0;}
		$("#elearning-title3").text(title[random3]);
		$("#elearning-title3").addClass('text-center');
		$("#elearning-content3").append("<p>" + paragraph[random3] + "</p>");
		$("#elearning-content3").addClass('important');

	}
});