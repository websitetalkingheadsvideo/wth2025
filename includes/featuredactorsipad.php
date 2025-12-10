<?php
$url = '
https://websitetalkingheads.com/featuredactor/featuredactor.xml';
$xml = simplexml_load_file($url);
$male=$xml->male;
$female=$xml->female;
$newdate=$xml->newdate;
?>
<div id="featuredactorcenter-ipad">   
	<div id="featuredactorcenter-left-ipad">             
         <video width="540" height="360" controls poster="
https://websitetalkingheads.com/carimages/<?=$male?>.jpg">
   				<source src="
https://websitetalkingheads.com/featuredactor/mp4s/<?=$male?>.mp4" type="video/mp4" />
   				Your browser does not support the video tag.
 	</video> 
  	</div>
	<div id="featuredactorcenter-right-ipad">  
         <video width="540" height="360" controls poster="
https://websitetalkingheads.com/carimages/<?=$female?>.jpg">
   				<source src="
https://websitetalkingheads.com/featuredactor/mp4s/<?=$female?>.mp4" type="video/mp4" />
   				Your browser does not support the video tag.
 		</video> 
    </div>
</div>
<div id="c"></div>