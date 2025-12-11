<?php
require('connect.php');
$table = "whiteboard"; 
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
$sql = "SELECT * FROM " . $table . " ORDER BY list_order";
$result = $conn->query( $sql );

if ( $result->num_rows > 0 ) {
    echo '<div class="col-md-9">';
    $x = 0;
while($row = $result->fetch_assoc()) {
    $target = $row[ "target" ];
    $video = $row[ "name" ];
    echo '<div class="new-example-box">';
    echo PHP_EOL;
    echo '<a title="' . $video . '" href="https://www.youtube.com/watch?v=' . $target . '&rel=0&autoplay=1&hd=1" class="lightbox"><img src="https://img.youtube.com/vi/' . $target . '/mqdefault.jpg" class="img img-responsive box" id="' . $video . '" alt="Custom Animation Videos Example - .$example->name. " ></a>';
    echo PHP_EOL;
    echo '<h3 class="example-text"><a title="' . $video . '" href="https://www.youtube.com/watch?v=' . $target . '&rel=0&autoplay=1&hd=1" class="lightbox">' .$video . '</a></h3>'; 
    echo PHP_EOL;
    echo '</div>';
    echo PHP_EOL;
    $x = $x + 1;
    if ( $x == 6 ) {
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