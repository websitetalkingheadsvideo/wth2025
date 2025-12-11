<?php
// displays all the file nodes
if(!$xml=simplexml_load_file('examples-green-screen.xml')){
    trigger_error('Error reading XML file',E_USER_ERROR);
}
$location = 'Images/';
$x=1;
foreach($xml as $example){
$target = $example->target;
$image = $example->image;
$altimage = strtok($image,".");

echo '<div class="col-sm-4 center-block">';
echo PHP_EOL;
echo '<img class= "img img-responsive" src="'.$location.$target.'.gif"  id=".$altimage." alt="Green Screen Example - .$example->name. " ></a>';
echo PHP_EOL;
echo '<h3 class="example-text">'.str_replace("'", "", $example->name).'</h3>';
echo PHP_EOL;
echo '</div>';
echo PHP_EOL;
$x=$x+1;
if($x==7){
		break;
	}
}
echo PHP_EOL;
echo '<div class="c"></div>';
?>
