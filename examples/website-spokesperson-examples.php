
<?php





// displays all the file nodes
if(!$xml=simplexml_load_file('https://www.websitetalkingheads.com/examples/examples.xml')){
    trigger_error('Error reading XML file',E_USER_ERROR);
}
$x =0;
foreach($xml as $example){
	if($x==16){
		break;
	}
		else{
$target = $example->target;
$image = $example->image;
$altimage = strtok($image,".");
		$x=$x+1;

echo '<div class="example-box center-block">';
echo PHP_EOL;
echo '<a  class="center-block" href="'.$target.'" target="_blank"><img src="https://www.websitetalkingheads.com/images/'.$image.'" id=".$altimage." alt="Walkon Spokesperson Example - .$example->name. " ></a>';
echo PHP_EOL;
echo '<div class="exampleboxtext center-block">';
echo '<a href="'.$target.'" target="_blank">'.str_replace("'", "", $example->name).'</a>';
echo PHP_EOL;
echo '</div>';
echo PHP_EOL;
echo '</div>';
echo PHP_EOL;
}}
echo '<div class="c"></div>';

?>
