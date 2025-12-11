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
  $show = 10;
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
$result = $conn->query( $sql );
if ( $result->num_rows > 0 ) {
  echo PHP_EOL;
  echo '<div id="playlist">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	';
  while ( $row = $result->fetch_assoc() ) {
    $altNum = array_rand( $keyword, 1 );
    $alt = $altNum[ $keyword ];
    $name = $row[ "Name" ];
    $description = $row[ "description" ];
    if ( strlen( $name ) > 18 ) {
      $lastSpace = strrpos( $name, ' ' );
      $shortName = trim( substr( $name, 0, $lastSpace ) );
    } else {
      $shortName = $name;
    }
    echo '<div class="item" alt="' . $keyword[ $altNum ] . " Example" . '" data-toggle="modal" data-target=".bd-example-modal-lg" data-video="' . $name . '">
			<img src="https://www.websitetalkingheads.com/ivideo/videos/640/' . $name . '.jpg" class="img-fluid" alt="' . $keyword[ $altNum ] . " Example" . '">
			<i class="fas fa-play smallPlayBtn"></i>
			<div class="info">
				<div class="info-title">' . $shortName . '</div>
				<p>' . $description . '</p>
			</div>
		</div>';
    echo PHP_EOL;
  }
} else {
  echo "0 results";
}
echo PHP_EOL;
echo '</div>
</div>';
?>