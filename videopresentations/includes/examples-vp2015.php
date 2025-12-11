<?php

// displays all the file nodes
if(!$xml=simplexml_load_file('https://www.websitetalkingheads.com/videopresentations/vpexamples.xml')){
    trigger_error('Error reading XML file',E_USER_ERROR);
}
echo '<div class="examplesShort">';
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
echo '<div class="new-example-box"><a title="Video Presentation - '.$video.'" href="https://www.youtube.com/watch?v='.$target.'?rel=0&autoplay=1&hd=1"  class="lightbox"><img src="https://img.youtube.com/vi/'.$target.'/mqdefault.jpg" width="219"  id="'.$video.'" title="Video Presentation - '.$video.'" alt="Video Presentation - '.$video.'" ></a>';
echo PHP_EOL;
echo '<div id="new-exampleboxtext"><a href="https://www.youtube.com/watch?v='.$target.'?rel=0&autoplay=1" class="lightbox" alt="Video Presentation - '.$video.'" title="Video Presentation - '.$video.'" >'.$video.' </a></div>';
echo PHP_EOL;
echo '</div>';
echo PHP_EOL;
}
echo '</div>';

?>
