<?php
require_once( "connect-demo.php" );
if ( $style === null || $style === "" ) {
  $style = "presentation";
}

  $sql = "SELECT * FROM " . $style . "_content ORDER BY RAND() LIMIT 3";
$contentResult = $conn->query( $sql );
if ( $contentResult->connect_error ) {
  die( "Connection failed: " . $conn->connect_error );
}
$z = 0;
while ( $row = $contentResult->fetch_assoc() ) {
  $mediaHeading[ $z ] = $row[ "title" ];
  $mediaContent[ $z ] = $row[ "content" ];
  $z++;
}
$sql = "SELECT * FROM videos WHERE " . $style . " =true ORDER BY RAND() LIMIT 3";
$result = $conn->query( $sql );
if ( $result->num_rows > 0 ) {
  echo '<div class="card-deck">';
  $x = 0;
  $link = array_rand( $keyword, 3 );
  while ( $row = $result->fetch_assoc() ) {
    switch ( $x ) {
      case 0:
        $bounce = "bounceInLeft";
        break;
      case 1:
        $bounce = "bounceInUp";
        break;
      case 2:
        $bounce = "bounceInRight";
        break;
      default:
        $bounce = "bounceInUp";

    }
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
    echo '
    <div class="card wow ' . $bounce . '" alt="' . $description . '">
      <div class="card-header bg-gradient-mine text-white">' . $video . '</div>
          <div class="card-img-top">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe src="' . $srcVideo . '" frameborder="0" allow="autoplay; fullscreen; picture-in-picture; clipboard-write" style="position:absolute;top:0;left:0;width:100%;height:100%;" title="Avitar Demos"></iframe>
</video>
 <script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "VideoObject",
		"name": "' . $video . '",
		"description": "' . $description . '",
		"thumbnailUrl": "https://www.websitetalkingheads.com/ivideo/videos/' . $video . '.jpg",
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
		"contentUrl": "https://www.websitetalkingheads.com/ivideo/videos/' . $video . '.mp4",
		"embedUrl": "' . $srcVideo . '",
		"interactionCount": "7018"
	}
</script>
                </div>
          </div>
          <div class="card-body">
            <h5 class="card-title">' . $mediaHeading[ $x ] . '</h5>
            <div class="card-text text-dark">' . $mediaContent[ $x ] . '</div>
          </div>
          <div class="card-footer bg-gradient-mine">
		  	<small class="float-right text-light">' . $keyword[ $link[ $x ] ] . '</small>
		  </div>
        </div>';
    $x = $x + 1;
  }
} else {
  echo "
  0 results";
}
echo PHP_EOL;
echo '</div>';
echo '<div class="c"></div>';

?>