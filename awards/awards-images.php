<?php
require( "connect.php" );
$sql = "SELECT * FROM awards ORDER BY RAND()";
$result = $conn->query( $sql );
echo( '<div class="d-flex align-items-center">' );
echo PHP_EOL;
if ( $result->num_rows > 0 ) {
    echo PHP_EOL;
    while ( $row = $result->fetch_assoc() ) {
        $name = $row[ "name" ];
        $image = $row[ "image" ];
        $body = $row[ "body" ];
        $alt = $row[ "alt" ];
        echo( '
        <div style="min-width:50px">
            <a href="#" data-toggle="tooltip" title="' . $alt . '">
            <picture>
              <source srcset="images/' . $image . '-sm.png" media="(max-width: 120px)">
              <source srcset="images/' . $image . '.png">
              <img class="img-fluid mx-auto d-block"  src="images/' . $image . '.png" alt="' . $alt . '">
            </picture>
            </a>
        </div>' );
        echo PHP_EOL;
    }
} else {
    echo "0 results";
}
echo PHP_EOL;
?>