<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/NewPhp.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Website Talking Heads - Add an Online Video Spokesperson to Your Website, Virtual Spokesperson, Website Video Spokesperson, Web Spokesperson, Website Actor</title>
<!-- InstanceEndEditable -->
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<meta name="keywords" content="online spokesperson, video spokesperson, website talking heads, website actor, website video, transparent flash, virtual spokesperson, spokesperson, video presenter, website presenter, website spokesperson, video salesperson">
<meta name="description" content="Online video spokesperson.  For only $199, add a virtual spokesperson to your website.  An online presenter can increase traffic conversion rates on your website.  Integrate flash video, website video, website actor and objects to create dynamic streaming video and easily add it your existing website.">
<META NAME="robots" CONTENT="index, follow"> <!-- (Robot commands: All, None, Index, No Index, Follow, No Follow) -->
<META NAME="revisit-after" CONTENT="30 days">
<META NAME="distribution" CONTENT="global">
<META NAME="rating" CONTENT="general">
<META NAME="Content-Language" CONTENT="english">
<meta name="verify-v1" content="YNESpqoAwK51PmBV7/PFKLG0agx7AQPKhXXcYAXGGF8=" />
<meta name="norton-safeweb-site-verification" content="iinbv24r-1ix20hgj5l94wz2rnn3aiwi0336hwysvvpiskquy6ijsh9wy12f3znbed-hz1ay8ppzhgqap-sicqtw6ui29d0wrfcpenudh1ml9xwjbej7u25xy9pnm6yr" />
<link href="../styles.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<link href="../css/examples.css" rel="stylesheet" type="text/css" />
<link href="http://websitetalkingheads.com/css/style.css?v=<?php echo rand(1,100); ?>" rel="stylesheet" type="text/css" />
<script src="../js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="VideoBox/js/mootools.js"></script>
<script type="text/javascript" src="VideoBox/js/swfobject.js"></script>
<script type="text/javascript" src="VideoBox/js/videobox.js"></script>
<link media="screen" type="text/css" rel="stylesheet" href="VideoBox/css/videobox.css" />
<script type="text/javascript" src="http://www.websitetalkingheads.com/videopresentations/includes/examples.js"></script>
   
<!-- InstanceEndEditable -->
<?php include ('../includes/googleanalytics.php'); ?> 
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
<div id="container">
<?php include ('../includes/header25.php'); ?>
  <div class="exampleTitle">Virtual Sets</div>
<div class="vpbanner">
    <div class="vpbanner-left">
    	<div align="center"><img src="../images/VideoProduction60.gif" width="166" height="163" alt="Best in Video Production"  id="BestInSearch" onmouseover="onBestInSearch()" onmouseout="outBestInSearch()" />
  	  </div>
	</div>

    <div class="vpbanner-center">
	    <div align="center"><a rel="vidbox 640 385" title="Why Talking Heads Video?" href="http://www.youtube.com/watch?v=<?=$target[$myStop]?>&hd=1" target="_blank"><img src="http://www.websitetalkingheads.com/videopresentations/images/vpgif.gif" alt="Why Talking Heads Video?" width="250" height="142" id="WhyVideo"   onmouseover="onWhyVideo()" onmouseout="outWhyVideo()"/></a></div>
    </div>
    <div class="vpbanner-right">
    	<a href="../../order.php"><img src="images/VirtualSettitle219.png" width="219" height="146" alt="Virtual Set Videos" id = "Virtual Set Videos"  onmouseover="onVSResults()" onmouseout="outVSResults()"/></a>
    </div>
</div>
<div class="clearSpace"></div>
    <h2>Click Below to View Sample Template Videos</h2>
     <div class="examples">
	 	<?php include ('includes/examples-templateFull.php'); ?>
     </div>
     <div class="c"></div>
    <div id="threehundred">Call For a Quote</div>
    <div class="step">
      <div id="step-top-text">It's As Simple As 1 - 2 - 3</div>
      <div class="step-left">
        <ul>
          <li class="step1">Choose Your Package</li>
          <li class="step2">Video Planning Session</li>
          <li class="step3">Receive Your Video</li>
        </ul>
      </div>
      <div class="step-right">
        <ul>
          <li>Step1<br />
            Purchase the package that will help you best reach your business goal. We recommend giving us call.</li>
          <li>Step2<br />
            Once you have purchased your package, we will have a creative and strategic consultation where together we will decide what text, images or graphics will appear with the spokesperson.</li>
          <li> Step3<br />
            2 to 3 weeks after providing us with your specific logos,  any other visual elements decided upon, you will receive your completed video.</li>
        </ul>
      </div>
      <div class="c"></div>
    </div>
    <h4><a href="compare.php">Choose a Package or Call to Customize a Package</a></h4>
    
  <?php include ('../includes/quoteform.php'); ?>
 
<?php include ('../includes/footer25.php'); ?>   
</div>

<?php include ('../includes/chatform.php'); ?>  
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>