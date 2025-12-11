<?php
// displays all the file nodes
if(!$xml=simplexml_load_file('https://www.websitetalkingheads.com/examples/examples.xml')){
    trigger_error('Error reading XML file',E_USER_ERROR);
}
echo '<div class="example-column">';
$x=1;
foreach($xml as $example){
$target = $example->target;
$image = $example->image;
$altimage = strtok($image,".");

echo '<div class="example-holder">';
echo PHP_EOL;
echo '<a href="'.$target.'" target="_blank"><img src="https://websitetalkingheads.com/website-spokesperson/images/'.$image.'" id=".$altimage." alt="Walkon Spokesperson Example - .$example->name. " ></a>';
echo PHP_EOL;
echo '<div id="example-text"><a href="'.$target.'" target="_blank">'.str_replace("'", "", $example->name).'</a></div>';
echo PHP_EOL;
echo '</div>';
echo PHP_EOL;
$x=$x+1;
if($x==7){
		break;
	}
}
echo PHP_EOL;
echo '</div>';
echo '<div class="c"></div>';
?>
