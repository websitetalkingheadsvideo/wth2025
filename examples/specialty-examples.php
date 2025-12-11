<?php
require( "connect.php" );
$table = "specialty";
$sql = "SELECT * FROM " . $table . " ORDER BY RAND()";
$result = $conn->query( $sql );

if ( $result->num_rows > 0 ) {
	echo '<div class="row">';
	if ( !$count ) {
		$count = 6;
	}
	$x = 1;
	while ( $row = $result->fetch_assoc() ) {
		$target = $row[ "target" ];
		$video = $row[ "name" ];
		if ( $count === 4 ) {
			echo '<div class="col-sm-6">';
		} else {
			echo '<div class="col-sm-4">';
		}
		echo PHP_EOL;
		echo '<div class="embed-responsive embed-responsive-16by9">';
		echo PHP_EOL;
		echo '<iframe class="embed-responsive-item" type="text/html" src="https://www.youtube.com/embed/' . $target . '?modestbranding=1&rel=0" frameborder="0" alt="Animation Example - ' . $video . '"></iframe>';
		echo PHP_EOL;
		echo '</div>';
		echo '<h5 class="text-center pb-2">' . $video . '</h5>';
		echo PHP_EOL;
		echo '</div>';
		echo PHP_EOL;
		$x = $x + 1;
		if ( $x == $count + 1 ) {
			break;
		}
	}
} else {
	echo "0 results";
}
echo PHP_EOL;
echo '</div>';
echo '<div class="c"></div>';
?>