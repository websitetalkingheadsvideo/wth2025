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
  case "Estate":
    $sql .= " 	WHERE estate=true";
    array_push( $keyword, "Custom Video", "Video Presentation", "Example Video", "Demo Video" );
    break;
  default:
    array_push( $keyword, "Estate Planning Video", "Estate Planning Video Example", "Example Video" );

}

if ( $rand === true ) {
  $sql .= " ORDER BY RAND()";
} else {
  $sql .= " ORDER BY `videos`.`rank` ASC";
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
    $vimeo = substr_replace( $row[ "vimeo" ], "?h=", 10, 0 );
    $vimeo = preg_replace( '/\?\//', '?', $vimeo );
    $description = $row[ "description" ];
    $title = str_replace( "-", " ", $name );
    echo '<div class="col-lg-' . $span . ' poster" alt="' . $keyword[ $altNum ] . ' Example" data-toggle="modal" data-target=".bd-example-modal-lg" data-video="' . $name . '" data-vimeo="' . $vimeo . '">';
    echo PHP_EOL;
    echo '<img src="https://www.websitetalkingheads.com/ivideo/videos/' . $name . '.jpg" class="img-fluid video" alt="' . $keyword[ $altNum ] . " Example" . '">';
    echo PHP_EOL;
    echo '<div class="btn-play-small"></div>';
    echo PHP_EOL;
    echo '<div class="poster-title text-center">' . $title . '</div>';
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