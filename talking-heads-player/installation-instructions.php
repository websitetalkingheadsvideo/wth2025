<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Talking Heads® Player Installation</title>
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<meta name="keywords" content="online spokesperson, video spokesperson, website talking heads, website actor, website video, transparent video, virtual spokesperson, spokesperson, video presenter, website presenter, website spokesperson, video salesperson">
<meta name="description" content="Online video spokesperson.  For only $199, add a virtual spokesperson to your website.  An online presenter can increase traffic conversion rates on your website.  Integrate website video, website actor and objects to create dynamic streaming video and easily add it your existing website.">
<meta name="robots" CONTENT="index, follow">
<!-- (Robot commands: All, None, Index, No Index, Follow, No Follow) -->
<meta name="revisit-after" CONTENT="30 days">
<meta name="distribution" CONTENT="global">
<meta name="rating" CONTENT="general">
<meta name="Content-Language" CONTENT="english">
<meta name="verify-v1" content="YNESpqoAwK51PmBV7/PFKLG0agx7AQPKhXXcYAXGGF8="/>
<meta name="norton-safeweb-site-verification" content="iinbv24r-1ix20hgj5l94wz2rnn3aiwi0336hwysvvpiskquy6ijsh9wy12f3znbed-hz1ay8ppzhgqap-sicqtw6ui29d0wrfcpenudh1ml9xwjbej7u25xy9pnm6yr"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include("../includes/css-b4.php"); ?>
</head>

<body>
<?php include ('../includes/header25.php'); ?>
<section class="alert">
  <h1>Talking Heads® Player Installation</h1>
  <div class="text-left thin-width center-block">
    <ol>
      <li>Create a folder called talkingheads in the same directory that holds the page that you want to put the video on.</li>
      <li>Unzip all the files from the zip file onto your computer</li>
      <li>Upload all these files to the talkingheads directory that you created</li>
      <li>Add the following line to your page before the <code>&lt;/body&gt;</code> tag:</li>
    </ol>
    <div class="center-block">
      <code class="text-center">&lt;script type=&quot;text/javascript&quot; src=&quot;talkingheads/website-spokesperson.js&quot;&gt;&lt;/script&gt;</code>
    </div>
    <p class="mt-1">For orders with more than one video the file in the line of code changes. For the second video replace website-spokesperson.js with wthvideo2.js. The thrid video it is website-spokesperson3.js and so on.</p>
  </div>
