<?php
$url = 'https://www.websitetalkingheads.com/spokespeople/' . $spokespeople . '.xml';
$xml = simplexml_load_file( $url );
switch ( $columns ) {
	case 1:
		$span = 12;
		break;
	case 2:
		$span = 6;
		break;
	case 3:
		$span = 4;
		break;
	case 4:
		$span = 3;
		break;
	default:
		$span = 2;
}
echo PHP_EOL;
echo '<div class="row actor-row justify-content-center">';
echo PHP_EOL;
foreach ( $xml as $item ) {
	$spokespeson = $item[ 'caption' ];
	echo '<div class="poster actor" alt="' . $spokespeson . '" Video Spokesperson" data-toggle="modal" data-target=".modal-spokesperson" data-video="' . $spokespeson . '">';
	echo PHP_EOL;
	echo '<img  src="../carimages/' . $spokespeson . '.png" id="' . $spokespeson . '" alt="' . $spokespeson . ' - Introduction" >';
	echo PHP_EOL;
	echo '<div class="btn-play-small"></div>';
	echo PHP_EOL;
	echo '<div class="poster-title text-center">' . $spokespeson . '</div>';
	echo PHP_EOL;
	echo '</div>';
	echo PHP_EOL;
	echo '<script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "VideoObject",
		"name": "' . $spokespeson . '",
		"description": "' . $spokespeson . ' - Introduction Video Spokesperson",
		"thumbnailUrl": "https://www.websitetalkingheads.com/ivideo/videos/' . $spokespeson . '.jpg",
		"uploadDate": "2018-11-31T08:00:00+08:00",
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
		"contentUrl": "https://www.websitetalkingheads.com/ivideo/videos/' . $spokespeson . '.mp4",
		"embedUrl": "https://www.websitetalkingheads.com/ivideo/videos/' . $spokespeson . '",
		"interactionCount": "7018"
	}
</script>
';
}
echo PHP_EOL;
echo '</div>';
echo PHP_EOL;

?>