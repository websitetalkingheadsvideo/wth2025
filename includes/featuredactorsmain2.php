<?php
$url = '
https://websitetalkingheads.com/featuredactor/featuredactor.xml';
$xml = simplexml_load_file($url);
$male=$xml->male;
$female=$xml->female;
$newdate=$xml->newdate;
?>
<script type="text/javascript" src="
https://websitetalkingheads.com/featuredactor/wthvideo/<?=$male?>.js"></script>
<script type="text/javascript" src="
https://websitetalkingheads.com/featuredactor/wthvideo/<?=$female?>.js"></script>
