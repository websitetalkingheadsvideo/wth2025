<?php

// displays all the file nodes
if(!$xml=simplexml_load_file('includes/examples-templates.xml')){
    trigger_error('Error reading XML file',E_USER_ERROR);
}
echo '<div class="col-sm-9">';
echo '<h4 class="hidden">Virtual Set Examples</h4>';
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
echo '<div class="new-example-box"><a title="Template Video - '.$video.'" href="https://www.youtube.com/watch?v='.$target.'?rel=0&autoplay=1&hd=1"  class="lightbox"><img src="https://img.youtube.com/vi/'.$target.'/mqdefault.jpg" width="219"  id="'.$video.'" title="Template Video - '.$video.'" alt="Template Video - '.$video.'" ></a>';
echo PHP_EOL;
echo '<h5 class="new-exampleboxtext"><a href="https://www.youtube.com/watch?v='.$target.'?rel=0&autoplay=1" class="lightbox" alt="Template Video - '.$video.'" title="Template Video - '.$video.'" >'.$video.' </a></h5>';
echo PHP_EOL;
echo '</div>';
echo PHP_EOL;
}
echo '</div>';

?>
