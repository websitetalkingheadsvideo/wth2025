<?php
require( "connect.php" );
$sql = "SELECT * FROM awards ORDER BY RAND() LIMIT " .$amount;
$result = $conn->query( $sql );
if ( $result->num_rows > 0 ) {
    echo PHP_EOL;
    while ( $row = $result->fetch_assoc() ) {
        $name = $row[ "name" ];
        $title = str_replace("-", " ", $name);
        $title = str_replace(" seal", "", $title);
        $title = str_replace(" banner", "", $title);
        $body = $row[ "body" ];
        $alt = $row[ "alt" ];
        echo( '<div class="container awards">' );
        echo PHP_EOL;
        echo( '<div class="media">' );
        echo PHP_EOL;
        echo( '     <a href="#" data-toggle="tooltip" title="' . $alt . '"> 
            <picture>
              <source srcset="images/' . $image . '-sm.png" media="(max-width: 120px)">
              <source srcset="images/' . $image . '.png">
              <img class="img-fluid mx-auto d-block"  src="images/' . $image . '.png" alt="' . $alt . '">
            </picture> </a>' );
        echo PHP_EOL;
        echo('<div class="media-body">');
        echo PHP_EOL;
        echo('<h2 class="text-capitalize">' .$title . '</h2>');
        echo PHP_EOL;
        echo( $spun);
        echo PHP_EOL;
        echo( '     </div>' );
        echo PHP_EOL;
        echo( '   </div>' );
        echo PHP_EOL;
        echo( '   </div>' );
        echo PHP_EOL;
    }
} else {
    echo "0 results";
}
echo PHP_EOL;
?>