<?php
// displays all the file nodes
if(!$xml=simplexml_load_file('examples/website-spokesperson-examples.xml')){
    trigger_error('Error reading XML file',E_USER_ERROR);
}
echo '<section class="examples text-center">';
echo '<h2>Website Spokesperson Examples</h2><br>';
echo '<div class="container">';
echo '<div class="section-content row">';
foreach($xml as $example){
$target = $example->target;
$image = $example->image;
$altimage = strtok($image,".");
echo PHP_EOL;
echo '<div class="col-xs-4 center-block">';
echo PHP_EOL;
echo '<a href="'.$target.'?lightbox[iframe]=true&lightbox[width]=940&lightbox[height]=700" class="lightbox"><img class="img-responsive box center-block" src="examples/'.$image.'"  id="'.$altimage.'" alt="Walkon Spokesperson Example - '.$example->name.'" ></a>';
echo PHP_EOL;
echo '<h5 class="example-name"><a href="'.$target.'?lightbox[iframe]=true&lightbox[width]=1100&lightbox[height]=700" class="lightbox">'.str_replace("'", "", $example->name).'</a></h5>';
echo PHP_EOL;
echo '</div>';
echo PHP_EOL;
}
echo '</div>';
echo PHP_EOL;
echo '</div>';
echo PHP_EOL;
echo '</section><br>';
?>
