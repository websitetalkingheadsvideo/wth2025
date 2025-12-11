// JavaScript Document
$(document).ready(function(){
	"use strict";
	$("#crop").append("<ul></ul>");
	console.log('success');
	$.ajax({
		type: "GET",
		url: "../examples/examples-green-screen.xml",
		dataType: "xml",
		success: function(xml) {
			$(xml).find('example').each(function(){
			var name = $(this).find('name').text();
			var target = $(this).find('target').text();
			$("<li></li>").html('<img src="http://www.websitetalkingheads.com/examples/Images/'+target+'.gif">').appendTo("#crop ul");
			});
		}
	});
});