<?php
require( "connect.php" );
$sql = "SELECT * FROM " . $table . " ORDER BY RAND() LIMIT " . $count;
$result = $conn->query( $sql );
switch ( $table ) {
	case "custom_presentations":
		$alt = array( "Custom Video", "Custom Video Presentation", "Custom Videos", "Kickstarter Video", "Powerpoint Alternative", "Professional  Video", "Sales Video", "Video Presentation", "Video Production", "Web Video", "Web Video Production", "Website Video Spokesperson", "YouTube Video", "YouTube Sales Video" );
		break;
	case "whiteboard":
		$alt = array( "Explainer Video", "Whiteboard", "Whiteboard Video", "Whiteboard Animation", "Explainer Video", "Animated Explainer", "Drawing Animation", "Doodle Video", "Sketch Video", "Chalkboard Video", "Whiteboard Sketch", "Explainer Video", "Website Video", "Doodle Animation", "Animated Video", "Drawn Typography", "Explainer Video", "Whiteboard Animation", "Web Video", "Video Production", "Custom Video", "Hand Drawing Video" );
		break;
	case "animation":
		$alt = array( "Animation Video", "Whiteboard Animation", "Animated Explainer Video", "Animated Explainer", "Drawing Animation", "Custom Animation", "Explainer Video", "Website Video", "Animated Video", "Explainer Video", "Web Video", "Video Production", "Custom Video" );
		break;
	case "explainer":
		$alt = array( "Explainer Video", "Explainer", "Explainer Video", "Animated Explainer", "Drawing Animation", "Explainer Video", "Website Video", "Doodle Animation", "Animated Video", "Training Video", "Explainer Video", "Educational Cartoon", "Web Video", "Video Production", "Custom Video" );
		break;
	case "sketch":
		$alt = array( "Sketch Video", "Sketch", "Sketch Video", "Animated Sketch", "Drawing Animation", "Sketch Video", "Doodle Animation", "Animated Sketch Video", "Sketch Video", "Educational Sketch Video", "Hand Drawn Video", "Hand Drawn Animation" );
		break;
	default:
		$alt = array( $table );
}

$link = 'https://www.youtube.com/watch?v=';
$after = '&rel=0&autoplay=1&hd=1';
if ( $result->num_rows > 0 ) {
	echo '<div class="row products">';
	echo PHP_EOL;
	while ( $row = $result->fetch_assoc() ) {
		$target = $row[ "target" ];
		$video = $row[ "name" ];
		$random_keys = array_rand( $alt, 1 );
		$link = $link . $target . $after;
		$title = $alt[ $random_keys ] . ' - ' . $video;
		echo '<div class="example-'. $cols .'" >';
		echo PHP_EOL;
		echo '<a href="' . $link . '" data-toggle="lightbox" data-width="1280" data-title="' . $title . '">';
		echo PHP_EOL;
		echo '<img class="img img-fluid" src="http://img.youtube.com/vi/' . $target . '/maxresdefault.jpg" id="' . $video . '" title="' . $title . '" alt="' . $title . '" >';
		echo PHP_EOL;
		echo '<div class="video-name">' . $video . '</div>';
		echo PHP_EOL;
		echo '</a>';
		echo PHP_EOL;
		echo '</div>';
		echo PHP_EOL;
	}
} else {
	echo "0 results";
}
echo PHP_EOL;
echo '</div>';
?>