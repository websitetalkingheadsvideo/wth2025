<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Finding Data</title>
</head>

<body>
<?php
echo '
	<h1>results</h1>';
echo PHP_EOL;
require( "includes/connect-demo.php" );
$sql = "SELECT * FROM videos WHERE whiteboard=true ORDER BY `videos`.`rank` ASC LIMIT 9";
echo '$sql= ' . $sql;
echo PHP_EOL;
$result = $conn->query( $sql );
echo 'rows=' . $result->num_rows;
  echo PHP_EOL;
if ( $result->num_rows > 0 ) {
  echo '<div class="row poster-row">';
  while ( $row = $result->fetch_assoc() ) {
    $altNum = array_rand( $keyword, 1 );
    $alt = $altNum[ $keyword ];
    $name = $row[ "Name" ];
    $vimeo = substr_replace( $row[ "vimeo" ], "?h=", 10, 0 );
    $vimeo = preg_replace( '/\?\//', '?', $vimeo );
    echo '"' . $vimeo . '",';
  }
} else {
  echo "0 results";
}
echo PHP_EOL;
echo '</div>';
?>
</body>
</html>