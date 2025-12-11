<?php
/*variables available
$video-video video
$alt- alt tag contents
#bgColor-background color
 */
require( "connect-demo.php" );
if(!$alt){$alt = "Custom Video Example";}
if(!$bgColor){$bgColor = "#50647F";}
if(!$btnColor){$btnColor = "#3D9CEB";}
	echo PHP_EOL;
	echo '<div style="background:'.$bgColor.';padding:1px">';
		echo '<div class="poster" data-toggle="modal" data-target=".bd-example-modal-lg" data-video="' . $video . '">';
		echo PHP_EOL;
		echo '<div id="bigPlayBtn" style="background:'. $btnColor .'"></div>';
		echo PHP_EOL;
		echo '<img src="https://www.websitetalkingheads.com/ivideo/videos/' . $video . '.jpg" class="img-fluid video" alt="' . $alt . '" >';
		echo PHP_EOL;
		echo '</div>';
		echo PHP_EOL;
echo PHP_EOL;
echo '</div>';
echo PHP_EOL;
echo '<script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "VideoObject",
		"name": "' . $video . '",
		"description": "' . $alt . '",
		"thumbnailUrl": "https://www.websitetalkingheads.com/ivideo/videos/' . $video . '.jpg",
		"uploadDate": "2018-11-18",
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
		"contentUrl": "https://www.websitetalkingheads.com/ivideo/videos/' . $video . '.mp4",
		"embedUrl": "https://www.websitetalkingheads.com/ivideo/videos/' . $video . '",
		"interactionCount": "7018"
	}
</script>
';

?>