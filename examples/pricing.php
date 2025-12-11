<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Website Talking Heads - Add an Online Video Spokesperson to Your Website, Virtual Spokesperson, Website Video Spokesperson, Web Spokesperson, Website Actor</title>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1" />
<meta name="keywords" content="online spokesperson, video spokesperson, website talking heads, website actor, website video, transparent flash, virtual spokesperson, spokesperson, video presenter, website presenter, website spokesperson, video salesperson" />
<meta name="description" content="Online video spokesperson.  For only $199, add a virtual spokesperson to your website.  An online presenter can increase traffic conversion rates on your website.  Integrate flash video, website video, website actor and objects to create dynamic streaming video and easily add it your existing website." />
<META NAME="robots" CONTENT="index, follow" />
<!-- (Robot commands: All, None, Index, No Index, Follow, No Follow) -->
<META NAME="revisit-after" CONTENT="30 days" />
<META NAME="distribution" CONTENT="global" />
<META NAME="rating" CONTENT="general" />
<META NAME="Content-Language" CONTENT="english" />
<meta name="verify-v1" content="YNESpqoAwK51PmBV7/PFKLG0agx7AQPKhXXcYAXGGF8=" />
<meta name="norton-safeweb-site-verification" content="iinbv24r-1ix20hgj5l94wz2rnn3aiwi0336hwysvvpiskquy6ijsh9wy12f3znbed-hz1ay8ppzhgqap-sicqtw6ui29d0wrfcpenudh1ml9xwjbej7u25xy9pnm6yr" />
<link href="../styles.css" rel="stylesheet" type="text/css" />
<?php include ('../includes/googleanalytics.php'); ?>
<link href="../css/product-pricing.css" rel="stylesheet" type="text/css" />
<script src="//use.typekit.net/dib0cib.js"></script>
<script>try{Typekit.load();}catch(e){}</script>
</head>
<body>
<?php
	$url = 'https://websitetalkingheads.com/featuredactor/featuredactor.xml';
	$xml = simplexml_load_file($url);
	$male=$xml->male;
	$female=$xml->female;
	$newdate=$xml->newdate;
	$h = date('G'); //set variable $h to the hour of the day
	$d = date('w'); //set variable $d to the day of the week.
	$year = date('Y'); //set variable $year to the current year
	//G is the date key for hours in 24 format (not 12), with no leading 0s, like 02.
	if ($d == 5 && $h >= 7 && $h < 19) $SpecialMessage = "Ends Today!";
	else  $SpecialMessage = "This Offer Expires Friday, " . $newdate;
        ?>
<div id="container">
  <?php include ('../includes/header.php'); ?>
  <h1>Talking Heads Pricing</h1>
  <div class="spokesperson pricing">
    <div class="left website-spoksperson-price">
      <h2>Website Spokesperson</h2>
      <div class="15-second price">
        <div class="video-length">15 Seconds</div>
        <div class="video-cost">$199</div>
      </div>
      <div class="30-second price">
        <div class="video-length">30 Seconds</div>
        <div class="video-cost">$299</div>
      </div>
      <div class="longer price">
        <div class="video-length">Longer</div>
        <div class="video-cost">CALL</div>
      </div>
    </div>
    <div class="left greenscreen-video-price">
      <h2>Green Screen Video</h2>
      <div class="15-second price">
        <div class="video-length">15 Seconds</div>
        <div class="video-cost">$199</div>
      </div>
      <div class="30-second price">
        <div class="video-length">30 Seconds</div>
        <div class="video-cost">$299</div>
      </div>
      <div class="longer price">
        <div class="video-length">Longer</div>
        <div class="video-cost">CALL</div>
      </div>
    </div>
    <div class="left basic-video-price">
      <h2>Basic Video</h2>
      <div class="15-second price">
        <div class="video-length">15 Seconds</div>
        <div class="video-cost">$199</div>
      </div>
      <div class="30-second price">
        <div class="video-length">30 Seconds</div>
        <div class="video-cost">$299</div>
      </div>
      <div class="longer price">
        <div class="video-length">Longer</div>
        <div class="video-cost">CALL</div>
      </div>
    </div>
  </div>
  <div class="c"></div>
  <div class="video pricing">
    <div class="left custom-video-price">
      <h2>Custom Video Presentation</h2>
      <div class="call-for-quote price">
        <div class="video-length">Call for</div>
        <div class="video-cost">Quote</div>
      </div>
    </div>
    <div class="left whiteboard-video-price">
      <h2>Whiteboard Video</h2>
      <div class="call-for-quote price">
        <div class="video-length">Call for</div>
        <div class="video-cost">Quote</div>
      </div>
    </div>
    <div class="left animated-explainer-price">
      <h2>Animated Explainer Video</h2>
      <div class="call-for-quote price">
        <div class="video-length">Call for</div>
        <div class="video-cost">Quote</div>
      </div>
    </div>
  </div>
  <div class="c"></div>
  <?php include("../forms/requestQuote.php"); ?>
  <?php include ('../includes/footer.php'); ?>
</div>
<br />
</div>
<?php include ('../includes/chatform.php'); ?>
<script type="text/javascript" src="https://www.websitetalkingheads.com/pricing/wthvideo/pricing.js"></script>
</body>
</html>