<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <META NAME="robots" CONTENT="noindex,nofollow">
	<title>Talking Heads Female Spokesperson</title>
	<meta content="The Video Spokesperson Home Page" name="description">
	<meta content="Learn about our Video Presentations, Website Spokespeople, Animation and Whiteboard videos." name="keywords">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link href="css/videoplayer.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php $name = $_GET["name"];?>
	<div class="player-container">
		<div class="player" id="video-player">
			<video autoplay id="Talking_Heads_Video" muted loop>
      <source src="../videos/<?=$name?>.mp4" type="video/mp4">
      Sorry, your browser does not support HTML5 video.</video>
		 <div class="player-list">
				<div class="control"><i class="fa fa-volume-off" id="muteBtn" title="Mute"></i>
				</div>
				<div class="control" id="volumcontroller"></div>
				<div class="control"><i class="fa fa-2x fa-play-circle-o " id="playpause" title="Play/Pause"></i>
				</div>
				<div class="control progressBar">
					<div class="timeBar"></div>
				</div>
			</div>
		</div>
	</div>
	<script src="wthvideo/specialsPlayer.js"></script>
</body>
</html>