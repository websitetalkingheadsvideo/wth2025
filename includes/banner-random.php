<?php
require( "connect.php" );
$sql = "SELECT * FROM awards WHERE type = 'banner' ORDER BY RAND() LIMIT 1";
$result = $conn->query( $sql );
if ( $result->num_rows > 0 ) {
    $x = 1;
    while ( $row = $result->fetch_assoc() ) {
        $name = $row[ "name" ];
        $alt = $row[ "alt" ];
        echo( '<a href="#" data-toggle="tooltip" title="' . $alt . '">' );
        echo PHP_EOL;
        echo( '<h4 class="pageinfo">' . $name );
        echo( '</h4' );
        echo PHP_EOL;
        echo( '<a href="#" data-toggle="tooltip" title="' . $alt . '">' );
        echo PHP_EOL;
        echo( '<a href="#" data-toggle="tooltip" title="' . $alt . '"><img class="best img img-responsive  videoProduction" src="images/' . $name . '.png" alt="' . $alt . '"/>' );
        echo PHP_EOL;
        echo( '</a>' );
        echo PHP_EOL;
    }
} else {
    echo "0 results";
}
echo PHP_EOL;
?>