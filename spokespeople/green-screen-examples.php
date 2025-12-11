<?php

echo PHP_EOL;
echo '<div class="row">';
// displays all the file nodes
if(!$xml=simplexml_load_file('https://www.websitetalkingheads.com/green-screen-video/green-screen-examples.xml')){
    trigger_error('Error reading XML file',E_USER_ERROR);
}
$location = "../examples/Images/";
$x=1;
foreach($xml as $example){
$target = $example->target;
$image = $example->image;
$altimage = strtok($image,".");

echo '<div class="col-sm-2 px-1">';
echo PHP_EOL;
echo '<div class="mx-auto">';
echo PHP_EOL;
echo '<img class= "img-fluid mx-auto d-block" src="'.$location.$target.'.gif"  id=".$altimage." alt="Green Screen Video Example - '.$example->name.' " ></a>';
echo PHP_EOL;
echo '</div>';
echo PHP_EOL;
echo '<h3 class="text-md">'.str_replace("'", "", $example->name).'</h3>';
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

?>
