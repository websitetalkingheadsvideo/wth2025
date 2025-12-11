<?php
$table = $style . "_content";
$sql = "SELECT * FROM " . $table . " ORDER BY RAND() LIMIT 6";
$contentResult = $conn->query( $sql );
if ( $contentResult->connect_error ) {
	die( "Connection failed: " . $conn->connect_error );
}
$x = 0;
echo '<div class="card-deck">';
while ( $row = $contentResult->fetch_assoc() ) {
	$mediaHeading[ $x ] = $row[ "title" ];
	$mediaContent[ $x ] = $row[ "content" ];
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
	echo '
    <div class="card wow ' . $bounce . '" style="min-width:480px">
      <div class="card-header bg-gradient-mine text-white">' . $mediaHeading[ $x ] . '</div>
          <div class="card-body">
            <h5 class="card-title">' . $video . '</h5>
            <p class="card-text">' . $mediaContent[ $x ] . '</p>
          </div>
        </div>';
	$x = $x + 1;
} 
echo PHP_EOL;
echo '</div>';
echo '<div class="c"></div>';

?>