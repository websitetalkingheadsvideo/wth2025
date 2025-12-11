<?php
require( "connect.php" );
$sql = "SELECT * FROM awards ORDER BY RAND()";
$result = $conn->query( $sql );
if ( $result->num_rows > 0 ) {
    echo PHP_EOL;
    while ( $row = $result->fetch_assoc() ) {
        $name = $row[ "name" ];
        $image = $row[ "image" ];
        $body = $row[ "body" ];
        $alt = $row[ "alt" ];
        echo( '<section class="alert alert-info">' );
        echo PHP_EOL;
        echo( '<div class="container">' );
        echo PHP_EOL;
        echo( '<div class="d-flex align-items-center">' );
        echo PHP_EOL;
        echo( '<div class="col-lg-4">' );
        echo PHP_EOL;
        echo( '     <a href="#" data-toggle="tooltip" title="' . $alt . '"> <img class="img-fluid mx-auto d-block" src="../images/' . $image . '.png"  alt="' . $alt . '" /> </a>' );
        echo PHP_EOL;
        echo( '     </div>' );
        echo PHP_EOL;
        echo('<div class="col-lg-8">');
        echo PHP_EOL;
        echo('<h2 class="text-capitalize text-center">' .$name . '</h2>');
        echo PHP_EOL;
        echo( $spun);
        echo PHP_EOL;
        echo( '     </div>' );
        echo PHP_EOL;
        echo( '     </div>' );
        echo PHP_EOL;
        echo( '   </div>' );
        echo PHP_EOL;
        echo( '</section>' );
        echo PHP_EOL;
    }
} else {
    echo "0 results";
}
echo PHP_EOL;
?>