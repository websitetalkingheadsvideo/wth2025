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
$mrss = strtolower( $type );
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
    $sql .= " 	WHERE Presentation=true";
    array_push( $keyword, "Custom Video", "Video Presentation", "Web Marketing Video", "Web Video Production", "Spokesperson Presentation Video" );
    $mrss = "custom";
    break;
  case "Demo":
    $sql .= " 	WHERE demo=true";
    array_push( $keyword, "Custom Video", "Video Presentation", "Example Video", "Demo Video" );
    break;
  case "product":
    $sql .= " 	WHERE product=true";
    array_push( $keyword, "Product Demo", "Video Demonstration", "Product Demo Video", "Demo Video" );
    break;
  case "Typography":
    $sql .= " 	WHERE Typography=true";
    array_push( $keyword, "Kinetic Typography", "Typography Animation", "Motion Typography", "Typography Video", "Motion Design", "Cool Typography", "Best Typography", "Typography Motion Graphics" );
    break;
  case "elearning":
    $sql .= " 	WHERE elearning=true";
    array_push( $keyword, "eLearning", "Training Videos", "Educational Videos" );
    break;
  case "Specialty":
    $sql .= " 	WHERE specialty=true";
    array_push( $keyword, "Web Video", "Animation", "Animated Video", "Motion Design", "Specialty Video" );
    break;
  case "Logo":
    $sql .= " 	WHERE logo=true";
    array_push( $keyword, "Logo Reveal", "Logo Reveal Animation", "Logo Stinger", "Corporate Logo Reveal" );
    break;
  case "Motion":
    $sql .= " 	WHERE motion=true";
    array_push( $keyword, "Web Video", "Motion Animation", "Animated Video", "Motion Design" );
    break;
  case "testimonials":
    $sql .= " 	WHERE testimonials=true";
    array_push( $keyword, "Testimonial Demo", "Video Testimonial", "Professional Spokesperson" );
    break;
  case "3d":
    $sql .= " 	WHERE 3d=true";
    array_push( $keyword, "3d Animation", "Animation", "3d Explainer", "Character Creator", "3d Character", "After Effects 3d Animation", "3d Explainer Video" );
    break;
  case "viral":
    $sql .= " 	WHERE viral=true";
    array_push( $keyword, "Social Media", "Viral Video", "Social Media Viral Video", "Social Media Strategy", "Social Media Marketing", "Viral Video Marketing", "Viral Video Strategy" );
    break;
  case "app":
    $sql .= " 	WHERE app=true";
    array_push( $keyword, "App Walkthrough", "Software Walkthrough", "SaaS Walkthrough", "Website Walkthrough", "Custom Video" );
    break;
  default:
    array_push( $keyword, "Web Video", "Online Video", "Website Video" );

}

if ( $rand === true ) {
  $sql .= " ORDER BY RAND()";
} else {
  $sql .= " ORDER BY `videos`.`rank` ASC";
}
if ( $show > 0 ) {
  $sql .= " LIMIT " . $show;
}
//echo  $sql;
$result = $conn->query( $sql );
switch ( $columns ) {
  case 1:
    $span = "auto";
    break;
  case 2:
    $span = "auto auto";
    break;
  case 3:
    $span = "auto auto auto";
    break;
  default:
    $span = "auto auto auto auto";
}
if ( $result->num_rows > 0 ) {
  echo PHP_EOL;
  echo '<div class="portfolio" style="grid-template-columns: ' . $span . '">
	';
  while ( $row = $result->fetch_assoc() ) {
    $altNum = array_rand( $keyword, 1 );
    $alt = $altNum[ $keyword ];
    $name = $row[ "Name" ];
    $description = $row[ "description" ];
    $p = strpos( $row[ "vimeo" ], "/" ) + 1;
    $vimeo = substr_replace( $row[ "vimeo" ], "?h=", $p, 0 );
    $vimeo = preg_replace( '/\?\//', '?', $vimeo );
    $srcVideo = "https://player.vimeo.com/video/";
    $srcVideo .= $vimeo;
    $srcVideo .= "&amp;title=0&amp;byline=0&amp;portrait=0&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479";
    if ( strlen( $name ) > 18 ) {
      $lastSpace = strrpos( $name, ' ' );
      $shortName = trim( substr( $name, 0, $lastSpace ) );
    } else {
      $shortName = $name;
    }
    echo '<div class="item" alt="' . $keyword[ $altNum ] . " Example" . '" data-toggle="modal" data-target=".bd-example-modal-lg" data-video="' . $name . '" data-vimeo="' . $vimeo . '">
			<img alt="' . $description . '" src="https://www.websitetalkingheads.com/ivideo/videos/640/' . $name . '.jpg" class="img-fluid" alt="' . $keyword[ $altNum ] . " Example" . '">
			<i class="fas fa-play smallPlayBtn"></i>
			<div class="info">
				<div class="info-title">' . $shortName . '</div>
				<p>' . $description . '</p>
			</div>
		</div>';
    echo PHP_EOL;
    echo '<script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "VideoObject",
		"name": "' . $name . '",
		"description": "' . $description . '",
		"thumbnailUrl": "https://www.websitetalkingheads.com/ivideo/videos/' . $name . '.jpg",
		"uploadDate": "2022-08-30",
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
		"contentUrl": "https://www.websitetalkingheads.com/ivideo/videos/' . $name . '.mp4",
		"embedUrl": "https://www.websitetalkingheads.com/ivideo/videos/' . $name . '",
		"interactionCount": "7018"
	}
</script>';
  }
} else {
  echo "0 results";
}
echo PHP_EOL;
echo '</div>';
echo PHP_EOL;
echo '<div class="rss-feed text-center">
	<a href="../../mrss/' . $mrss . '.rss" target="new" class="mx-auto">
		<img src="../../mrss/images/Talking-Heads-RSS-Feed.png" width="28" height="28" title="Talking Heads Custom Video RSS Feed" alt="Talking Heads Custom Video RSS Feed">
	</a>
</div>';
?>