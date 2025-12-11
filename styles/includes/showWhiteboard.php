<?php
require_once( "connect-demo.php" );

$keyword = array();
$sql = "SELECT * FROM videos";
$sql .= " 	WHERE whiteboard=true";
array_push( $keyword, "Whiteboard", "Whiteboard Animation", "Whiteboard Explainer", "Explainer", "Drawing", "Sketch" );
$sql .= " ORDER BY RAND()";
$sql .= " LIMIT 12";
//echo  $sql;
$result = $conn->query( $sql );
if ( $result->num_rows > 0 ) {
  echo PHP_EOL;
  echo PHP_EOL;
  echo '<h2 class="text-center">Whiteboard Examples</h2>';
  echo '
  <div class="row">
	';
  while ( $row = $result->fetch_assoc() ) {
    $altNum = array_rand( $keyword, 1 );
    $alt = $altNum[ $keyword ];
    $name = $row[ "Name" ];
    $description = $row[ "description" ];
    $vimeo = substr_replace( $row[ "vimeo" ], "?h=", 10, 0 );
    $vimeo = preg_replace( '/\?\//', '?', $vimeo );
    $srcVideo = "https://player.vimeo.com/video/";
    $srcVideo .= $vimeo;
    $srcVideo .= "&amp;title=0&amp;byline=0&amp;portrait=0&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479";
/*    if ( strlen( $name ) > 18 ) {
      $lastSpace = strrpos( $name, ' ' );
      $shortName = trim( substr( $name, 0, $lastSpace ) );
    } else {
      $shortName = $name;
    }*/
      $shortName = $name;
	  $shortName= strtr($shortName, '-', ' ');
    echo '<div class="new-example-box poster" data-toggle="modal" data-target=".bd-example-modal-lg" data-video="' . $name . '" data-vimeo="' . $vimeo . '">
	<div class="" alt="' . $keyword[ $altNum ] . " Example" . '">
			<img alt="' . $description . '" src="https://www.websitetalkingheads.com/ivideo/videos/640/' . $name . '.jpg" class="img-fluid">
			<div class="info">
				<div class="new-exampleboxtext">' . $shortName . '</div>
			</div>
		</div>
	</div>';
    echo PHP_EOL;
  }
} else {
  echo "0 results";
}
echo PHP_EOL;
echo '
</div>';
echo PHP_EOL;
?>