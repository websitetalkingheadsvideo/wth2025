// JavaScript Document
$(document).ready(function () {
	var holder = $("#talking-heads-video");
	var video = holder[0];
	var srcBase = "https://www.websitetalkingheads.com/";
	var name, alt, srcVideo;
	$(".actor").click(function () {
		name = $(this).attr("data-video");
		srcVideo = srcBase + "videos/" + name + ".mp4";
		if (!$(this).attr("alt")) {
			alt = "";
		} else {
			alt = " - " + $(this).attr("alt");
		}
		showVideo();
	});
	$(".poster").click(function () {
		name = $(this).attr("data-video");
		srcVideo = srcBase + "ivideo/videos/" + name.replace(/ /g,"%20") + ".mp4";
		console.log( srcVideo );
		if (!$(this).attr("alt")) {
			alt = "";
		} else {
			alt = " - " + $(this).attr("alt");
		}
		showVideo();
	});

	function showVideo() {
		$('#videoModalLabel').text(name + alt);
		video.pause();
		video.src = srcVideo;
		video.play();
	}
	$('#contact').click(function () {
		video.pause();
		$('#form').addClass('d-block');
//		$('#form').css("left", formLeft);
	});
	$('#contactClose').click(function () {
		$('#form').removeClass('d-block');
	})
	$('#mainModal').on('hidden.bs.modal', function () {
		video.pause();
	});
	$('#mainModal').on('shown.bs.modal', function () {
		$('#form').removeClass('d-block');
		video.play();
	});
});
