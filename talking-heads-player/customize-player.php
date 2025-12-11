<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Customize the Talking Heads® Player</title>
<meta name="keywords" content="Customize Talking Heads Video Player, online spokesperson, video spokesperson, website talking heads, website actor, website video, transparent video, virtual spokesperson, spokesperson, video presenter, website presenter, website spokesperson, video salesperson">
<meta name="description" content="Customize Talking Heads Video Player and add a virtual spokesperson to your website.  An online presenter can increase traffic conversion rates on your website.  Integrate HTML5 and Flash video to create dynamic streaming video and easily add it your existing website.">
<META NAME="robots" CONTENT="index, follow">
<!-- (Robot commands: All, None, Index, No Index, Follow, No Follow) -->
<META NAME="revisit-after" CONTENT="30 days">
<META NAME="distribution" CONTENT="global">
<META NAME="rating" CONTENT="general">
<META NAME="Content-Language" CONTENT="english">
<meta name="verify-v1" content="YNESpqoAwK51PmBV7/PFKLG0agx7AQPKhXXcYAXGGF8="/>
<meta name="norton-safeweb-site-verification" content="iinbv24r-1ix20hgj5l94wz2rnn3aiwi0336hwysvvpiskquy6ijsh9wy12f3znbed-hz1ay8ppzhgqap-sicqtw6ui29d0wrfcpenudh1ml9xwjbej7u25xy9pnm6yr"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include("../includes/css-b4.php"); ?>
<link rel="stylesheet" href="https://use.typekit.net/xtn2ztk.css">
</head>

<body>
<?php include ('../includes/header25.php'); ?>
<section class="alert alert-info">
  <h1>Customizing the Talking Heads<sup class="tm-small">&reg;</sup> Player</h1>
  <article class="container customizing">
    <p> There are may options for customizing the Talking Heads<sup class="tm-small">&reg;</sup> player. This document will guide you through all the available parameters.</p>
    <p>To customize your player, open up your website-spokesperson.js file in a text editor (like Notepad) or a code editor like Dreamweavers. Do not use Microsoft Word, Open Office, or other elaborate word processor software because they insert formatting code.</p>
    The main player variables start at line 5 and continue until you see <code>// end Main Player Vars</code> </article>
