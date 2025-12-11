<?php
error_reporting( 2 );
//session_start();
$servername = "vdb1b.pair.com";
$username = "working_39";
$password = "EsQBeq3E";
$dbname = "working_examples";
$table = "animation"; 
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
$sql = "SELECT * FROM " . $table;
$result = $conn->query( $sql );

if ( $result->num_rows > 0 ) {
    echo '<div class="example-column">';
    echo PHP_EOL;
    $x = 1;
while($row = $result->fetch_assoc()) {
    $target = $row[ "target" ];
    $video = $row[ "name" ];
    echo '<div class="col-sm-4">';
    echo PHP_EOL;
    echo '<a title="' . $video . '" href="https://www.youtube.com/watch?v=' . $target . '&rel=0&autoplay=1&hd=1" class="lightbox"><img src="https://img.youtube.com/vi/' . $target . '/mqdefault.jpg" class="img img-responsive box" id="' . $video . '" alt="Custom Video Presentation Example - '.$example->name.' " ></a>';
    echo PHP_EOL;
    echo '<h3 class="example-text"><a title="' . $video . '" href="https://www.youtube.com/watch?v=' . $target . '&rel=0&autoplay=1&hd=1" class="lightbox">' .$video . '</a></h3>'; 
    echo PHP_EOL;
    echo '</div>';
    echo PHP_EOL;
    $x = $x + 1;
    if ( $x == 7 ) {
        break;
    }
     }
} else {
     echo "0 results";
}
echo PHP_EOL;
echo '</div>';
echo '<div class="c"></div>';
?>