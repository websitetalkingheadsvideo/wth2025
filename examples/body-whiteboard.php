
<?php





// displays all the file nodes
if(!$xml=simplexml_load_file('https://www.websitetalkingheads.com/examples/examples-whiteboard.xml')){
    trigger_error('Error reading XML file',E_USER_ERROR);
}

foreach($xml as $example){
$target = $example->target;
$image = $example->image;
$altimage = strtok($image,".");
$video = str_replace("'", "", $example->name);

echo '<div class="example-box-vp"><a href="https://www.youtube.com/embed/'.$target.'?rel=0&autoplay=1"  class="various1 iframe"><img src="https://img.youtube.com/vi/'.$target.'/mqdefault.jpg" width="294" height="149" id="'.$video.'" alt="'.$video.'" title="'.$video.'" ></a>';
echo PHP_EOL;
echo '<div id="exampleboxtext"><a href="https://www.youtube.com/embed/'.$target.'?rel=0&autoplay=1"  class="various1 iframe"  id="'.$video.'" alt="'.$video.'" title="'.$video.'" >'.$video.'</a></div>';
echo PHP_EOL;
echo '</div>';
echo PHP_EOL;
}

?>
