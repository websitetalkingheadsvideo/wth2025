<?php
error_reporting( 2 );
//session_start();
$servername = "vdb1b.pair.com";
$username = "working_39";
$password = "rUnnER#69";
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
$sql = "SELECT * FROM produt_content ORDER BY RAND()";
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
$show = $show;
$sql = "SELECT * FROM " . $table;
$sql .= " ORDER BY list_order LIMIT " . $show;
$result = $conn->query( $sql );

if ( $result->num_rows > 0 ) {
    echo PHP_EOL;
    $x = 0;
    while ( $row = $result->fetch_assoc() ) {
        $target = $row[ "target" ];
        $video = $row[ "name" ];
        echo PHP_EOL;
        if ( is_odd( $x ) ) {
            echo PHP_EOL;
            echo '<div class="row">';
            echo '<div class="col-md-6">';
            echo PHP_EOL;
            echo '<div class="embed-responsive embed-responsive-16by9 box">';
            echo PHP_EOL;
            echo '<iframe class="embed-responsive-item" src="//www.youtube.com/embed/' . $target . '?rel=0" frameborder="0" allowfullscreen"></iframe>';
            echo PHP_EOL;
            echo '</div>';
            echo PHP_EOL;
            echo '<h4 class="text-center">' . $video . '</a></h4>';
            echo PHP_EOL;
            echo '</div>';
            echo '<div class="col-md-6">';
            echo PHP_EOL;
            echo '<h3>';
            echo $mediaTitle[ $x ];
            echo '</h3>';
            $spintax = new Spintax();
            $spun = $spintax->process( $mediaBody[ $x ] );
            echo PHP_EOL;
            echo '<div class="product-demo">';
            echo $spun;
            echo PHP_EOL;
            echo '</div>';
            echo PHP_EOL;
            echo '</div>';
            echo PHP_EOL;
            echo '</div>';
            echo PHP_EOL;
        } else {
            echo PHP_EOL;
            echo '<div class="row">';
            echo '<div class="col-md-6">';
            echo PHP_EOL;
            echo '<h3>';
            echo $mediaTitle[ $x ];
            echo '</h3>';
            $spintax = new Spintax();
            $spun = $spintax->process( $mediaBody[ $x ] );
            echo PHP_EOL;
            echo '<div class="product-demo">';
            echo $spun;
            echo PHP_EOL;
            echo '</div>';
            echo PHP_EOL;
            echo '</div>';
            echo '<div class="col-md-6">';
            echo PHP_EOL;
            echo '<div class="embed-responsive embed-responsive-16by9 box">';
            echo PHP_EOL;
            echo '<iframe class="embed-responsive-item" src="//www.youtube.com/embed/' . $target . '?rel=0" frameborder="0" allowfullscreen"></iframe>';
            echo PHP_EOL;
            echo '</div>';
            echo PHP_EOL;
            echo '<h4 class="text-center">' . $video . '</a></h4>';
            echo PHP_EOL;
            echo '</div>';
            echo PHP_EOL;
            echo '</div>';
        }
        echo PHP_EOL;
        echo '<hr>';
        $x = $x + 1;
        if ( $x == $show ) {
            break;
        }
    }
} else {
    echo "0 results";
}
echo PHP_EOL;

function is_odd( $int ) {
    return ( $int & 1 );
}
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