<?php

// displays all the file nodes
if(!$xml=simplexml_load_file('http://www.websitetalkingheads.com/videopresentations/shoulders.xml')){
    trigger_error('Error reading XML file',E_USER_ERROR);
}

foreach($xml as $example){
$target = $example->target;
$video = str_replace("'", "", $example->name);

echo '<div class="vp-example-box"><a href="http://www.youtube.com/embed/'.$target.'?rel=0&autoplay=1&hd=1"  class="various1 iframe"><img src="http://img.youtube.com/vi/'.$target.'/maxresdefault.jpg" width="208" height="117" id="'.$video.'" title="'.$video.'" alt="'.$video.'" ></a>';
echo PHP_EOL;
echo '<div id="vp-exampleboxtext"><a href="http://www.youtube.com/embed/'.$target.'?rel=0&autoplay=1"  class="various1 iframe">'.$video.'</a></div>';
echo PHP_EOL;
echo '</div>';
echo PHP_EOL;
}

?>
