<?php
error_reporting( 2 );
//session_start();
$servername = "vdb1b.pair.com";
$username = "working_39";
$password = "rUnnER#69";
$dbname = "working_examples";
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

$show = $show;
$sql = "SELECT * FROM " . $table;
$sql .= " ORDER BY list_order LIMIT " . $show;
$result = $conn->query( $sql );

if ( $result->num_rows > 0 ) {
    echo PHP_EOL;
    $x = 0;
        echo PHP_EOL;
        echo '<div class="row">';
    while ( $row = $result->fetch_assoc() ) {
        $target = $row[ "target" ];
        $video = $row[ "name" ];
        echo PHP_EOL;
        echo '<div class="col-md-6">';
        echo PHP_EOL;
        echo '<div class="embed-responsive embed-responsive-16by9 box">';
        echo PHP_EOL;
        echo '<iframe class="embed-responsive-item" src="//www.youtube.com/embed/' . $target . '" frameborder="0" allowfullscreen"></iframe>';
        echo PHP_EOL;
        echo '</div>';
        echo PHP_EOL;
        echo '<h4 class="text-center">' . $video . '</a></h4>';
        echo PHP_EOL;
        echo '</div>';
        $x = $x + 1;
        if ( $x == $show ) {
            break;
        }
    }
} else {
    echo "0 results";
}
        echo PHP_EOL;
        echo '</div>';
echo PHP_EOL;
?>