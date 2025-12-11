<?php

// displays all the file nodes
if(!$xml=simplexml_load_file('http://www.websitetalkingheads.com/videopresentations/vpexamples.xml')){
    trigger_error('Error reading XML file',E_USER_ERROR);
}

foreach($xml as $example){
$target = $example->target;
$video = str_replace("'", "", $example->name);

echo '<div class="vp-example-box"><a rel="vidbox 640 385" title="'.$video.'" href="http://www.youtube.com/watch?v='.$target.'&rel=0&autoplay=1&hd=1"  target="_blank"><img src="http://img.youtube.com/vi/'.$target.'/mqdefault.jpg" width="208" height="117" id="'.$video.'" title="'.$video.'" alt="'.$video.'" ></a>';
echo PHP_EOL;
echo '<div id="vp-exampleboxtext"><a rel="vidbox 640 385" title="'.$video.'" href="http://www.youtube.com/watch?v='.$target.'&rel=0&autoplay=1" >'.$video.'</a></div>';
echo PHP_EOL;
echo '</div>';
echo PHP_EOL;
}

?>
