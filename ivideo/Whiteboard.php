<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Talking Heads Custom Video Presentation">
    <meta name="author" content="WebsiteTalkingHeads.com">
    <title>Talking Heads® Video</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link href="css/videoplayer.css" rel="stylesheet" type="text/css">
    
<!-- Global site tag (gtag.js) - Google Ads: 1058129782 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-1058129782"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-1058129782');
</script>
<!-- Event snippet for Previous Visitors remarketing page -->
<script>
  gtag('event', 'conversion', {
      'send_to': 'AW-1058129782/-jOyCO6ZkAIQ9o7H-AM',
      'aw_remarketing_only': true
  });
</script>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-2M90SHW0ZX"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-2M90SHW0ZX');
</script>
</head>

<body>
    <?php
    $mute = $_GET[ mute ];
    $autostart = $_GET[ autostart ];
    $video = $_GET[ video ];
    $poster = "videos/" . $video . ".jpg";
    $video = "videos/" . $video . ".mp4";
    $color = $_GET[ color ];
    if(!$color){$color="#333";};
    if ( autostart === true ) {
        $videoVars = "autoplay";
    }
    if ( mute === true ) {
        $videoVars = $videoVars . " loop muted";
    }
    ?>
    <div class="player" id="video-player">
        <video <?=$videoVars?> id="Talking_Heads_Video"  poster="<?=$poster?>" data-toggle="tooltip" title="Why Choose Talking Heads Video?">
        <source src="<?=$video?>" type="video/mp4">
        Sorry, your browser does not support HTML5video.
        <div id="color"><?=$color?></div>
        </video>
        <ul class="playerBar">
            <li><i id="playpause" class="fa fa-play-circle-o fa-lg" title="Play/Pause"></i>
            </li>
            <li><i id="muteBtn" class="fa fa-volume-off fa-lg" title="Mute"></i> </li>
            <li id="timeHolder"><span id="current" title="Time">0:00</span> <span id="spacer">/</span> <span id="duration" title="duration">0:00</span>
            </li>
            <li class="progressBar">
                <div class="timeBar"></div>
            </li>
            <li><i id="fullscreen" class="fa fa-arrows-alt" title="Fullscreen"></i>
            </li>
        </ul>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="ivideo.js"></script>
</body>

</html>