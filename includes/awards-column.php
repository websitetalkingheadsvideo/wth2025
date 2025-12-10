<?php
require( "connect.php" );
$sql = "SELECT * FROM awards WHERE type = 'seal' ORDER BY RAND() LIMIT 1";
$result = $conn->query( $sql );
if ( $result->num_rows > 0 ) {
    $x = 1;
    while ( $row = $result->fetch_assoc() ) {
        $name = $row[ "name" ];
        $alt = $row[ "alt" ];
		$image = $row[ "image"];
        echo( '<a href="#" data-bs-toggle="tooltip" title="' . $alt . '"><img class="best img img-fluid" src="https://www.websitetalkingheads.com/images/' . $image . '.png" alt="' . $alt . '"/>' );
        echo PHP_EOL;
        echo( '</a>' );
        echo PHP_EOL;
    }
} else {
    echo "0 results";
}
echo PHP_EOL;
$sql = "SELECT * FROM awards WHERE type = 'banner' ORDER BY RAND() LIMIT 1";
$result = $conn->query( $sql );
if ( $result->num_rows > 0 ) {
    $x = 1;
    while ( $row = $result->fetch_assoc() ) {
        $name = $row[ "name" ];
        $alt = $row[ "alt" ];
		$image = $row[ "image"];
        echo( '<a href="#" data-bs-toggle="tooltip" title="' . $alt . '"><img class="best img img-fluid" src="https://www.websitetalkingheads.com/images/' . $image . '.png" alt="' . $alt . '"/>' );
        echo PHP_EOL;
        echo( '</a>' );
        echo PHP_EOL;
    }
} else {
    echo "0 results";
}
echo PHP_EOL;
?>