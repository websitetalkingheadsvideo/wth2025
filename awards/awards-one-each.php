<?php
$seal = false;
$banner = false;
$visibility = false;
$badge = false;
require( "connect.php" );
$sql = "SELECT * FROM awards ORDER BY RAND()";
$result = $conn->query( $sql );
if ( $result->num_rows > 0 ) {
    echo PHP_EOL;
    echo( '<div class="container awards">
        <div class="row">' );
    while ( $row = $result->fetch_assoc() ) {
        $type = $row[ "type" ];
        $name = $row[ "name" ];
        $image = $row[ "image" ];
        $alt = $row[ "alt" ];
        switch ( $type ) {
            case "seal":
                if ( $seal === false ) {
                    $seal = true;
                    showRecord($url,$alt,$image);
                }
                    break;
            case "banner":
                if ( $banner === false ) {
                    $banner = true;
                    showRecord($url,$alt,$image);
                }
                    break;
            case "visibility":
                if ( $visibility === false ) {
                    $visibility = true;
                    showRecord($url,$alt,$image);
                }
                    break;
        }
    }
    echo( '    
        </div>
    </div>
    ' );
} else {
    echo "0 results";
}
echo PHP_EOL;

function showRecord($url,$alt,$image) {
    echo( '
                <div class="col-md-3">
                    <a href="' . $url . '" data-toggle="tooltip" title="' . $alt . '" class="center">
            <picture>
              <source srcset="images/' . $image . '-sm.png" media="(max-width: 120px)">
              <source srcset="images/' . $image . '.png">
              <img class="img-fluid mx-auto d-block"  src="images/' . $image . '.png" alt="' . $alt . '">
            </picture>
                    </a>
                </div>' );
    echo PHP_EOL;
}
?>