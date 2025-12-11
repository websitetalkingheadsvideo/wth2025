<?php
/*variables available
$video-video video
$alt- alt tag contents
#bgColor-background color
 */
if(!$alt){$alt = "Custom Video Example";}
if(!$bgColor){$bgColor = "#50647F";}
if(!$btnSize){$btnSize = "md";}
	echo PHP_EOL;
	echo '<div style="background:'.$bgColor.';padding:1px">';
		echo '<div class="poster" data-toggle="modal" data-target=".bd-example-modal-lg" data-video="' . $video . '">';
		echo PHP_EOL;
		echo '<img src="https://www.websitetalkingheads.com/ivideo/videos/' . $video . '.jpg" class="img-fluid video" alt="' . $alt . '" >';
		echo PHP_EOL;
		echo '<i class="fas fa-play smallPlayBtn"></i>';
		echo PHP_EOL;
		echo '</div>';
		echo PHP_EOL;
echo PHP_EOL;
echo '</div>';
echo PHP_EOL;

?>