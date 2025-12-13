<!DOCTYPE html>
<html lang="en"><head>
	<meta charset="utf-8">
	<title>Custom Animated Video | Website Animation | Video Animation</title>
	<meta name="keywords" content="Animation, Animated Explainer Video, Custom Video.">
	<meta name="description" content="Explain your product, service or procedure in an Animated Explainer Video! Powerfully explain things step-by-step, and keeps your viewers' attention!">
	<meta name="robots" content="index, follow">
	<meta name="author" content="WebsiteTalkingHeads.com">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include("includes/head.php"); ?>
</head>

<body data-video-mpeg="../ivideo/videos/Whiteboard Homepage Blue.mp4" data-fade-in="true">
<div class="spinner-grow text-primary" role="status">
  <span class="sr-only">Loading...</span>
</div>
		<div id="ytVideo"></div>
		<div class="video-overlay"></div>
		<?php include("includes/header-transparent.php"); ?>
	<section>
			<h1 class="banner-text stroke">Cool Whiteboard Videos, Whiteboard Sketch Videos, Drawing Animation too!</h1>
			<div class="fifty center">
				<div class="d-flex justify-content-center pb-5 pt-2">
					<div class="poster" data-toggle="modal" data-target=".bd-example-modal-lg" data-video="Animated Alien Video">
							<div class="btn-play-md"></div>
					</div>
				</div>
				<div class="d-flex justify-content-center">
					<?php include( "includes/animation-captcha.php"); ?>
				</div>
			</div>
		</div>
		</div>
		<h2 class="banner-bottom-text stroke">Hand Drawing Videos, Whiteboard Animation Videos, Sketch, Video Scribe, Cartoon and Doodle Videos.</h2>
	</section>
	<section class="content">
		<div class="container">
			<div class="examples clearfix p-2">
				<?php 
    $type = "Animation";
    $show = "12";
	$rand = false;
	$columns = 3;
    include("includes/showDemoBtn.php"); 
    ?>
			</div>
			<div class="d-box pb-1">
				<a href="../mrss/animation.rss"><img class="mx-auto d-block" src="../mrss/images/Talking-Heads-RSS-Feed.png" width="28" height="28" title="Talking Heads® Animation RSS Feed" alt="Talking Heads® Animation RSS Feed"/></a>
			</div>
	</section>
	<section class="container-fluid">
		<div class="call-now mx-auto">
			<h2 class="display-3 text-primary stroke">CALL NOW to Get Results!</h2>
			<h3 class="display-3 stroke"><a href="tel://1-801-748-2281" title="Give us a call.">801-748-2281</a></h3>
		</div>
		</div>
	</section>
	<section class="content">
		<div class="container">
			<h1 class="banner-bottom-text pt-3">Custom Animation Video</h1>
			<h3 class="text-capitalize text-center">We can describe your product, service or procedure in an Animated Video!</h3>
			<div class="d-flex align-items-center">
				<div class="col-6">
					<img src="https://www.websitetalkingheads.com/images/video-production-banner.png" alt="Best Web Design Agencies- Video Production" class="mt-1 img-fluid mx-auto" title="Best Web Design Agencies- Video Production">
				</div>
				<div class="col-6">
					<p class="content-text">Our Animated Videos will explain your proces step-by-step. We develop custom video material tailored for your organization and marketing objectives.</p>
					<p class="content-text">At Talking Heads® our Animated Videos focus on your message. Great video production and animation is your ticket to increasing your brand awareness and boosting sales.</p>
					<p class="content-text">For more than a decade we've refined the skills and processes for great video production. We consistently craft videos that deliver messages clearly. They have quantifiable outcomes for companies big and small. Our experienced and knowledgeable team will clarifies your message through video.</p>
				</div>
			</div>
		</div>
	</section>
	<section class="container p-2 text-light stroke">
		<?php include( "includes/testimonial-awards.php"); ?>
	</section>
	<section class="content">
		<div class="container">
			<section class="content">
				<div class="container pt-2">
					<h2 class="banner-bottom-text text-center">Animated Video</h2>
					<div class="container p-2">
						<div class="d-flex align-items-center">
							<div class="col-lg-6" id="video-holder">
								<?php 
    $video = "Thing A Ma Bob";
    $bgColor = "#BEBEB2";
    $btnColor = "#6EB478";
	$alt = "Animated Video Example";
    include("includes/showVideo.php"); 
    ?>
							</div>
							<div class="col-6">
								<div class="content-text">Static advertisements with images and text are becoming more dated and irrelevant. Online web videos are the way to go. Those that are able to use the advantages of having a website video will be the ones who will win.</div>
								<div class="content-text">People demand is an entertaining and engaging animated video. That is right. If you look at the videos that dominate social media, they have this blend of engaging, energetic. </div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</section>
	<?php include("includes/footer.php"); ?>

</body>

</html>