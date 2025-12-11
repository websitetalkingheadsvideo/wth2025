<title>Talking Heads Random Custom Video</title>
<?php

// displays all the file nodes
if(!$xml=simplexml_load_file('
https://www.websitetalkingheads.com/videopresentations/vpexamples.xml')){
    trigger_error('Error reading XML file',E_USER_ERROR);
}
$myCount = $xml->count();
$myStop = rand(1, $myCount-1);
$i=0;
foreach($xml as $example){
$target[$i] = $example->target;
$video[$i] = str_replace("'", "", $example->name);
$i++;
}
echo '<a href="http://www.youtube.com/embed/'.$target[$myStop].'?rel=0&autoplay=1" id="videoLink" title="Website Talking Heads | Custom Video Example" alt="Website Talking Heads | Custom Video Example" class="various1 iframe"><img src="http://img.youtube.com/vi/'.$target[$myStop].'/mqdefault.jpg" width="316" height="178" id="theVideo" alt="Website Talking Heads | Custom Video Example" ></a>';
?>