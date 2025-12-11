<?php
error_reporting( 2 );
//session_start();
$servername = "vdb1b.pair.com";
$username = "working_39";
$password = "rUnnER#69";
$dbname = "working_examples";
$table = "websites"; //you will need to create this

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
$sql = "SELECT name, image, url FROM websites";
$result = $conn->query( $sql );

if ( $result->num_rows > 0 ) {
    echo '<div class="row">';
    $x = 1;
    while($row = $result->fetch_assoc()) {
        $target = $row[ "url" ];
        $image = $row[ "image" ];
        $example = $row[ "name" ];
        echo PHP_EOL;
        echo '<div class="col-md-6 px-1 mb-2">';
        echo PHP_EOL;
        echo '	<div class="text-center">';
        echo PHP_EOL;
        echo '		<a href="' . $target . '" target="_blank"><img class="img-fluid" src="../website-spokesperson/examples/' . $image . '"  id="' . $example . '" alt="Website Spokesperson Example - ' . $example . '" ></a>';
        echo PHP_EOL;
        echo '		<div class="text-center"><a href="' . $target . '" target="_blank" >' . $example . '</a></div>';
        echo PHP_EOL;
        echo '	</div>';
        echo PHP_EOL;
        echo '</div>';
        echo PHP_EOL;
        $x = $x + 1;
        if ( $x == 5 ) {
            break;
        }
    }
    echo '</div>';
    echo PHP_EOL;
    echo '<br>';
}
?>