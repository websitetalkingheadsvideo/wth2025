<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Website Talking Heads - JS Guide</title>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<meta name="keywords" content="JS Guide, talking heads player, javascript, guide">
<meta name="description" content="Online video spokesperson.  For only $199, add a virtual spokesperson to your website.  An online presenter can increase traffic conversion rates on your website.  Integrate flash video, website video, website actor and objects to create dynamic streaming video and easily add it your existing website.">
<META NAME="robots" CONTENT="index, follow">
<META NAME="revisit-after" CONTENT="30 days">
<META NAME="distribution" CONTENT="global">
<META NAME="rating" CONTENT="general">
<META NAME="Content-Language" CONTENT="english">
<meta name="verify-v1" content="YNESpqoAwK51PmBV7/PFKLG0agx7AQPKhXXcYAXGGF8=" />
<meta name="norton-safeweb-site-verification" content="iinbv24r-1ix20hgj5l94wz2rnn3aiwi0336hwysvvpiskquy6ijsh9wy12f3znbed-hz1ay8ppzhgqap-sicqtw6ui29d0wrfcpenudh1ml9xwjbej7u25xy9pnm6yr" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include("includes/css-b4.php"); ?>
</head>
<body>
<?php include ('includes/header19.php'); ?>
<section class="container-fluid bg-info">
  <h1>Customizing Your Own Video Spokesperson</h1>
  <article class="customizing short-paragraph">
    <h2>Directions</h2>
    <p class="short-paragraph"> There are may options for customizing the Talking Heads player. This document will guide you through all the available parameters.</p>
    <p class="short-paragraph">If you would prefer to have us make your changes for you, there is a $50 charge. You can contact us at 801-748-2281 to let us know what changes you would like made.</p>
    <p class="short-paragraph">To customize your player, open up your wthvideo.js file in a text editor (like Notepad) or an editor like Dreamweaver that is designed to edit javascript files. Do not use Microsoft Word, Open Office, or other elaborate word processor software.</p>
    <p class="short-paragraph">In your wthvideo.js file, starting on line 5, is a list of variables. Each line holds a different parameter to help you customize your player. </p>
    <p class="short-paragraph">Our player also has API that gives you the ability to controll the player by links on the page or javascript commands.  For more information click <a href="linkcontrol/index.php">here.</a></p>
  </article>
