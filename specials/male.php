<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <META NAME="robots" CONTENT="noindex,nofollow">
	<title>Talking Heads Male Spokesperson</title>
	<meta content="The Video Spokesperson Home Page" name="description">
	<meta content="Learn about our Video Presentations, Website Spokespeople, Animation and Whiteboard videos." name="keywords">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet">
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
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbOW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="wthvideo/specialsPlayer.js"></script>
</body>
</html>