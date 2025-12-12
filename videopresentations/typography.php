<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- InstanceBegin template="/Templates/NewPhp.dwt.php" codeOutsideHTMLIsLocked="false" -->
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!-- InstanceBeginEditable name="doctitle" -->
  <title>Virtual Set Video | Sales Video | Video Advertising</title>
  <!-- InstanceEndEditable -->
  <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
  <meta name="keywords" content="online spokesperson, video spokesperson, website talking heads, website actor, website video, transparent flash, virtual spokesperson, spokesperson, video presenter, website presenter, website spokesperson, video salesperson">
  <meta name="description" content="Online video spokesperson.  For only $199, add a virtual spokesperson to your website.  An online presenter can increase traffic conversion rates on your website.  Integrate flash video, website video, website actor and objects to create dynamic streaming video and easily add it your existing website.">
  <META NAME="robots" CONTENT="index, follow">
  <!-- (Robot commands: All, None, Index, No Index, Follow, No Follow) -->
  <META NAME="revisit-after" CONTENT="30 days">
  <META NAME="distribution" CONTENT="global">
  <META NAME="rating" CONTENT="general">
  <META NAME="Content-Language" CONTENT="english">
  <meta name="verify-v1" content="YNESpqoAwK51PmBV7/PFKLG0agx7AQPKhXXcYAXGGF8=" />
  <meta name="norton-safeweb-site-verification" content="iinbv24r-1ix20hgj5l94wz2rnn3aiwi0336hwysvvpiskquy6ijsh9wy12f3znbed-hz1ay8ppzhgqap-sicqtw6ui29d0wrfcpenudh1ml9xwjbej7u25xy9pnm6yr" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="http://websitetalkingheads.com/css/fluid.css" rel="stylesheet" type="text/css" />
  <link href="http://websitetalkingheads.com/css/style.css" rel="stylesheet" type="text/css" />
  <!-- InstanceBeginEditable name="head" -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link href="../css/examples.css" rel="stylesheet" type="text/css" />
  <script src="../js/jquery-1.7.2.min.js" type="text/javascript"></script>
  <!-- // <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script> -->
  <!-- // <script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.1.0.js"></script>  -->
  <link rel="stylesheet" type="text/css" href="../lightbox/js/lightbox/themes/default/jquery.lightbox.css" />
  <!--[if IE 6]>
  <link rel="stylesheet" type="text/css" href="js/lightbox/themes/default/jquery.lightbox.ie6.css" />
  <![endif]-->
  <script type="text/javascript" src="../lightbox/js/jquery.min.js"></script>
  <script type="text/javascript" src="../lightbox/js/lightbox/jquery.lightbox.min.js"></script>
  <!-- // <script type="text/javascript" src="src/jquery.lightbox.js"></script>   -->
  <script type="text/javascript">
    jQuery(document).ready(function($){
      $('.lightbox').lightbox();
    });
  </script>
  <script type="text/javascript" src="http://www.websitetalkingheads.com/videopresentations/includes/examples.js"></script>
  <!-- InstanceEndEditable -->
  </head>
  <body>
  <!-- InstanceBeginEditable name="MainContent" -->
  <?php

// displays all the file nodes
if(!$xml=simplexml_load_file('http://www.talkingheadswebsite.com/examples.xml')){
    trigger_error('Error reading XML file',E_USER_ERROR);
}
$myCount = $xml->count();
$myStop = rand(1, $myCount-1);
$i=0;
foreach($xml as $example){
$target[$i] = $example->target;
$video[$i] = str_replace("'", "", $example->name);
$i++;
}

?>
  <?php include ('../includes/header25.php'); ?>
  <section class="vp">
    <h1 class="exampleTitle">Typography Videos</h1>
    <div class="powerpunch">
      <h2 id="powerpunchsales">Custom Typography Videos!</h2>
      <h2 id="powerpunchseo">Custom Typography Videos Catch your visitors' attention and give them a reason to stay on your site.</h2>
    </div>
    </section>
  <section class="vp">
    <div class="row center-block">
      <div class="col-md-5">
        <h2>Easy As 1-2-3</h2>
        <ol class="easy">
          <li>Send us your script and 4 images.</li>
          <li>Choose an Actor and Music.</li>
          <li>We do the rest!</li>
        </ol>
      </div>
      <div class="col-md-3">
        <div align="center"><img src="../images/VideoProduction60.gif" width="166" height="163" alt="Best in Video Production"  id="BestInSearch" onmouseover="onBestInSearch()" onmouseout="outBestInSearch()" /> </div>
      </div>
      <div class="col-md-4">
        <h4>Custom Typography Video</h4>
        <div class="smallScript">Starting at Just</div>
        <h6 div class="move-up">$399</h6>
      </div>
    </div>
    <div class="clearSpace"></div>
  </section>
  <section class="container">
    <h2>Click Below to View Sample Typography Videos</h2>
    <?php include ('includes/examples-typographyFull.php'); ?>
    <div class="c"></div>
   <div class="RSS-Feed"> <a href="http://websitetalkingheads.com/mrss/typography.rss" target="new"><img src="../mrss/images/Talking-Heads-RSS-Feed.png" width="28" height="28" title="Talking Heads Virtual Sets RSS Feed" alt="Talking Heads Virtual Sets RSS Feed"/></a> </div>
    
    
    </section>
    <section class="step">
    <h3 class="hidden">3 Simple Steps</h3>
    <h3 id="step-top-text">It's As Simple As 1 - 2 - 3</h3>
    <div class="col-sm-6 step-left">
        <ul>
        <li>
            <h4 class="step1 price-btn">Step 1: Choose Your Package</h4>
          </li>
        <li>
            <h4 class="step2 price-btn">Step 2: Video Planning Session</h4>
          </li>
        <li>
            <h4 class="step3 price-btn">Step 3: Receive Your Video</h4>
          </li>
      </ul>
      </div>
    <div class="col-sm-6 step-right">
        <ul>
        <li><strong>Step 1</strong><br />
            Purchase the package that will help you best reach your business goal. We recommend giving us call.</li>
        <li><strong>Step 2</strong><br />
            Once you have purchased your package, we will have a creative and strategic consultation where together we will decide what text, images or graphics will appear with the spokesperson.</li>
        <li><strong>Step 3</strong><br />
            2 to 3 weeks after providing us with your specific logos,  any other visual elements decided upon, you will receive your completed video.</li>
      </ul>
      </div>
    <div class="c"></div>
  </section>
  <?php include ("../includes/CallForQuote.php");?>
  <?php include ('http://websitetalkingheads.com/forms/requestQuote.php'); ?>
  <?php include ('../includes/footer25.php'); ?>
  <?php include ('../includes/chatform.php'); ?>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbOW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd -->
</html>