<?php
/*variables available
 $rand- Randomize list
 $columns- number of columns
 $type-  type of videos
 $keyword = alt tag for images
 $show-number to show
 Video types
 Whiteboard
 Animation
 Presentation
 Typography
 Demo
 */

require_once( "../video_for_proposals/connect-demo.php" );
$keyword = array();
if ( !$show ) {
  $show = 12;
}
$sql = "SELECT * FROM videos";
$sql .= " 	WHERE whiteboard=true";
array_push( $keyword, "Whiteboard", "Whiteboard Animation", "Whiteboard Explainer", "Explainer", "Drawing", "Sketch" );
$sql .= " ORDER BY `videos`.`rank` ASC";
if ( $show > 0 ) {
  $sql .= " LIMIT 12";
}
//echo  $sql;
$result = $conn->query( $sql );
if ( $result->num_rows > 0 ) {
  echo PHP_EOL;
  echo '<h4 class="hidden">Whiteboard Examples</h4>';
  while ( $row = $result->fetch_assoc() ) {
    $altNum = array_rand( $keyword, 1 );
    $alt = $altNum[ $keyword ];
    $name = $row[ "Name" ];
    $description = $row[ "description" ];
    $vimeo = substr_replace( $row[ "vimeo" ], "?h=", 10, 0 );
    $vimeo = preg_replace( '/\?\//', '?', $vimeo );
    $srcVideo = "https://player.vimeo.com/video/";
    $srcVideo .= $vimeo;
    $srcVideo .= "&amp;title=0&amp;byline=0&amp;portrait=0&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479";
	  $name= strtr($name, '-', ' ');
//    if ( strlen( $name ) > 18 ) {
//      $lastSpace = strrpos( $name, ' ' );
//      $shortName = trim( substr( $name, 0, $lastSpace ) );
//    } else {
//      $shortName = $name;
//    }
      $shortName = $name;
    echo '<div class="new-example-box">
	  <iframe src="https://player.vimeo.com/video/980512386?h=7ddfd568fb&amp;title=0&amp;byline=0&amp;portrait=0&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479?autoplay=1&loop=1&autopause=0" frameborder="0" allow="autoplay; fullscreen; picture-in-picture; clipboard-write" style="position:absolute;top:0;left:0;width:100%;height:100%;" title="talking-heads-video"></iframe>
	  ';
    echo PHP_EOL;
    echo '<h5 class="new-exampleboxtext"><a href="https://vimeo.com/' . $vimeo . '" class="lightbox" alt="Whiteboard Explainer Video - ' . $name . '" title="Whiteboard Explainer Video - ' . $name . '" >' . $name . ' </a></h5>';
    echo PHP_EOL;
    echo '</div>';
    echo PHP_EOL;
  }
} else {
  echo "0 results";
}
echo PHP_EOL;
echo '</div>';
echo PHP_EOL;
echo '<div class="rss-feed text-center">
	<a href="../../mrss/' . $mrss . '.rss" target="new" class="mx-auto">
		<img src="../../mrss/images/Talking-Heads-RSS-Feed.png" width="28" height="28" title="Talking Heads Custom Video RSS Feed" alt="Talking Heads Custom Video RSS Feed">
	</a>
</div>';
?>
