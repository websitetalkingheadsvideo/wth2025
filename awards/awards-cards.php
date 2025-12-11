<?php
require( "connect.php" );
$sql = "SELECT * FROM awards ORDER BY RAND()";
if($number){
    $sql .= "LIMIT ".$number;
}
$result = $conn->query( $sql );
if ( $result->num_rows > 0 ) {
    echo PHP_EOL;
    echo( '<section class="alert alert-info">
			<div class="card-columns">' );
    echo PHP_EOL;
    while ( $row = $result->fetch_assoc() ) {
        $name = $row[ "name" ];
        $image = $row[ "image" ];
        $body = $row[ "body" ];
        $url = $row[ "url" ];
        $alt = $row[ "alt" ];
        echo PHP_EOL;
        echo( '
<div class="card card-award">
    <div class="card-header">
        <div class="card-image-top">
            <picture>
              <source media="(max-width: 120px)" srcset="images/' . $image . '-sm.png">
              <source media="(max-width: 1280px)" srcset="images/' . $image . '.png">
              <img class="img-fluid mx-auto d-block"  src="images/' . $image . '.png" alt="' . $alt . '">
            </picture>
        </div>
        <h5 class="card-title">' . $name . '</h5>
    </div>
    <div class="card-body">
        ' . $body . '
    </div>
</div>

' );
        echo PHP_EOL;
    }
    echo( '</div>
		</section>' );

} else {
    echo "0 results";
}
echo PHP_EOL;
?>