</section>
<section class="features">
  <div class="container">
    <h2>Player Variables</h2>
    <dl class="variables">
      <dt>Responsive</dt>
      <dd>With the rise of responsive websites we have added the ability to place our player inside a specific div tag. If you set the responsive variable to "yes" you can then place &lt;div id="wthvideo"&gt;&lt;/div&gt; inside of the div you would like the video to play in. This will place the video inside of that tag, where ever it is on the page. true or false</dd>
      <dt>showDevice</dt>
      <dd>Sometimes you may not want the video to appear on devices. This will set that(true or false)</dd>
      <dt>showNonCanvas</dt>
      <dd>Display Talking Head when canvas not available</dd>
      <dt>width</dt>
      <dd>video width</dd>
      <dt>height</dt>
      <dd>video height</dd>
      <dt>Cookies</dt>
      <dd>Use any of the functions that require cookies.(true or false)</dd>
      <dt>Position</dt>
      <dd>
        <ul>
          <li>absolute-The video "sticks" to the page. If you scroll the page the video scrolls with the page</li>
          <li>fixed-The video is fixed on the page. If you scroll the video stays in the same position.</li>
        </ul>
      </dd>
      <dt>left</dt>
      <dd>Usual options are "auto", "0" or "50%". 0 will put the player on the left side of the screen. Auto puts the player where the right value places it. 50% place the left edge of the player at the middle of the screen then set the centeroffset value below to move the player to the left or right.</dd>
      <dt>right</dt>
      <dd>Usually 0 or "auto" If the left value is anything but "auto" this should be auto.</dd>
      <dt>divTop</dt>
      <dd>auto or the number of pixels from the top you want the player to be.</dd>
      <dt>bottom</dt>
      <dd>"auto" or the number of pixels from the bottom you want the player to be. centeroffset Set to "auto" unless left is set to "50%" then the number of pixels from the center. Negative numbers are left and positive are right.</dd>
      <dt>bgColor</dt>
      <dd>The background color for the controlbar and click to play button. RGBA value.</dd>
      <dt>textColor</dt>
      <dd>The color of the text on the click to play button. Hex value</dd>
      <dt>btnText</dt>
      <dd>Text in the click to play button.</dd>
      <dt>volume</dt>
      <dd>Player volume. Value from 0.1 to 1.0</dd>
      <dt>delay</dt>
      <dd>Delay start of video 1000 = 1 second</dd>
      <dt>controlbar</dt>
      <dd>
        <ul>
          <li>yes- Always show the controlbar</li>
          <li>no- Don"t show the controlbar</li>
          <li>mouse- Show the controlbar when the mouse is over the player.</li>
        </ul>
      </dd>
      <dt>exitbtn</dt>
      <dd>To show or not show the exit button on the top right. true or false</dd>
      <dt>autostart</dt>
      <dd>
        <ul>
          <li>yes-Start video on page load. Note some browsers or plugins prevent autostart video.</li>
          <li>mute-Show the player with muted video.</li>
          <li>onceonlythenmute-Autostart the player on the first visit. After that show muted video until they clear their cookies. </li>
          <li>once- Only show the player on the first visit of a browser session.</li>
          <li>onceonly- Only show the player on the first visit(until they clear their cookies)</li>
          <li>goStop-Autostart the video then have it stop until viewer clicks play.</li>
          <li>loop-Muted video that loops.</li>
        </ul>
      </dd>
      <dt>goStop</dt>
      <dd>When using the goStop option on autostart this is the frame to stop on. 30 frames is one second.</dd>
      <dt>exitoncomplete</dt>
      <dd>Close the player on video complete. true or false</dd>
      <dt>path</dt>
      <dd>Path to where the files are stored. Usually talkingheads.</dd>
      <dt>actorpic</dt>
      <dd>Name of the gif. Don't add .gif</dd>
      <dt>canvasVideo</dt>
      <dd>Name of the mp4 with the matte. Don"t add the .mp4</dd>
      <dt>h264</dt>
      <dd>Name of the mp4 without the matte. Don"t add the .mp4</dd>
    </dl>
  </div>
</section>
<section class="alert alert-info">
<div class="container">
<div class="row">
  <div class="col-lg-2 offset-1">
    <h3><a href="installation-instructions.php">Installation</a></h3>
  </div>
  <div class="col-lg-8 offset-1">
    <blockquote>We have created the Talking Heads Player with easy installation in mind. It usually only takes a few minutes to install and if you need assistance we are happy to help. Here are links for <a href="installation-instructions.php">Installation Instructions</a> and <a href="https://www.websitetalkingheads.com/support/">support</a>.</blockquote>
  </div>
</div>
</section>
<section class="alert alert-primary">
<div class="container">
<div class="row">
  <div class="col-lg-2 offset-1">
    <h3><a href="../specialty-players/index.php">Specialty Players</a></h3>
  </div>
  <div class="col-lg-8 offset-1">
    <blockquote>We have created several <a href="../specialty-players/index.php">specialty players</a> to meet many different needs. From the ability to have different videos play each time someone visits your site to a Video FAQ, from a player that will jump around the page to a player that will play a different video based on which part of an image is pressed, we have the specialty player for you.</blockquote>
  </div>
</div>
</section>
<section class="alert alert-danger p-3">
  <div class="container">
    <div class="row">
      <div class="col-lg-2 offset-1">
        <h3 class="text-right smalltext">Disclaimer</h3>
      </div>
      <div class="col-lg-8 offset-1">
        <p class="text-md">The Talking Heads® Player and associated javascript files are copyrighted and may not be used other than with videos made by Website Talking Heads or its authorized resellers.</p>
      </div>
    </div>
  </div>
</section>
<?php include ('../includes/footer25.php'); ?>
</body>
</html>