<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <TITLE>Video Spokesperson Specials Website Spokesperson Specials</TITLE>
  <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
  <meta name="keywords" content="online spokesperson, video spokesperson, website talking heads, website actor, website video, transparent flash, virtual spokesperson, spokesperson, video presenter, website presenter, website spokesperson, video salesperson">
  <meta name="description" content="Online video spokesperson.  For only $199, add a virtual spokesperson to your website.  An online presenter can increase traffic conversion rates on your website.  Integrate flash video, website video, website actor and objects to create dynamic streaming video and easily add it your existing website.">
  <META NAME="robots" CONTENT="index, follow">
  <!-- (Robot commands: All, None, Index, No Index, Follow, No Follow) -->
  <META NAME="revisit-after" CONTENT="30 days">
  <META NAME="distribution" CONTENT="global">
  <META NAME="rating" CONTENT="general">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <META NAME="Content-Language" CONTENT="english">
  <meta name="verify-v1" content="YNESpqoAwK51PmBV7/PFKLG0agx7AQPKhXXcYAXGGF8=" />
  <meta name="norton-safeweb-site-verification" content="iinbv24r-1ix20hgj5l94wz2rnn3aiwi0336hwysvvpiskquy6ijsh9wy12f3znbed-hz1ay8ppzhgqap-sicqtw6ui29d0wrfcpenudh1ml9xwjbej7u25xy9pnm6yr" />
  <meta name="keywords" content="online spokesperson, video spokesperson, website talking heads, website actor, website video, transparent flash, virtual spokesperson, spokesperson, video presenter, website presenter, website spokesperson, video salesperson">
  <meta name="description" content="Our Featured video spokespeople.  For only $199, add a virtual spokesperson to your website.  An online presenter can increase traffic conversion rates on your website.  Integrate flash video, website video, website actor and objects to create dynamic streaming video and easily add it your existing website.">
  <link href="http://www.websitetalkingheads.com/css/styles.css" rel="stylesheet" type="text/css" />
  <link href="http://www.websitetalkingheads.com/css/examples.css" rel="stylesheet" type="text/css" />
  <link href="http://www.websitetalkingheads.com/css/fluid.css" rel="stylesheet" type="text/css" />
  <!-- // <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script> -->
  <!-- // <script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.1.0.js"></script>  -->
  <link rel="stylesheet" type="text/css" href="../lightbox/js/lightbox/themes/default/jquery.lightbox.css" />
  <link href="../css/style.css" rel="stylesheet" type="text/css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <!--[if IE 6]>
  <link rel="stylesheet" type="text/css" href="js/lightbox/themes/default/jquery.lightbox.ie6.css" />
  <![endif]-->
  <script type="text/javascript" src="../lightbox/js/lightbox/jquery.lightbox.min.js"></script>
  <!-- // <script type="text/javascript" src="src/jquery.lightbox.js"></script>   -->
  <script type="text/javascript">
    jQuery(document).ready(function($){
      $('.lightbox').lightbox();
    });
  </script>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <?php
	$url = 'http://websitetalkingheads.com/featuredactor/featuredactor.xml';
	$xml = simplexml_load_file($url);
	$male=$xml->male;
	$female=$xml->female;
	$newdate=$xml->newdate;
?>
  </head>
  <body>

<section id="Featured Actors" class="section dark">
    <div id="specials">
    <div class="container">
        <div class="row row-centered">
        <div class="col-md-4 col-centered vidHolder">
            <div id="wthvideoMale"></div>
            <h3 >
            <div id="male">
                <?=$male?>
              </div>
          </h3>
          </div>
        <div class="col-md-4 col-centered textHolder">
            <h3>NO HIDDEN FEES<BR />
            NO ANNUAL FEES<BR />
            NO HOSTING FEES<BR />
            <span class="highlight">This is it!</span></h3>
          </div>
        <div class="col-md-4 col-centered vidHolder">
            <div id="wthvideoFemale"></div>
            <h3>
            <div id="female">
                <?=$female?>
              </div>
          </h3>
          </div>
      </div>
      </div>
  </div>
  </section>
<script type="text/javascript" src="http://websitetalkingheads.com/specials/wthvideo/male.js"></script> 
<script type="text/javascript" src="http://websitetalkingheads.com/specials/wthvideo/female.js"></script>
</body>
</html>