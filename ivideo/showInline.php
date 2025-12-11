<?php
/*variables available
$video-video video
$alt- alt tag contents
#bgColor-background color
 */
require( "connect-demo.php" );
if ( !$alt ) {
	$alt = $video;
}
if ( !$bgColor ) {
	$bgColor = "#50647F";
}
if ( !$btnColor ) {
	$btnColor = "#0072FF";
}
echo PHP_EOL;
echo '<div class="embed-responsive embed-responsive-16by9">
	<video id="my-video" class="video-js autoplay="no" embed-responsive-item" controls preload="auto" poster="https://www.websitetalkingheads.com/ivideo/videos/' . $video . '.jpg" data-setup="{}">
		<source src="https://www.websitetalkingheads.com/ivideo/videos/' . $video . '.mp4" type="video/mp4">
		<p class="vjs-no-js">
			To view this video please enable JavaScript, and consider upgrading to a web browser that
			<a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
		</p>
	</video>
</div>
';
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
		"uploadDate": "2022-8-30",
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