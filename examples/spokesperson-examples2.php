<?php
// displays all the file nodes
if(!$xml=simplexml_load_file('https://www.websitetalkingheads.com/website-spokesperson/website-spokesperson-examples.xml')){
    trigger_error('Error reading XML file',E_USER_ERROR);
}
echo '<div class="row example-column center-block">';
$x=1;
foreach($xml as $example){
$target = $example->target;
$image = $example->image;
$name = str_replace("'", "", $example->name);
$altimage = strtok($image,".");

echo '<div class="example-holder-web center-block">';
echo PHP_EOL;
echo '<a class="center-block" href="'.$target.'" target="_blank">';
echo PHP_EOL;
echo '<img class="center-block" src="https://www.websitetalkingheads.com/website-spokesperson/images/'.$image.'"  id="'.$altimage.'" alt="Walkon Spokesperson Example - '.$name.'  " ></a>';
echo PHP_EOL;
echo '<h3 id="example-text"><a href="'.$target.'" target="_blank">'.$name.'</a></h3>';
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
