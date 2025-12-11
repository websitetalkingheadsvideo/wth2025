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
<section class="container">
  <?php
  error_reporting( 2 );
  //session_start();
  $servername = "vdb1a.pair.com";
  $username = "working_54";
  $password = "rUnnER#69";
  $dbname = "working_videos";
  // Create connection
  $conn = mysqli_connect( $servername, $username, $password );
  // Check connection
  if ( !$conn ) {
    die( "Connection failed: " . mysqli_connect_error() );
    echo( "Connection failed: " . mysqli_connect_error() );
    echo "<br>";
  }
  $db = mysqli_select_db( $conn, $dbname );

  if ( !$db ) {
    die( "Connection failed: " . mysqli_connect_error() );
    echo "<br>";
  }
  print_r( $_GET );
  foreach ( $_GET as $key => $value ) {
    $sql = "UPDATE videos SET rank='$value' WHERE ID= '$key'";
    if ( $conn->query( $sql ) === TRUE ) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $conn->error;
    }
  }
  ?>
</section>
<section class="jumbotron">
  <div class="container">
    <div class="row">
      <div class="col-4 offset-4">
        <div class="dropdown" id="change">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Videos</button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="https://www.websitetalkingheads.com/ivideo/sort.php">All</a>
            <a class="dropdown-item" href="https://www.websitetalkingheads.com/ivideo/sort.php?videos=Animation">Animation</a>
            <a class="dropdown-item" href="https://www.websitetalkingheads.com/ivideo/sort.php?videos=Whiteboard">Whiteboard</a>
            <a class="dropdown-item" href="https://www.websitetalkingheads.com/ivideo/sort.php?videos=Presentations">Presentations</a>
            <a class="dropdown-item" href="https://www.websitetalkingheads.com/ivideo/sort.php?videos=Typography">Typography</a>
            <a class="dropdown-item" href="https://www.websitetalkingheads.com/ivideo/sort.php?videos=Demo">Demo</a>
            <a class="dropdown-item" href="https://www.websitetalkingheads.com/ivideo/sort.php?videos=product">Product Demonstration</a>
            <a class="dropdown-item" href="https://www.websitetalkingheads.com/ivideo/sort.php?videos=spokespeople">Spokespeople</a>
            <a class="dropdown-item" href="https://www.websitetalkingheads.com/ivideo/sort.php?videos=specialty">Specialty</a>
            <a class="dropdown-item" href="https://www.websitetalkingheads.com/ivideo/sort.php?videos=logo">Logo</a>
            <a class="dropdown-item" href="https://www.websitetalkingheads.com/ivideo/sort.php?videos=motion">Motion</a>
            <a class="dropdown-item" href="https://www.websitetalkingheads.com/ivideo/sort.php?videos=3d">3d</a>
            <a class="dropdown-item" href="https://www.websitetalkingheads.com/ivideo/sort.php?videos=elearning">elearning</a>
            <a class="dropdown-item" href="https://www.websitetalkingheads.com/ivideo/sort.php?videos=viral">viral</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include("../includes/footer_b4.php"); ?>
</body>
</html>