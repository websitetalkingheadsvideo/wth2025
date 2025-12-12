<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Talking Heads | eLearning Video - Add an Online Video Spokesperson to Your Video Project</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="img/assets/favicon.png" rel="icon" type="image/png">
  <link href="css/init.css" rel="stylesheet" type="text/css">
  <link href="css/ion-icons.min.css" rel="stylesheet" type="text/css">
  <link href="css/etline-icons.min.css" rel="stylesheet" type="text/css">
  <link href="css/theme.css" rel="stylesheet" type="text/css">
  <link href="css/custom.css" rel="stylesheet" type="text/css">
  <link href="css/colors/purple.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CRaleway:400,100,200,300%7CHind:400,300" rel="stylesheet" type="text/css">
  <link href="css/arrow-bounce.css" rel="stylesheet" type="text/css">
  <link href="../lightbox/js/lightbox/themes/default/jquery.lightbox.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script>
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-3598588-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</head>
<body data-fade-in="true">

<!-- Start Header -->
<nav class="navbar nav-down" data-fullwidth="true" data-menu-style="transparent" data-animation="shrink"><!-- Styles: light, dark, transparent | Animation: hiding, shrink -->
  <div class="container">
    <div class="navbar-header">
      <div class="container">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar top-bar"></span>
        <span class="icon-bar middle-bar"></span>
        <span class="icon-bar bottom-bar"></span>
        </button>
        <a class="navbar-brand to-top" href="#">
          <img src="img/assets/logo-light.png" class="logo-light" alt="#">
          <img src="img/assets/logo-dark.png" class="logo-dark" alt="#">
        </a>
      </div>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <div class="container">
        <ul class="nav navbar-nav menu-right">
          
          <!-- Each section must have corresponding ID ( #hero -> id="hero" ) -->
          <li>
            <a href="index.html">Home</a>
          </li>
          <li>
            <a href="#contact">Contact</a>
          </li>
          <li class="nav-separator"></li>
          <li  class="nav-icon">
            <a href="https://www.facebook.com/websitetalkingheads/" target="_blank"><i class="ion-social-facebook"></i></a>
          </li>
          <li  class="nav-icon">
            <a href="https://twitter.com/TalkingHeadsVid" target="_blank"><i class="ion-social-twitter"></i></a>
          </li>
          <li  class="nav-icon">
            <a href="http://linkedin.com" target="_blank"><i class="ion-social-linkedin"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
<!-- End Header -->

<!-- Hero -->
<section id="hero" class="hero-fullscreen parallax return" data-overlay-dark="6">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center">
        <h1>Our Actors<br>
          <strong>Professionals</strong></h1>
        <p class="lead mb40">We have a wide variety of professional actors which encompass many different styles of articulating the message of the customer.  You will be able to find an actor which best represents the message and vision you are looking to communicate.</p>
      </div>
    </div>
  </div>
</section>
<!-- End Hero -->
<section id="team" class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="row spokespeople">
          <h2 class="pageinfo">Female Actors</h2>
          <div id="women">
            <?php $carousel = "female1"; include("../elearning/includes/demo.php"); ?>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="row spokespeople">
          <h2 class="pageinfo">Male Actors</h2>
          <div id="men">
            <?php $carousel = "male"; include("../elearning/includes/demo.php"); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="parallax pt40 pb40" data-overlay-dark="8">
  <div class="background-image">
    <img src="img/backgrounds/bg-2.jpg" alt="#">
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h2>Let Us <strong>Know</strong></h2>
        <p class="lead">How you want <span class="color">The Actor Positioned</span>.</p>
      </div>
      <div class="dark-pagination col-md-12">
        <div class="row">
          <div class="col-md-3">
            <img src="img/team/1.gif" class="img-responsive" alt="#" />
            <h5>Full Body</h5>
          </div>
          <div class="col-md-3">
            <img src="img/team/2.gif" class="img-responsive" alt="#" />
            <h5>Close Up</h5>
          </div>
          <div class="col-md-3">
            <img src="img/team/3.gif" class="img-responsive" alt="#" />
            <h5>Three Quarter</h5>
          </div>
          <div class="col-md-3">
            <img src="img/team/4.gif" class="img-responsive" alt="#" />
            <h5>Half Body</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Team -->

<!-- Contact Info -->
<section id="contact" class="parallax pt110 pb70" data-overlay-dark="8">
  <div class="background-image">
    <img src="img/backgrounds/bg-8.jpg" alt="#">
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12 details white text-center">
        <div class="phone-number mb10">
          <h1 class="bold">801-748-2281</h1>
        </div>
        <div class="col-lg-12">
          <h3>sales@<span class="color">websitetalkingheads.com</span></h3>
          <h4>245 W. 9000 S. Sandy, <span class="color">UT 84070</span></h4>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Contact Info -->

<!-- Contact Form -->
<section class="pt120 pb100">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center pb20">
        <h2>Get In Touch<br>
          <strong>Contact Us</strong></h2>
        <p class="lead">We would like to <span class="color">hear from you</span></p>
      </div>
      <div class="col-md-8 col-md-offset-2" id="contact">
        <?php include("../elearning/includes/contact.php"); ?>
      </div>
    </div>
  </div>
</section>
<!-- End Contact Form -->

<!-- Start Footer -->
<footer id="footer" class="footer style-1 dark">
  <a href="index.html">
    <img src="img/assets/footer-logo.png" alt="#" class="mr-auto img-responsive">
  </a>
  <ul>
    <li>
      <a href="https://www.twitter.com/" target="_blank" class="color"><i class="ion-social-twitter"></i></a>
    </li>
    <li>
      <a href="https://www.facebook.com/" target="_blank" class="color"><i class="ion-social-facebook"></i></a>
    </li>
    <li>
      <a href="https://www.linkedin.com/company/websitetalkingheads.com/" target="_blank" class="color"><i class="ion-social-linkedin"></i></a>
    </li>
    <li>
      <a href="https://www.pinterest.com/websitetalkingheadsvideo" target="_blank" class="color"><i class="ion-social-pinterest"></i></a>
    </li>
    <li>
      <a href="https://goo.gl/Wuj6Gm" target="_blank" class="color"><i class="ion-social-youtube"></i></a>
    </li>
  </ul>
  <a href="index.html"><strong>© 2007-2016 WebsiteTalkingHeads.com</strong></a>
  <p>All Rights Reserved.</p>
  
  <!-- Back To Top Button -->
  <span>
  <a class="scroll-top"><i class="ion-chevron-up"></i></a>
  </span>
</footer>
<!-- End Footer -->
<script  src="../lightbox/js/lightbox/jquery.lightbox.min.js"></script>
<script>
	$('#women').click(function(e){
		var whatClicked = e.target.parentElement;
		openVideo(whatClicked);
	});
	$('#men').click(function(e){
		var whatClicked = e.target.parentElement;
		openVideo(whatClicked);
	});

function openVideo(whatClicked) {
    var platform = navigator.platform;
    var name = $(whatClicked).attr("data-actor");
    var html = $("<video id='video1' playsinline autoplay controls><source src='https://www.websitetalkingheads.com/videos/" + name +
        ".mp4' type='video/mp4'>Your browser does not support the video tag.</video>");
    if (platform === "iPhone") {
        $(".spokespeople").prepend(html);
        $("#video1").get(0).play();
        $('#video1').on('ended', function() {
            $('#video1').remove();
        });
    } else {
        $.lightbox(html, {
            width: 540,
            height: 368,
            title: $(this).attr("title")
        });
        $('#video1').ready(function() {
            setTimeout(function(){
              var player = $("#video1")[0];
              console.log( player );
                  console.log( "hit" );
                  player.play();
           }, 2000);
        });
    };
};	
</script>
<!-- Google Code for Previous Visitors -->
<!-- Remarketing tags may not be associated with personally identifiable 
information or placed on pages related to sensitive categories. For 
instructions on adding this tag and more information on the above 
requirements, read the setup guide: google.com/ads/remarketingsetup -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1058129782;
var google_conversion_label = "-jOyCO6ZkAIQ9o7H-AM";
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" 
src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
  <img height="1" width="1" style="border-style:none;" alt="" 
src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1058129782/?value=0&amp;label=-jOyCO6ZkAIQ9o7H-AM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbOW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>