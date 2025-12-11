<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Talking Heads can explain your product, service or procedure in a Blackboard Video! Our Animated Blackboard Videos powerfully expain your product or service step-by-step, and keep your viewers' attention!  Whether you can call it a Sketch Video, Chalkboard Video, Hand Drawing Video, Whiteboard Animation, or Animated Explainer Video Talking Heads&reg; will make the best video for you!">
<meta name="author" content="WebsiteTalkingHeads.com">
<title>Talking Heads®|Testimonials Video</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<link href="../css/videoplayer.css" rel="stylesheet" type="text/css">
</head>
<body><?php
$mute=$_GET[mute];
$autostart=$_GET[autostart];
$url=$_GET[url];
$poster=$_GET[poster];
?>
    <div class="player" id="video-player">
      <video <?php if($autostart){echo 'autoplay ';}
	   if($mute){echo 'loop muted';}
	   ?> id="Talking_Heads_Video"  poster="<?=$poster?>" data-toggle="tooltip" title="Why Choose Talking Heads Video?">
        <source src="<?=$url?>" type="video/mp4">
        Sorry, your browser does not support HTML5video.</video>
      <ul class="player-list">
        <li><i id="playpause" class="fa fa-play-circle-o fa-lg" title="Play/Pause"></i></li>
        <li><i id="muteBtn" class="fa fa-volume-off fa-lg" title="Mute"></i> </li>
        <li id="timeHolder"><span id="current" title="Time">0:00</span> <span id="spacer">/</span> <span id="duration" title="duration">0:00</span></li>
        <li class="progressBar">
          <div class="timeBar"></div>
        </li>
        <li><i id="fullscreen" class="fa fa-arrows-alt fa-lg" title="Fullscreen"></i></li>
      </ul>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> 
<script src="../js/video-home.js"></script> 
</body>
</html>
