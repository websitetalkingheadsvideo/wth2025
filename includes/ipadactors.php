<?php
$url = '
https://websitetalkingheads.com/actors/actors-male.xml';
$xml = simplexml_load_file($url);
foreach($xml as $actor){

echo '<div id="ipadimages"><a href="../videos/'.$actor.'.mp4"><img src="../carimages/'.$actor.'.png" width="160" height="180" id='.$actor.' alt='.$actor.' ></a>'.$actor.'</div>';
}

?>
<div id="c"></div>