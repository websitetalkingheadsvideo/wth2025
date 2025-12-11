<?php

// displays all the file nodes
if(!$xml=simplexml_load_file('faq.xml')){
    trigger_error('Error reading XML file',E_USER_ERROR);
};
print_r($xml);
$i=0;
foreach ($xml as $questions){
	
	echo PHP_EOL;
	echo PHP_EOL;
	echo "item: ". $xml->$questions->$video;
	echo PHP_EOL;
	echo "question: ".$questions->$item->$question;
	echo PHP_EOL;
	echo "answer: ".$questions->$answer;
	echo PHP_EOL;
	
	$i++;
}
echo '<div class="c"></div>';
?>