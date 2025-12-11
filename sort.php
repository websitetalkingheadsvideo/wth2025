<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="keywords" content="Whiteboard Video, Animation, Explainer Video, Video Production, Web Video, online video,Website Spokesperson Video">
<meta name="description" content="Some examples of our videos. Talking Heads® can create a Whiteboard Video, Animation, Explainer Video, Video Presentation, or Website Spokesperson Video for you.  Contact us for more information.">
<meta name="robots" content="index, follow">
<meta name="author" content="WebsiteTalkingHeads.com">
<title>iVideo Examples</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include("../includes/css-b4.php"); ?>
</head>

<body>
<?php include ('../includes/header_b4.php'); ?>
<section class="jumbotron">
  <div class="container">
    <div class="row">
      <div class="col-4 offset-4">
        <div class="dropdown" id="change">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Videos</button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="https://www.websitetalkingheads.com/ivideo/sort.php">All</a> <a class="dropdown-item" href="https://www.websitetalkingheads.com/ivideo/sort.php?videos=Animation">Animation</a> <a class="dropdown-item" href="https://www.websitetalkingheads.com/ivideo/sort.php?videos=Whiteboard">Whiteboard</a> <a class="dropdown-item" href="https://www.websitetalkingheads.com/ivideo/sort.php?videos=Presentations">Presentations</a> <a class="dropdown-item" href="https://www.websitetalkingheads.com/ivideo/sort.php?videos=Typography">Typography</a> <a class="dropdown-item" href="https://www.websitetalkingheads.com/ivideo/sort.php?videos=Demo">Demo</a> <a class="dropdown-item" href="https://www.websitetalkingheads.com/ivideo/sort.php?videos=product">Product Demonstration</a> <a class="dropdown-item" href="https://www.websitetalkingheads.com/ivideo/sort.php?videos=spokespeople">Spokespeople</a> <a class="dropdown-item" href="https://www.websitetalkingheads.com/ivideo/sort.php?videos=specialty">Specialty</a> <a class="dropdown-item" href="https://www.websitetalkingheads.com/ivideo/sort.php?videos=logo">Logo</a> <a class="dropdown-item" href="https://www.websitetalkingheads.com/ivideo/sort.php?videos=motion">Motion</a> <a class="dropdown-item" href="https://www.websitetalkingheads.com/ivideo/sort.php?videos=3d">3d</a> <a class="dropdown-item" href="https://www.websitetalkingheads.com/ivideo/sort.php?videos=elearning">elearning</a> <a class="dropdown-item" href="https://www.websitetalkingheads.com/ivideo/sort.php?videos=viral">viral</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="container-fluid bg-light py-3">
  <?php
  require( "connect-demo.php" );
  $videos = $_GET[ "videos" ];
  ?>
  <h1 class="text-center text-dark">
    <?=$videos?>
  </h1>
  <?php
  require( "connect-demo.php" );
  $keyword = array();
  if ( !$show ) {
    $show = 99;
  }
  $sql = "SELECT * FROM videos";
  switch ( strtolower($videos) ) {
    case "whiteboard":
      $sql .= " 	where whiteboard=true";
      array_push( $keyword, "whiteboard", "whiteboard animation", "whiteboard explainer", "explainer", "drawing", "sketch" );
      break;
    case "animation":
      $sql .= " 	where animation=true";
      array_push( $keyword, "animation", "animated video", "animated explainer" );
      break;
    case "presentations":
      $sql .= " 	where presentation=true";
      array_push( $keyword, "custom video", "video presentation", "web marketing video", "web video production", "spokesperson video" );
      break;
    case "typography":
      $sql .= " 	where typography=true";
      array_push( $keyword, "custom video", "video presentation", "example video", "demo video" );
      break;
    case "demo":
      $sql .= " 	where demo=true";
      array_push( $keyword, "custom video", "video presentation", "example video", "demo video" );
      break;
    case "product demonstration":
      $sql .= " 	where product=true";
      array_push( $keyword, "product demonstration", "product demo", "overhead unboxing", "demo video" );
      break;
    case "spokespeople":
      $sql .= " 	where spokespeople=true";
      array_push( $keyword, "spokespeople", "website spokesperson", "video spokesperson", "website spokespeople", "video spokespeople" );
      break;
    case "specialty":
      $sql .= " 	where specialty=true";
      array_push( $keyword, "web video", "animation", "animated video", "motion design", "specialty video" );
      break;
    case "motion":
      $sql .= " 	where motion=true";
      array_push( $keyword, "web video", "motion animation", "animated video", "motion design" );
      break;
    case "elearning":
      $sql .= " 	where elearning=true";
      array_push( $keyword, "elearning", "training videos", "educational videos", "elearning video" );
      break;
    case "logo":
      $sql .= " 	where logo=true";
      array_push( $keyword, "logo reveal", "logo reveal animation", "logo stinger", "corporate logo reveal" );
      break;
    case "3d":
      $sql .= " 	where 3d=true";
      array_push( $keyword, "3d animation", "3d explainer", "3d animation", "3d video", "3d character" );
      break;
    case "viral":
      $sql .= " 	where viral=true";
      array_push( $keyword, "social media", "viral video", "social media viral video", "social media strategy", "social media marketing", "social media marketing campaign", "viral video marketing", "viral video strategy " );
      break;
    default:
      $sql .= "";
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
  $result = $conn->query( $sql );
  echo $sql;
  if ( $result->num_rows > 0 ) {
    echo PHP_EOL;
    echo '   <form action="update.php"
    <div class="row poster-row">';
    while ( $row = $result->fetch_assoc() ) {
      $altNum = array_rand( $keyword, 1 );
      $alt = $altNum[ $keyword ];
      $name = $row[ "Name" ];
      $rank = $row[ "rank" ];
      $id = $row[ "ID" ];
      echo '<div class="col-lg-2">';
      echo PHP_EOL;
      echo '<div class="poster" alt="' . $keyword[ $altNum ] . " Example" . '" data-toggle="modal" data-target=".bd-example-modal-lg" data-video="' . $name . '">';
      echo PHP_EOL;
      echo '<img src="https://www.websitetalkingheads.com/ivideo/videos/' . $name . '.jpg" class="img-fluid video" alt="' . $keyword[ $altNum ] . " Example" . '">';
      echo PHP_EOL;
      echo '<div class="btn-play-small"></div>';
      echo PHP_EOL;
      echo '</div>';
      echo PHP_EOL;
      echo '<div class="poster-title">' . $name . '</div>';
      echo '<input type="text" class="text-center mb-1 w-100" id="' . $id . '" name="' . $id . '" value="' . $rank . '">';
      echo '</div>';
      echo PHP_EOL;
      echo PHP_EOL;
    }
  } else {
    echo "0 results";
  }
  echo PHP_EOL;
  echo '</div>';
  echo PHP_EOL;

  ?>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-4 offset-4 text-center">
        <button class="button btn-primary">Update</button>
      </div>
    </div>
  </div>
  </form>
</section>
<?php include("../includes/footer_b4.php"); ?>
<?php include("../styles/includes/modal.php");?>
<script src="ivideo.js" async></script>
</body>
</html>