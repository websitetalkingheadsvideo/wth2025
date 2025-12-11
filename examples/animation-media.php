<?php
require( "connect.php" );
$table = "animation_content";
$sql = "SELECT * FROM " . $table . " ORDER BY RAND() LIMIT 3";
$contentResult = $conn->query( $sql );
$z = 0;
while($row = $contentResult->fetch_assoc()){
    $mediaHeading[ $z ] = $row["title"];
    $mediaContent[ $z ] = $row["content"];
    $z++;
}

$table = "animation";
$sql = "SELECT * FROM " . $table . " ORDER BY RAND() LIMIT 3";
$result = $conn->query( $sql );

if ( $result->num_rows > 0 ) {
    echo '<div class="row">';
    $x = 0;
    while ( $row = $result->fetch_assoc() ) {
        $target = $row[ "target" ];
        $video = $row[ "name" ];
        echo '<div class="media">';
        echo PHP_EOL;
        if ( $x === 2 ) {
            echo '<div class="media-right">';
        } else {
            echo '<div class="media-left">';
        }
        echo PHP_EOL;
        echo '<a href="#">';
        echo PHP_EOL;
        echo '<a title="' . $video . '" href="https://www.youtube.com/watch?v=' . $target . '?autoplay=1&loop=1&showinfo=0&rel=0&iv_load_policy=3&color=white" class="lightbox"><img src="https://img.youtube.com/vi/' . $target . '/maxresdefault.jpg" class="media-object box" id="' . $video . '" alt="Animation Example - ' . $example->name . ' " ></a>';
        echo PHP_EOL;
        echo '</a>';
        echo PHP_EOL;
        echo '</div>';
        echo PHP_EOL;
        echo '<div class="media-body">';
        echo PHP_EOL;
        echo '<h4 class="media-heading text-capitalize">' . $mediaHeading[ $x ] . '</h4>';
        echo PHP_EOL;
        echo '<div class="holder">';
        echo PHP_EOL;
        echo $mediaContent[ $x ];
        echo PHP_EOL;
        echo '</div>';
        echo PHP_EOL;
        echo '</div>';
        echo PHP_EOL;
        echo '</div>';
        echo PHP_EOL;
        if ( $x == 2 ) {
            break;
        } else {
            $x = $x + 1;
        }
    }
} else {
    echo "0 results";
}
echo PHP_EOL;
echo '</div>';
echo '<div class="c"></div>';

?>