<?php
error_reporting( 2 );
//session_start();
$servername = "vdb1b.pair.com";
$username = "working_39";
$password = "EsQBeq3E";
$dbname = "working_examples";
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
$sql = "SELECT * FROM whiteboard_content ORDER BY RAND()";
$content = $conn->query( $sql );
if ( $content->num_rows > 0 ) {
    $z = 0;
    while ( $r = $content->fetch_assoc() ) {
        $mediaBody[ $z ] = $r[ 'content' ];
        $mediaTitle[ $z ] = $r[ 'title' ];
        $z++;
    }
} else {
    echo( 'fail' );
}
if ( is_null( $table ) ) {
    $table = "whiteboard";
}
$show = $show+1;
$sql = "SELECT * FROM " . $table;
$sql .= " ORDER BY RAND() LIMIT " . $show;
$result = $conn->query( $sql );

if ( $result->num_rows > 0 ) {
    echo '<section class="whiteboard">';
    echo PHP_EOL;
    echo '<div class="row">';
    $x = 1;
    while ( $row = $result->fetch_assoc() ) {
        $target = $row[ "target" ];
        $video = $row[ "name" ];
        echo '<div class="col-md-12 striped">';
        echo PHP_EOL;
        echo '<div class="text-center min">';
        echo PHP_EOL;
        echo '<h2>';
        echo $mediaTitle[ $x ];
        echo '</h2>';
        echo PHP_EOL;
        echo '</div>';
        echo PHP_EOL;
        echo '<div class="pull-left best-whiteboard">';
        echo PHP_EOL;
        echo '<div class="embed-responsive embed-responsive-16by9 box">';
        echo PHP_EOL;
        echo '<iframe class="embed-responsive-item" src="//www.youtube.com/embed/' . $target . '" frameborder="0" allowfullscreen"></iframe>';
        echo PHP_EOL;
        echo '</div>';
        echo PHP_EOL;
        echo '<h4 class="text-center">' . $video . '</a></h3>';
        echo PHP_EOL;
        echo '</div>';
        echo PHP_EOL;
        echo '<div class="text-left">';
        echo PHP_EOL;
        $spintax = new Spintax();
        $spun = $spintax->process( $mediaBody[ $x ] );
        echo $spun;
        echo PHP_EOL;
        echo '</div>';
        echo PHP_EOL;
        echo '</div>';
        $x = $x + 1;
        if ( $x == $show ) {
            break;
        }
    }
} else {
    echo "0 results";
}
echo PHP_EOL;
echo '</div>';
echo PHP_EOL;
echo '</section>';
class Spintax {
    public

    function process( $text ) {
        return preg_replace_callback( '/\{(((?>[^\{\}]+)|(?R))*)\}/x', array(
            $this,
            'replace'
        ), $text );
    }
    public

    function replace( $text ) {
        $text = $this->process( $text[ 1 ] );
        $parts = explode( '|', $text );
        return $parts[ array_rand( $parts ) ];
    }
}
?>