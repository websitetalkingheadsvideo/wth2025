<?php
require( "connect.php" );
echo PHP_EOL;
echo( '<div class="row">' );
$sql = "SELECT * FROM awards WHERE type = 'banner' ORDER BY RAND() LIMIT 1";
$result = $conn->query( $sql );
if ( $result->num_rows > 0 ) {
    $x = 1;
    while ( $row = $result->fetch_assoc() ) {
        $alt = $row[ "alt" ];
        $image = $row[ "image" ];
        echo( '     <div id="banner" class="col-4 my-auto">
		<a href="/awards">
              <img class="img-fluid mx-auto d-block"  src="../awards/images/' . $image . '-sm.png" alt="' . $alt . '">
			 </a>
		</div>' );
    }
} else {
    echo "0 results";
}
echo PHP_EOL;
$sql = "SELECT * FROM awards WHERE type = 'seal' ORDER BY RAND() LIMIT 1";
$result = $conn->query( $sql );
if ( $result->num_rows > 0 ) {
    echo PHP_EOL;
    while ( $row = $result->fetch_assoc() ) {
        $alt = $row[ "alt" ];
        $image = $row[ "image" ];
        echo( '<div id="seal" class="col-4 my-auto">
		<a href="/awards">
              <img class="img-fluid mx-auto d-block"  src="../awards/images/' . $image . '-sm.png" alt="' . $alt . '">
			 </a>
			 </div>' );
        echo PHP_EOL;
    }
} else {
    echo "0 results";
}
echo PHP_EOL;
$sql = "SELECT * FROM awards WHERE type = 'visibility' ORDER BY RAND() LIMIT 1";
$result = $conn->query( $sql );
if ( $result->num_rows > 0 ) {
    $x = 1;
    while ( $row = $result->fetch_assoc() ) {
        $alt = $row[ "alt" ];
        $image = $row[ "image" ];
        echo( '     <div id="visibility" class="col-4 my-auto">
		<a href="/awards">
              <img class="img-fluid mx-auto d-block"  src="../awards/images/' . $image . '-sm.png" alt="' . $alt . '">
			 </a>
		</div>' );
    }
} else {
    echo "0 results";
}
echo PHP_EOL;
echo( '</div>' );
echo PHP_EOL;
?>