<?php
/*variables available
 $rand- Randomize list
 $columns- number of columns
 $type-  type of videos
 $keyword = alt tag for images
 $show-number to show
 Video types
 Whiteboard
 Animation
 Presentation
 Typography
 Demo
 */

require_once( "connect-demo.php" );
$keyword = array();
if ( !$show ) {
  $show = 99;
}
$sql = "SELECT * FROM videos";
switch ( $type ) {
  case "Whiteboard":
    $sql .= " 	WHERE whiteboard=true";
    array_push( $keyword, "Whiteboard", "Whiteboard Animation", "Whiteboard Explainer", "Explainer", "Drawing", "Sketch" );
    break;
  case "Animation":
    $sql .= " 	WHERE animation=true";
    array_push( $keyword, "Animation", "Animated Video", "Animated Explainer" );
    break;
  case "Presentation":
    $sql .= " 	WHERE presentation=true";
    array_push( $keyword, "Custom Video", "Video Presentation", "Web Marketing Video", "Web Video Production", "Spokesperson Video" );
    break;
  case "Demo":
    $sql .= " 	WHERE demo=true";
    array_push( $keyword, "Custom Video", "Video Presentation", "Example Video", "Demo Video" );
    break;
  default:
    array_push( $keyword, "Web Video", "Online Video", "Website Video" );

}

if ( $rand === true ) {
  $sql .= " ORDER BY RAND()";
} else {
  $sql .= " ORDER BY rank";
}
if ( $show > 0 ) {
  $sql .= " LIMIT " . $show;
}
//echo($sql);
$result = $conn->query( $sql );
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
    $span = 4;
}
if ( $result->num_rows > 0 ) {
  echo PHP_EOL;
  echo '<div class="row poster-row">';
  while ( $row = $result->fetch_assoc() ) {
    $altNum = array_rand( $keyword, 1 );
    $alt = $altNum[ $keyword ];
    $name = $row[ "Name" ];
    $description = $row[ "description" ];
    $vimeo2 = substr_replace( $row[ "vimeo" ], "?h=", 10, 0 );
    $vimeo2 = preg_replace( '/\?\//', '?', $vimeo2 );
    $srcVimeo2 = "https://player.vimeo.com/video/";
    $srcVimeo2 .= $vimeo2;
	  console.log($vimeo2);
	  console.log($srcVimeo2);
    $srcVimeo .= "&amp;title=0&amp;byline=0&amp;portrait=0&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479";
    echo '<div class="col-lg-' . $span . ' poster" alt="' . $keyword[ $altNum ] . " Example" . '" data-toggle="modal" data-target=".bd-example-modal-lg" data-vimeo="' . $vimeo2 . '"data-video="' . $name . '">';
    echo PHP_EOL;
    echo '<img src="https://www.websitetalkingheads.com/ivideo/videos/' . $name . '.jpg" class="img-fluid video" alt="' . $keyword[ $altNum ] . " Example" . '">';
    echo PHP_EOL;
    echo '<div class="poster-button-small" style="background:' . $btnColor . '"></div>';
    echo PHP_EOL;
    echo '<div class="poster-title text-center">' . $name . '</div>';
    echo PHP_EOL;
    echo '</div>';
    echo PHP_EOL;
    echo '<script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "VideoObject",
		"name": "' . $video . '",
		"description": "' . $description . '",
		"thumbnailUrl": "https://www.websitetalkingheads.com/ivideo/videos/' . $video . '.jpg",
		"uploadDate": "2018-11-31",
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
  }
} else {
  echo "0 results";
}
echo PHP_EOL;
echo '</div>';
echo PHP_EOL;

?>