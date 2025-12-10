<!doctype html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<title>Website Talking Heads®|Sitemap</title>
<meta name="keywords" content="sitemap", "Site Map">
<meta name="description" content="Website Talking Heads® sitemap.">
<meta name="description" content="Website Talking Heads® creates Website Spokesperson, Presentations, Whiteboard and Animation Videos. We have more than a decade of experience in web video.">
<meta name="robots" content="index, follow">
<meta name="revisit-after" content="30 days">
<meta name="rating" content="general">
<meta name="verify-v1" content="YNESpqoAwK51PmBV7/PFKLG0agx7AQPKhXXcYAXGGF8="/>
<meta name="norton-safeweb-site-verification" content="iinbv24r-1ix20hgj5l94wz2rnn3aiwi0336hwysvvpiskquy6ijsh9wy12f3znbed-hz1ay8ppzhgqap-sicqtw6ui29d0wrfcpenudh1ml9xwjbej7u25xy9pnm6yr"/>
<?php include("includes/css-b4.php"); ?>
</head>

<body>
<?php include ('includes/header25.php'); ?>
<section class="alert bg-gradient-mine">
  <?php
  // Loading the XML file
  $xml = simplexml_load_file( "sitemap.xml" );
  echo "<h2>Website Talking Heads</h2>
  <h2>Site Map</h2>
  <div class='container'>
  ";
  foreach ( $xml->children() as $url ) {
    preg_match( "/<title>(.+)<\/title>/siU", file_get_contents( $url->loc ), $matches );
    $title = $matches[ 1 ];
    echo "<div class='border border-primary rounded sitemap text-white'><a href=" . $url->loc . ">
                Page : " . $url->loc . "<br>".$title."<br>Last Modified : " . $url->lastmod . " Priority : " . $url->priority . "<br>";
    echo "</a></div>";
  }
  ?>
</section>
<section class="alert alert-info">
<div class="w-50 mx-auto">
          <div class="embed-responsive embed-responsive-16by9">
            <video playsinline="playsinline" controls poster="https://www.websitetalkingheads.com/ivideo/videos/Our Awards.jpg">
            <source src="https://www.websitetalkingheads.com/ivideo/videos/Our Awards.mp4" type="video/mp4">
            <script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "VideoObject",
		"name": "Our Awards",
		"description": "This video is about the awards that Website Talking Heads has earned over the years.",
		"thumbnailUrl": "https://www.websitetalkingheads.com/ivideo/videos/Our Awards.jpg",
		"uploadDate": "2022-09-19",
		"duration": "PT1M54S",
		"publisher": {
			"@type": "Organization",
			"name": "Website Talking Heads",
			"logo": {
				"@type": "ImageObject",
				"url": "https://www.websitetalkingheads.com/images/Talking_Heads_Banner_Logo.png",
				"width": 247,
				"height": 100
			}
		},
		"contentUrl": "https://www.websitetalkingheads.com/ivideo/videos/Our Awards.mp4",
		"embedUrl": "https://www.websitetalkingheads.com/ivideo/videos/Our Awards",
		"interactionCount": "7018"
	}
      </script>
          </div>
        </div>
  <div class="container-fluid">
    <?php $number = 3; include("awards/awards-cards.php"); ?>
  </div>
</section>
<?php include ('includes/footer25.php'); ?>
</body>
</html>