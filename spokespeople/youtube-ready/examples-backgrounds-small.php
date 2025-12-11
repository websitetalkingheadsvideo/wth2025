<?php
echo '<div class="row center-block">';
echo PHP_EOL;
// displays all the file nodes
if(!$xml=simplexml_load_file('https://www.websitetalkingheads.com/youtube-ready/examples-background-short.xml')){
    trigger_error('Error reading XML file',E_USER_ERROR);
}
foreach($xml as $example){
$target = $example->target;
$video = str_replace("'", "", $example->name);

echo '<div class="col-sm-3 center-block">';
echo '<a class="lightbox" title="Background - '.$video.'" href="https://www.youtube.com/watch?v='.$target.'?rel=0&autoplay=1&hd=1"  target="_blank"><img class="box" src="https://img.youtube.com/vi/'.$target.'/mqdefault.jpg" width="100%" id="'.$video.'" title="Background - '.$video.'" alt="Motion Background - '.$video.'" ></a>';
echo PHP_EOL;
echo '<h3 id="background-name"><a class="lightbox" alt="Background - '.$video.'" title="Background - '.$video.'" href="https://www.youtube.com/watch?v='.$target.'?rel=0&autoplay=1" >'.$video.'</a></h3>';
echo PHP_EOL;
echo '</div>';
echo PHP_EOL;
}
echo '</div>';
echo PHP_EOL;

?>

