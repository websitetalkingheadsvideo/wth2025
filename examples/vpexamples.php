
<?php





// displays all the file nodes
if(!$xml=simplexml_load_file('https://www.websitetalkingheads.com/examples/examples.xml')){
    trigger_error('Error reading XML file',E_USER_ERROR);
}

foreach($xml as $example){
$target = $example->target;
$image = $example->image;
$altimage = strtok($image,".");

echo '<div class="example-box"><a href="'.$target.'" target="_blank"><img src="https://www.websitetalkingheads.com/images/'.$image.'" width="193" height="137" id='.$altimage.' alt='.$example->name.' ></a>';
echo PHP_EOL;
echo '<div id="exampleboxtext"><a href="'.$target.'" target="_blank">'.str_replace("'", "", $example->name).'</a></div>';
echo PHP_EOL;
echo '</div>';
echo PHP_EOL;
}

?>
