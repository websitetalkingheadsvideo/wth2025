<?php
// displays all the file nodes
if(!$xml=simplexml_load_file('http://www.websitetalkingheads.com/spokespeople/maleactors.xml')){
    trigger_error('Error reading XML file',E_USER_ERROR);
}
$counter = 0;
foreach($xml as $item){
	$actor = $item['caption'];
		
echo '<div class="col-md-4 actor">';
echo PHP_EOL;
echo '<a href="http://websitetalkingheads.com/videos/'.$actor.'.mp4?lightbox[iframe]=true&lightbox[width]=540&lightbox[height]=360" class="lightbox" title="'.$actor.' - Video Spokesperson">';
echo PHP_EOL;
echo '<div class="thumb-wrapper">';
echo PHP_EOL;
echo '<div class="overlay img-circle"></div>';
echo PHP_EOL;
echo '<img src="http://websitetalkingheads.com/carimages/'.$actor.'.png" class="img-responsive img-circle" alt="'.$actor.' - Video Spokesperson"/></div></a>';
echo PHP_EOL;
echo '<h3 class="highlight"><a href="http://websitetalkingheads.com/videos/'.$actor.'.mp4?lightbox[iframe]=true&lightbox[width]=540&lightbox[height]=360" class="lightbox" title="'.$actor.' - Video Spokesperson">'.$actor.' </a></h3>';
echo PHP_EOL;
echo '</div>';
}
?>