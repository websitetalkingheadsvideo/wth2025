<?php
require( "connect.php" );
$sql = "SELECT * FROM awards WHERE type = 'seal' ORDER BY RAND() LIMIT 2";
$result = $conn->query( $sql );
if ( $result->num_rows > 0 ) {
    echo PHP_EOL;
    while ( $row = $result->fetch_assoc() ) {
        $name = $row[ "name" ];
        $alt = $row[ "alt" ];
        echo( '     <div class="col-sm-5 col-sm-offset-1">' );
        echo( '     <a href="#" data-bs-toggle="tooltip" title="' . $alt . '"><h4 class="pageinfo">' . $name . '</h4');
        echo PHP_EOL;
        echo('<a href="#" data-bs-toggle="tooltip" title="' . $alt . '">');
        echo( '<a href="#" data-bs-toggle="tooltip" title="' . $alt . '"><img class="best img img-fluid" src="images/' . $name . '.png" alt="' . $alt . '"  /></a>');
        echo PHP_EOL;
        echo( '     </div>' );
        echo PHP_EOL;
    }
} else {
    echo "0 results";
}
echo PHP_EOL;
?>