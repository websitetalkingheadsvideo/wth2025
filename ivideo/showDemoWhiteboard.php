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

require( "connect-demo.php" );
$keyword = array();
if ( !$show ) {
	$show = 99;
}
$sql = "SELECT * FROM videos WHERE whiteboard=true";
switch ( $type ) {
	case "Whiteboard":
		array_push( $keyword, "Whiteboard", "Whiteboard Animation", "Whiteboard Explainer", "Explainer", "Drawing", "Sketch" );
		break;
	case "Animation":
		array_push( $keyword, "Animated Video", "Animated Explainer", "Whiteboard Animation" );
		break;
	case "Sketch":
		array_push( $keyword, "Sketch Video","Sketch Animation Video","Whiteboard Sketch Video","Animated Sketch Video" );
		break;
	case "Drawing":
		array_push( $keyword, "Drawing Video","Drawing Animation Video","Whiteboard Drawing Video","Animated Drawing Video" );
		break;
	default:
		array_push( $keyword, "Whiteboard", "Whiteboard Animation", "Whiteboard Explainer", "Explainer", "Drawing", "Sketch" );

}

if ( $rand === true ) {
	$sql .= " ORDER BY RAND()";
}else{
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
		echo '<div class="col-lg-' . $span . ' poster" alt="' . $keyword[ $altNum ] . " Example" . '" data-toggle="modal" data-target=".bd-example-modal-lg" data-video="' . $name . '">';
		echo PHP_EOL;
		echo '<img src="https://www.websitetalkingheads.com/ivideo/videos/' . $name . '.jpg" class="img-fluid video" alt="' . $keyword[ $altNum ] . " Example" . '">';
		echo PHP_EOL;
		echo '<div class="poster-button-small" style="background:'. $btnColor .'"></div>';
		echo PHP_EOL;
		echo '<div class="poster-title text-center">' . $name . '</div>';
		echo PHP_EOL;
		echo '</div>';
		echo PHP_EOL;
	}
} else {
	echo "0 results";
}
echo PHP_EOL;
echo '</div>';
echo PHP_EOL;

?>