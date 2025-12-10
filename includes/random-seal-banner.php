<?php
require( "connect.php" );
$sql = "SELECT * FROM awards WHERE type = 'seal' ORDER BY RAND() LIMIT 1";
$result = $conn->query( $sql );
if ( $result->num_rows > 0 ) {
    echo PHP_EOL;
    while ( $row = $result->fetch_assoc() ) {
        $alt = $row[ "alt" ];
        $image = $row[ "image" ];
        echo( '<div id="seal">
		<a href="/awards">
			 <img href="#" data-bs-toggle="tooltip" title="' . $alt . '" class="best img img-fluid" src="images/' . $image . '-small.png" alt="' . $alt . '"  />
			 </a>
			 </div>' );
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
        $alt = $row[ "alt" ];
        $image = $row[ "image" ];
        echo( '     <div id="banner">
		<a href="/awards">
		<img href="#" data-bs-toggle="tooltip" title="' . $alt . '" class="best img img-fluid banner" src="images/' . $image . '-small.png" alt="' . $alt . '"/>
			 </a>
		</div>' );
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
        echo( '     <div id="visibility">
		<a href="/awards">
		<img href="#" data-bs-toggle="tooltip" title="' . $alt . '" class="best img img-fluid banner" src="images/' . $image . '.png" alt="' . $alt . '"/>
			 </a>
		</div>' );
    }
} else {
    echo "0 results";
}
echo PHP_EOL;
?>