</section>
<section class="alert alert-info">
  <div class="container">
    <h2>Installing on Wordpress, Joomla, or a Website Builder</h2>
    <p>Installing the Talking Heads<i class="sup fal fa-registered"></i> Player on your website is usually very easy. Wordpress, Joomla, or other Website Builders can add a couple of steps though. </p>
    <h3>Wordpress</h3>
    <div class="row">
      <div class="col-md-6">
        <!-- 16:9 aspect ratio -->
        <div class="embed-responsive embed-responsive-16by9">
          <iframe type="text/html" width="100%" class="embed-responsive-item" src="https://www.youtube.com/embed/0Zv4ZxdP71U?modestbranding=1&rel=0" frameborder="0"></iframe>
        </div>
      </div>
      <div class="col-md-6">
        <p>If your home page is not an actual page and is just a template, the template to add the line of code to is probably index.PHP but every template is different so it may take some trial and error to find the right place to put the code. Other template pages could remain index.php and home.php.</p>
        <p>It is easiest to install an FTP plugin such as Upload to FTP, FileManager, or File Manager Advanced. After installing the plugin just follow its directions to create the talkingheads folder and upload the files.</p>
      </div>
    </div>
    <h3>Joomla</h3>
    You need to create a custom HTML module with the title hidden. Then put the line of code into the module. You may have to switch your editor to No Editor before adding the code or it will disappear. Then assign that module to the page they want it to play on.
    <h3>Website Builder</h3>
    There is a basic logic to understanding how to install the videos.
    <ul>
      <li>The line of code above will be inserted into your HTML code. This code tells the website where to look for the file with the instructions, called website-spokesperson.js. This "PATH" must be correct to work. It must point exactly to where that file is located or video will play.</li>
      <li>That file has instructions. The instructions tell the computer the How, What, When, and Where with parameters. If you are placing your talkingheads directory anywhere but your root directory, you must make sure that the path parameter inside the website-spokesperson.js file points to the actual URL location of the video.</li>
      <li>If you are installing on a web builder or other system that forces you to place the talkingheads directory folder in a place other than the root directory, you will need to make the path a "long URL"(ex:https://yourdomain.com/example/example/talkingheads/).</li>
    </ul>
  </div>
</section>
<section class="container-fluid">
  <div class="card-deck">
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">Common Installation Issues</h5>
        <p class="card-text">If you follow the installation directions and your video does not appear, the most common issue is pathing, either the browser is looking in the wrong place for the website-spokesperson.js file or website-spokesperson.js file is looking in the wrong place for the player and other files. If this happens the remedy is to change the src value in the line of samp above from <samp>src="talkingheads/website-spokesperson.js"</samp> to <samp>src="https://www.MyWebsite.com/talkingheads/website-spokesperson.js"</samp> (change to match where you put the website-spokesperson.js file). Then inside the website-spokesperson.js file is a variable named path. This is the folder the website-spokesperson.js file looks for the player and videos. It is normally set to, "talkingheads" you will need to change it to, <samp>"https://www.MyWebsite.com/talkingheads"</samp>(change to match where you put the folder.</p>
      </div>
    </div>
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">Devices</h5>
        <p class="card-text">Due to their screen size, devices display web pages differently than regular computers. Your video may cover up part of your page that has content you want your visitors to see or it may be off the screen entirely. You can remedy this by setting the responsive variable to true and adding a div named wthvideo to your page where you want your video. You can also just turn off the player on Devices by setting the showDevice variable to false. You can learn about customizing the Talking Heads® Player here and in your download.zip file.</p>
      </div>
    </div>
  </div>
</section>
<section class="alert alert-info">
  <div class="row">
    <h3 class="text-small col-md-2 col-md-offset-1 text-right">Disclaimer</h3>
    <div class="text-small col-md-8">
      The wthplayer and associated javascript files are copyrighted and may not be used other than with videos made by Website Talking Heads or its authorized resellers.</span>
    </div>
  </div>
</section>
<section class="alert alert-info">
  <div class="card-deck">
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title"><a href="../talking-heads-player/installation-instructions.php">Installation</a></h5>
        <p class="card-text">We have created the Talking Heads<sup>&#174;</sup> Player with easy installation in mind. It usually only takes a few minutes to install and if you need assistance we are happy to help. The <a href="../talking-heads-player/installation-instructions.php">Installation Instructions</a> are <a href="../talking-heads-player/installation-instructions.php">here</a>. Or you can contact <a href="../support/" title="Contact Support">support</a>.</p>
      </div>
      <div class="card-footer text-muted">
        <a href="../talking-heads-player/installation-instructions.php" class="btn btn-primary">More...</a>
      </div>
    </div>
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title"><a href="../talking-heads-player/customize-player.php">Customizing the Talking Heads<sup>&#174;</sup> Player</a></h5>
        <p class="card-text">There are may options for customizing your own player that already exist in the Website Talking<sup>&#174;</sup> Heads default player. You can learn how to customize it <a href="../talking-heads-player/customize-player.php">here</a>.</p>
      </div>
      <div class="card-footer text-muted">
        <a href="../talking-heads-player/customize-player.php" class="btn btn-primary">More...</a>
      </div>
    </div>
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title"><a href="../specialty-players/index.php">Specialty Players</a></h5>
        <p class="card-text">We have created several <a href="../specialty-players/index.php">specialty players</a> to meet many different needs. From the ability to have different videos play each time someone visits your site to a Video FAQ, from a player that will jump around the page to a player that will play a different video based on which part of an image is pressed, we have the specialty player for you.</p>
      </div>
      <div class="card-footer text-muted">
        <a href="../specialty-players/index.php"" class="btn btn-primary">More...</a>
      </div>
    </div>
  </div>
</section>
<?php include ('../includes/footer_b4.php'); ?>
</body>
</html>