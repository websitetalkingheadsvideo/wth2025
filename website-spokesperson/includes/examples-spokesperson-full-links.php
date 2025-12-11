<?php
error_reporting( 2 );
//session_start();
$servername = "vdb1b.pair.com";
$username = "working_39";
$password = "rUnnER#69";
$dbname = "working_examples";
$table = "websites"; //you will need to create this

// Create connection
$conn = mysqli_connect( $servername, $username, $password );
// Check connection
if ( !$conn ) {
    die( "Connection failed: " . mysqli_connect_error() );
    echo( "Connection failed: " . mysqli_connect_error() );
    echo "<br>";
}
$db = mysqli_select_db( $conn, $dbname );

if ( !$db ) {
    die( "Connection failed: " . mysqli_connect_error() );
    echo "<br>";
}
$sql = "SELECT name, image, url FROM websites";
$sql .= " ORDER BY list_order";
$result = $conn->query( $sql );

if ( $result->num_rows > 0 ) {
    echo '<section class="examples text-center">';
echo '<h2>Website Spokesperson Examples</h2><br>';
echo '<div class="container">';
echo '<div class="section-content row">';
     // output data of each row
	$count =0;
     while($row = $result->fetch_assoc()) {
		 $count++;
          echo PHP_EOL;
          echo '<div class="col-lg-4 center-block">';
          echo PHP_EOL;
          echo '	<a href="'.$row["url"].'" target="_blank"><img class="img-responsive box center-block" src="examples/'.$row["image"].'"  id="'.$row["name"].'" alt="Website Spokesperson Example - '.$row["name"].'" ></a>';
          echo PHP_EOL;
          echo '	<h5 class="example-name"><a href="'.$row["url"].'" target="_blank" >'.$row["name"].'</a></h5>';
          echo PHP_EOL;
          echo '</div>';
          echo PHP_EOL;
		 if($count== 9 ){
			 break;
		 }
     }
} else {
     echo "0 results";
}
echo '</div>';
echo PHP_EOL;
echo '</div>';
echo PHP_EOL;
echo '</section><br>';
mysqli_close( $conn );
?>