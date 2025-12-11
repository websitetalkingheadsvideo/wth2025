<?php
error_reporting( 2 );
//session_start();
$servername = "vdb1b.pair.com";
$username = "working_39";
$password = "EsQBeq3E";
$dbname = "working_examples";
$sql = "SELECT * FROM " . $table . " ORDER BY 'list_order' LIMIT " . $count;
echo($cols);
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
	case "specialty":
		$alt = array("Specialty Video", "Special", "Custom Video","Specialty Example");
	default:
		$alt = array( $table );
}
$link = 'https://www.youtube.com/watch?v=';
$after = '&rel=0&autoplay=0&hd=1';
	echo PHP_EOL;
if ( $result->num_rows > 0 ) {
	echo PHP_EOL;
	while ( $row = $result->fetch_assoc() ) {
		$target = $row[ "target" ];
		$video = $row[ "name" ];
		$random_keys = array_rand( $alt, 1 );
		$link = $link . $target . $after;
		$title = $alt[ $random_keys ] . ' - ' . $video;
    echo '<div class="new-example-box">';
    echo PHP_EOL;
    echo '<a title="' . $video . '" href="https://www.youtube.com/watch?v=' . $target . '&rel=0&autoplay=1&hd=1" class="lightbox"><img src="https://img.youtube.com/vi/' . $target . '/mqdefault.jpg" class="img img-responsive box" id="' . $video . '" alt="Custom Animation Videos Example - .$example->name. " ></a>';
    echo PHP_EOL;
    echo '<h3 class="example-text"><a title="' . $video . '" href="https://www.youtube.com/watch?v=' . $target . '&rel=0&autoplay=1&hd=1" class="lightbox">' .$video . '</a></h3>'; 
    echo PHP_EOL;
    echo '</div>';
    echo PHP_EOL;
	}
} else {
	echo "0 results";
		echo PHP_EOL;
}
?>