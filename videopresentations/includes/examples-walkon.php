<?php

// displays all the file nodes
if(!$xml=simplexml_load_file('https://www.websitetalkingheads.com/videopresentations/includes/examples-power.xml')){
    trigger_error('Error reading XML file',E_USER_ERROR);
}
echo '<div class="col-sm-9">';
$x =0;
foreach($xml as $example){
	if($x==6){
		break;
	}
		else{
		$target = $example->target;
		$video = str_replace("'", "", $example->name);
		$x=$x+1;
		}
echo '<div class="new-example-box"><a rel="vidbox 640 385" title="Walkon Video - '.$video.'" href="https://www.youtube.com/watch?v='.$target.'?rel=0&autoplay=1&hd=1"  target="_blank"><img src="https://img.youtube.com/vi/'.$target.'/mqdefault.jpg" width="219"  id="'.$video.'" title="Walkon Video - '.$video.'" alt="Walkon Video - '.$video.'" ></a>';
echo PHP_EOL;
echo '<div id="new-exampleboxtext"><a rel="vidbox 640 385" alt="Walkon Video - '.$video.'" title="Walkon Video - '.$video.'" </a></div>';
echo PHP_EOL;
echo '</div>';
echo PHP_EOL;
}
echo '</div>';

?>
