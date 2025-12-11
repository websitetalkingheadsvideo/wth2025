<?php
//session_start();
$servername = "vdb1b.pair.com";
$username = "working_39";
$password = "rUnnER#69";
$dbname = "working_examples";
$table = "custom_presentations";
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
    echo '<section id="products" class="container-fluid">';
    echo PHP_EOL;
    echo '<ul class="product-list">';
    echo PHP_EOL;
    error_reporting( 2 );
    while ( $row = $result->fetch_assoc() ) {
        $target = $row[ "target" ];
        $name = $row[ "name" ];
        echo '<li class="col-md-4 product-item" data-prod_id="' . $target . '">';
        echo PHP_EOL;
        echo '<a title="' . $video . '" href="https://www.youtube.com/watch?v=' . $target . '&rel=0&autoplay=1&hd=1" class="lightbox"><img src="https://img.youtube.com/vi/' . $target . '/maxresdefault.jpg" class="img img-responsive box" id="' . $video . '" alt="Custom Video Presentation Example - '.$example->name.' " ></a>';
        echo PHP_EOL;
        echo '<h2 class="product-name" data-type="animation">' . $name . '</h2>';
        echo PHP_EOL;
        echo '</li>';
        echo PHP_EOL;
    }
    echo '</ul>';
    echo PHP_EOL;
    echo '</section>';
} else {
    echo "0 results";
}
?>