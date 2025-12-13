window.onload = function() {
	createVideo();
};

function createVideo() {
	var videoMpeg 	= document.body.dataset.videoMpeg;
	var videoOgg 	= document.body.dataset.videoOgg;
	var videoWebm 	= document.body.dataset.videoWebm;
    var ytVideo     = document.getElementById('ytVideo');

	var video = document.createElement('video');
	video.setAttribute('preload', 	'auto');
	video.setAttribute('autoplay', 	'true');
	video.setAttribute('loop', 		'loop');
	video.setAttribute('muted', 	'muted');
	video.setAttribute('volume', 	'0');
	video.setAttribute('id',		'bgVideo');

	var sourceMpeg = document.createElement('source');
	sourceMpeg.setAttribute('src', 		videoMpeg);
	sourceMpeg.setAttribute('type', 	'video/mp4');

	var sourceOgg = document.createElement('source');
	sourceOgg.setAttribute('src', 		videoOgg);
	sourceOgg.setAttribute('type', 		'video/ogg');

	var sourceWebm = document.createElement('source');
	sourceWebm.setAttribute('src', 		videoWebm);
	sourceWebm.setAttribute('type', 	'video/webm');

	if(videoWebm) video.appendChild(sourceWebm);
	if(videoOgg)  video.appendChild(sourceOgg);
	if(videoMpeg) video.appendChild(sourceMpeg);
    video.appendChild(document.createTextNode('Sorry, your browser does not support HTML5 video.'));

    ytVideo.appendChild(video);
    muteVideo();
}

function unmuteVideo() {
	if(player) {
		player.unMute();
	} else {
		var video = document.getElementById('bgVideo');
		video.muted = false;
	}
}

function muteVideo() {
	if(player) {
		player.mute();
	} else {
		var video = document.getElementById('bgVideo');
		video.muted = true;
	}
}

function playVideo() {
	if(player) {
		player.playVideo();
	} else {
		var video = document.getElementById('bgVideo');
		video.play();
	}
}

function pauseVideo() {
	if(player) {
		player.pauseVideo();
	} else {
		var video = document.getElementById('bgVideo');
		video.pause();
	}
}

function stopLoopVideo() {
	if(player) {
		youtubeStopLooping();
	} else {
		var video = document.getElementById('bgVideo');
		video.loop = false;
	}
}

function startLoopVideo() {
	if(player) {
		youtubeStartLooping();
	} else {
		var video = document.getElementById('bgVideo');
		video.currentTime = 0;
		video.loop = true;
		video.play();
	}
}