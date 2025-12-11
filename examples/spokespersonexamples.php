<?php
// displays all the file nodes
if(!$xml=simplexml_load_file('https://www.websitetalkingheads.com/examples/examples.xml')){
    trigger_error('Error reading XML file',E_USER_ERROR);
}
foreach($xml as $example){
$target = $example->target;
$image = $example->image;
$altimage = strtok($image,".");
$name = str_replace("'", "", $example->name);

echo '<div class="example-holder-site center-block">';
echo PHP_EOL;
echo '<a href="'.$target.'" target="_blank"><img src="https://websitetalkingheads.com/website-spokesperson/images/'.$image.'"  id=".$altimage." alt="Walkon Spokesperson Example - '.$name.' " class="center-block" ></a>';
echo PHP_EOL;
echo '<div id="example-text"><a href="'.$target.'" target="_blank">'.$name.'</a></div>';
echo PHP_EOL;
echo '</div>';
echo PHP_EOL;
}
?>
