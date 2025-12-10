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
        echo( '     <div id="banner" class="col-2 offset-3">
		<a href="/awards">
            <img>
              <source srcset="../awards/images/' . $image . '-sm.png" media="(max-width: 120px)">
              <source srcset="../awards/images/' . $image . '.png">
              <img class="img-fluid mx-auto d-block award-small"  src="../awards/images/' . $image . '.png" alt="' . $alt . '">
            </img>
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
        echo( '<div id="seal" class="col-2">
		<a href="/awards">
            <img>
              <source srcset="../awards/images/' . $image . '-sm.png" media="(max-width: 120px)">
              <source srcset="../awards/images/' . $image . '.png">
              <img class="img-fluid mx-auto d-block award-small"  src="../awards/images/' . $image . '.png" alt="' . $alt . '">
            </img>
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
        echo( '     <div id="visibility" class="col-2 my-auto">
		<a href="/awards">
            <img>
              <source srcset="../awards/images/' . $image . '-sm.png" media="(max-width: 120px)">
              <source srcset="../awards/images/' . $image . '.png">
              <img class="img-fluid mx-auto d-block award-small"  src="../awards/images/' . $image . '.png" alt="' . $alt . '">
            </img>
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