</section>
<section class="container pb-3">
<dl class="features center-block">
  <h2>Parameters</h2>
  <dt>Responsive</dt>
  <dd>With the rise of responsive websites we have added the ability to place our player inside a specific div tag.  If you set the responsive variable to "yes" you can then place 
    &lt;div id=&quot;wthvideo&quot;&gt;&lt;/div&gt; inside of the div you would like the video to play in. This will place the video inside of that tag, where ever it is on the page. </dd>
  <dt>Player</dt>
  <dd>You can set which version of the player a visitor to your site sees.<br />
    <strong>both-</strong> flash with HTML5 fallback(default).<br />
    <strong>flash-</strong> flash player only.<br />
    <strong>html5-</strong> html5 player only.</dd>
  <dt>linkWidth</dt>
  <dd>We have made available the option to just show the poster of your video spokesperson with a link to the video.  This is so the Talking Heads Player isn't used on smaller screens/devices.  When a visitor touches the image that device's browser will open the video full-screen.  We recomend that if you change this value that you set it to the widest @media that is adjusting for devices.</dd>
  <dt>
    <div>
      Width and Height
    </div>
  </dt>
  <dd>
    <div>
      These are specific to your video. Although they can be changed, we do NOT recommend this. It will probably make your video look very pixelated or stretched strangely. If you want to resize your video, please call us at 801-748-2281. We will resize your video once for free. If you need it resized a second time, there is an additional fee.
    </div>
  </dd>
  <dt>
    <div>
      Position
    </div>
  </dt>
  <dd>
    <div>
      This can be set to either &quot;fixed&quot; or &quot;absolute&quot;.  Fixed positioning means that the video will stay in the same place with respect to the browser window while the user is scrolling up and down. For instance, if you have the video in the bottom right corner of the screen with fixed positioning, it will stay in the bottom right and not move as your website goes up and down. If you use absolute positioning, it's as if your video is fixed to the webpage and it will scroll up with the webpage as the user scrolls down.
    </div>
  </dd>
  <dt>
    <div>
      Left and Right
    </div>
  </dt>
  <dd>
    <div>
      These parameters should usually be in pixels and will make the video appear that number of pixels from the left or the right of the browser window, depending on which one you set. You should only set one and leave the other one at &quot;auto&quot;. The syntax for 100 pixels would be &quot;100px&quot;.
    </div>
  </dd>
  <dt>
    <div>
      Top and Bottom
    </div>
  </dt>
  <dd>
    <div>
      These parameters are same as left and right. They are with respect to the browser window, not your website. One should be set as &quot;auto&quot; while the other one set to a value of pixels. If you want it to appear in the same vertical position on your website all the time, use the top parameter with absolute positioning.
    </div>
  </dd>
  <dt>
    <div>
      Centeroffset
    </div>
  </dt>
  <dd>
    <div>
      If your site is centered in the browser window and you want your video to always be in the same place with respect to your website, set left to &quot;50%&quot;. This will put the left hand margin right in the center of the page. You can move it to the right or the left by increasing or decreasing the centeroffset pixel value. A negative value of half the width of the video, will put it exactly in the center. If you are not using this to place the video in an exact horizontal location, leave the value set to &quot;auto&quot;.
    </div>
  </dd>
  <dt>
    <div>
      Color
    </div>
  </dt>
  <dd>
    <div>
      You can tint the control bar of the flash version of the player with the hexadecimal number of the color that you would like. Please note: this is ONLY a tint.
    </div>
  </dd>
  <dt>
    <div>
      Volume
    </div>
  </dt>
  <dd>
    <div>
      Our videos at 100% are fairly loud. You can control the volume of your talking head by changing the volume here. This parameter must be a number between 0 and 100.
    </div>
  </dd>
  <dt>
    <div>
      Autostart
    </div>
  </dt>
  <dd>
    <div>
      We have several options for how and when your video begins playing; <br />
      <strong>yes</strong>- 
      This will automatically start the video when the page loads.<br />
      <strong>no</strong>- 
      This will show an image of the actor with a play button.  When a visitor clicks on the image the video will start.<br />
      <strong>mute</strong>- 
      When the page is loaded the video will play without sound.  A click-to-play button will be shown.  When the button is clicked the video starts over with the audio on.<br />
      <strong>oncethenpic</strong>*- 
      Will play the video automatically on the first visit of a browser session. During the same session each time the user comes back there will be an image of the actor with a play button.<br />
      <strong>oncethenmute</strong>*- 
      Will play the video automatically on the first visit of a browser session. During the same session each time the user comes back the video will play without sound with a click-to-play button.<br />
      <strong>onceonlythenpic</strong>*-  Will play the video automatically on the first visit. As long as the visitor doesn't clean their cookie each time the user comes back there will be an image of the actor with a play button.<br />
      <strong>onceonlythenmute</strong>*-  Will play the video automatically on the first visit. As long as the visitor doesn't clean their cookie each time the user comes back there will be an muted video of the actor with a play button.<br />
      <strong>loop</strong>*-  This will loop the video so that it plays continuously. It is recommended that when you use this setting you set Fadein and Fadeout to &quot;0&quot;.<br />
      *oncepersession needs to be set to &quot;no&quot; for these settings to work
    </div>
  </dd>
  <dt>
    <div>
      Delay
    </div>
  </dt>
  <dd>
    <div>
      This parameter is a number that will indicate how many seconds lapse before your video will start.
    </div>
  </dd>
  <dt>
    <div>
      Controlbar
    </div>
  </dt>
  <dd>
    <div>
      This determines whether or not you have a controlbar in the Flash player. It can be set to &quot;yes&quot; which means the controlbar is always displayed. It can be set to &quot;no&quot; which means the control bar is never displayed. Or it can be set to &quot;mouse&quot; which means it appears when the user mouses over it.
    </div>
  </dd>
  <dt>
    <div>
      Playbtn
    </div>
  </dt>
  <dd>
    <div>
      The player comes with a default &quot;Click to Play&quot; button that is used if you set autostart to &quot;no&quot; or &quot;exitoncomplete&quot; to no. With this parameter, you can make your own play video image, place it in the directory with your other files and change this parameter to the name of that image. We will make a custom play button for you for $25.
    </div>
  </dd>
  <dt>
    <div>
      Playposition
    </div>
  </dt>
  <dd>
    <div>
      This determines where your play button (if you set your player to no for exitoncomplete or no to autostart) will be positioned horizontally in the Flash player. You can set it to &quot;left&quot;, &quot;right&quot;, or &quot;center&quot;. It defaults to right if none of these are used.
    </div>
  </dd>
  <dt>
    <div>
      Playtop
    </div>
  </dt>
  <dd>
    <div>
      This determines if your play button is at the top of the video or the bottom of the Flash player. The default is &quot;center&quot;. To change it, set this parameter to &quot;top&quot; or &quot;bottom&quot;.
    </div>
  </dd>
  <dt>
    <div>
      Exitoncomplete
    </div>
  </dt>
  <dd>
    <div>
      This can be set to &quot;yes&quot; or &quot;no&quot;. If you set it to &quot;no&quot;, the video will stay open at the end, with an image of the actor and a play button so that the user can replay it.
    </div>
  </dd>
  <dt>
    <div>
      Oncepersession
    </div>
  </dt>
  <dd>
    <div>
      This can be set to &quot;yes&quot;,  &quot;no&quot;, or &quot;onceonly&quot;. If you choose &quot;yes&quot; the video will play one time. If the user comes back to the page or refreshes the page, it will not play again unless the browser is completely shut down and the user goes back to the page. You can also choose &quot;onceonly&quot; which will play the video only once and not again until the visitor clears their cookies or turns cookies off completely.
    </div>
  </dd>
  <dt>
    <div>
      Vidlink
    </div>
  </dt>
  <dd>
    <div>
      With the Flash player you can set the video to be a link. Either leave this set to &quot;no&quot; or you can put a complete URL inside the quotes. The URL must begin with &quot;http://&quot;. Using this will make it so that users can click on the video to be taken to another location.
    </div>
  </dd>
  <dt>
    <div>
      Openin
    </div>
  </dt>
  <dd>
    <div>
      This is the HTML target attribute and can be set to &quot;_blank&quot; or &quot;_self&quot;. It works in conjunction with Vidlink and will be ignored if Vidlink is not set.
    </div>
  </dd>
  <dt>
    <div>
      Path
    </div>
  </dt>
  <dd>
    <div>
      The default is wthvideo. If you must upload your files in a different directory, you can use the path parameter to either a relative path or the complete URL path to the directory where your files are located. It is this parameter that is usually at fault if your video spokesperson wont play. Make sure your video is in the path this is set to.
    </div>
  </dd>
  <dt>
    <div>
      gifImg
    </div>
  </dt>
  <dd>
    <div>
      This is the image that will be displayed for the HTML5 player and must be a gif. If it isn't set it will use phoneImg
    </div>
  </dd>
  <dt>
    <div>
      phoneImg
    </div>
  </dt>
  <dd>
    <div>
      This is the backup image that will be displayed for the HTML5 player. Must be jpg
    </div>
  </dd>
  <dt>
    <div>
      pngImg
    </div>
  </dt>
  <dd>
    <div>
      This is the image that the Flash player will use, must be a png.
    </div>
  </dd>
  <dt>
    <div>
      Flv
    </div>
  </dt>
  <dd>
    <div>
      This is the name of the flv file in your directory. The flv is the movie that is being played.
    </div>
  </dd>
  <dt>
    <div>
      h264
    </div>
  </dt>
  <dd>
    <div>
      This is the name of the mp4 file in your directory. This is used for the HTML5 player.
    </div>
  </dd>
</dl>
<div class="container bg-gradient-mine">
  <div class="row">
    <h3 class="smalltext col-md-4 col-md-offset-1 text-right">Disclaimer</h3>
    <div class="smalltext col-md-7">
      The wthplayer and associated javascript files are copyrighted and may not be used other than with videos made by Website Talking Heads or its authorized resellers.</span>
    </div>
  </div>
  </section>
</div>
<section class="container-fluid bg-black">
  <div class="py-3">
    <h2 class="display-2 text-primary font-weight-bold wow jackInTheBox">Call Us</h2>
    <h4 class="font-weight-light display-4 wow flipInX"><a class="text-white" href="tel://801-748-2281" title="Give us a call.">1-801-748-2281</a></h4>
  </div>
</section>
<?php include ('includes/footer_b4.php'); ?>
</body>
</html>