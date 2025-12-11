<?php
require( "connect.php" );
$sql = "SELECT * FROM $table ORDER BY RAND() LIMIT 1";
$result = $conn->query( $sql );
if ( $result->num_rows > 0 ) {
    echo PHP_EOL;
    while ( $row = $result->fetch_assoc() ) {
        $title = $row[ "title" ];
        $content = $row[ "content" ];
        $spintax = new Spintax();
        $spun = $spintax->process( $content );
        $alt = $row[ "alt" ];
        $spintax = new Spintax();
        $spunTitle = $spintax->process( $title );
    echo PHP_EOL;
        echo( '<div class="content">' );
        echo PHP_EOL;
        echo('<h2 class="demo-title">' . $spunTitle . '</h2>');
        echo PHP_EOL;
        echo( '<div class="text">' );
        echo PHP_EOL;
        echo( $spun);
        echo PHP_EOL;
        echo PHP_EOL;
        echo( '   </div>' );
        echo PHP_EOL;
    }
} else {
    echo "0 results";
}
echo PHP_EOL;
?>