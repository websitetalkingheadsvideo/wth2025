// JavaScript Document
$(document).ready(function () {
	var video = $("#talking-heads-video")[0];
	var srcBase = "https://www.websitetalkingheads.com/";
	var name, alt, srcVideo;
	$(".poster").click(function () {
		name = $(this).attr("data-video");
		srcVideo = srcBase + "videos/" + name + ".mp4";
		if (!$(this).attr("alt")) {
			alt = "";
		} else {
			alt = $(this).attr("alt");
		}
		showVideo();
	});

	function showVideo() {
		$('#videoModalLabel').text(alt);
		video.pause();
		video.src = srcVideo;
		video.play();
	}
	$('#contact').click(function () {
		video.pause();
		$('#form').addClass('visible');
		$('#form').removeClass('invisible');
	});
	$('#contactClose').click(function () {
		$('#form').removeClass('visible');
		$('#form').addClass('invisible');
	})
	$('#mainModal').on('hidden.bs.modal', function () {
		video.pause();
	});
	$('#mainModal').on('shown.bs.modal', function () {
		$('#form').removeClass('visible');
		$('#form').addClass('invisible');
		video.play();
	});
});
