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
  case "3d":
    $sql .= " 	WHERE 3d=true";
    array_push( $keyword, "3d Animation", "3d Character", "3d Explainer", "3d Video Explainer", "3d Explainer Video", "3d Cartoon" );
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
  $sql .= " ORDER BY 'rank' ASC";
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
    $p = strpos( $row[ "vimeo" ], "/" ) + 1;
    $vimeo = substr_replace( $row[ "vimeo" ], "?h=", $p, 0 );
    $vimeo = preg_replace( '/\?\//', '?', $vimeo );
    echo '<div class="col-lg-' . $span . ' poster" alt="' . $keyword[ $altNum ] . " Example" . '" data-toggle="modal" data-target=".bd-example-modal-lg" data-video="' . $name . '" data-vimeo="' . $vimeo . '">';
    echo PHP_EOL;
    echo '<div>';
    echo PHP_EOL;
    echo '<img src="https://www.websitetalkingheads.com/ivideo/videos/' . $name . '.jpg" class="img img-fluid box" alt="' . $keyword[ $altNum ] . " Example" . '">';
    echo PHP_EOL;
    echo '<i class="fas fa-play smallPlayBtn"></i>';
    echo PHP_EOL;
    echo '</div>';
    echo PHP_EOL;
    echo '<div class="poster-title">' . $name . '</div>';
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