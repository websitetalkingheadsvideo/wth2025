<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="index, follow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="English">
<meta name="revisit-after" content="30 days">
<meta name="author" content="TalkingHeads.com">
<title>eLearning Videos from Talking Heads&reg;</title>
<meta name="title" content="eLearning Videos from Talking Heads">
<meta name="description" content="We can describe your product, service or procedure in an eLearning Video! Our eLearning Videos focus on your message.">
<meta name="keywords" content="eLearning Corporate Videos, eLearning Explainer Video, eLearning Explainer Videos, eLearning Whiteboard Videos, eLearning Video, eLearning">
<?php include("../../includes/css-b4.php"); ?>
<link href="../elearning/css/styles.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php include("../../includes/header25.php"); ?>
<header class="header-video">
<div class="overlay"></div>
<video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
    <source src="https://www.websitetalkingheads.com/ivideo/videos/eLearning Actors.mp4" type="video/mp4">
</video>
<div class="container-fluid h-100">
<div class="container-fluid" style="min-height: 24rem">
    <div class="row text-center" style="min-height: 24rem">
        <div class="text-white col-lg-9">
            <h1 class="display-4 wow bounceInDown">eLearning Videos</h1>
            <p class="lead mb-0 wow bounceInUp">With Professional Spokespeople</p>
        </div>
        <div class="col-lg-3 my-auto">
            <?php include("../../forms/contact-card.php")?>
        </div>
    </div>
</div>
</header>
<section class="pb-5 bg-light">
    <h1 class="text-center pt-1">eLearning Examples</h1>
    <div class="alert alert-info">
        <div id="stallion">
            <iframe id="oil" name="Stallion Oil" allowfullscreen="0" src="https://www.websitetalkingheads.com/styles/elearning/Stallion%20Oil%20-%20Storyline%20output/story.html" ></iframe>
        </div>
    </div>
</section>
<section class="container-fluid bg-light py-2">
    <div class="card wow zoomIn">
        <h5 class="card-header bg-gradient-mine text-white text-center text-uppercase">Custom eLearning Videos</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <h6 class="card-title">eLearning Provides</h6>
                    <ul class="list-group">
                        <li class="list-group-item">Reduced Cost</li>
                        <li class="list-group-item">Flexibility</li>
                        <li class="list-group-item">Mobility</li>
                        <li class="list-group-item">Self-Pacing</li>
                        <li class="list-group-item">Global</li>
                        <li class="list-group-item">Engagement</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <h6 class="card-title">You Get</h6>
                    <ul class="list-group">
                        <li class="list-group-item">Custom Graphics</li>
                        <li class="list-group-item">Professional Video Spokesperson</li>
                        <li class="list-group-item">Skilled Editing and Compositing</li>
                        <li class="list-group-item">Motion Design</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="alert alert-info mt-4">
</section>
<?php include("../../includes/footer25.php"); ?>
<?php include("elearning-content.php");?>
<script>
 $(document.getElementById('oil').contentWindow.document).ready(function() {
	 var oil = $('#oil').contents().find('head');
	 console.log( oil );
      $('oil').contents().find('head').append('<link rel="stylesheet" href="../custom.css" type="text/css" />');
 });
	</script>
</body>
</html>