<?php
// displays all the file nodes
if(!$xml=simplexml_load_file('http://www.websitetalkingheads.com/spokespeople/maleactors.xml')){
    trigger_error('Error reading XML file',E_USER_ERROR);
}
foreach($xml as $item){
	$actor = $item['caption'];
    echo '<div class="col-sm-4 actor" title="'.$actor.'" data-actor="'.$actor.'">';
    echo PHP_EOL;
    echo '<div class="thumb-wrapper"></div>';
    echo PHP_EOL;
    echo '<div class="overlay img-circle"></div>';
    echo PHP_EOL;
    echo '<img src="http://websitetalkingheads.com/carimages/'.$actor.'.png" class="img-responsive center-block" alt="'.$actor.'"/></a>';
    echo PHP_EOL;
    echo '<h3 class="highlight text-center" title="'.$actor.'">'.$actor.'</h3>';
    echo PHP_EOL;
    echo '</div>';
    echo PHP_EOL;
}
?>