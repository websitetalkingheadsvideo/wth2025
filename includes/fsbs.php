<?php
/*
This blocking script is designed to run with Form1 software from www.softswot.com

Script: Form Spam Blocking Script
Version: 2.0
Company: softSWOT
Web Site: https://www.softswot.com
Copyright: www.softswot.com

Build: 20100611

If this message appears in your browser when the file is run from your server, php is not available on that server. Without php this code will not function. When php is supported by your server none of this code is displayed or sent to the browser it is fully processed on the server. For more information visit softswot.com.
Software is provided as is, use is entirely at the users risk, and use acknowledges that softSWOT and all associated parties are held harmless from any claims or losses relating to software provided.

The Form Spam Blocking Script will block form submissions that include blocked words or character combinations.
For additional detail on this script refer to https://www.softswot.com/blockingscript.php

Set the blocked words in the $blockwords variable in the script by inputing words (character combinations) in lowercase letters and each IP Address to block, separated by a comma between the " " 's,

example $blockwords="casino,badword,193.160.28.13";

If a User IP Address or form field matches a block word character combination when the form is submitted form processing will be stopped, no delivery email is sent and nothing is displayed.

To use this code adjust the $blockwords value to the words/IPs you want to block, 
copy and paste all the script code (including the php start and end tags) to the very top of your Form1 form processing code above all other code.

For additional detail on this script refer to https://www.softswot.com/blockingscript.php
*/

$blockwords="";

if(!empty($_SERVER['REMOTE_ADDR'])&&!empty($_POST)){$_POST['REMOTE_ADDR']=$_SERVER['REMOTE_ADDR'];}if(!empty($blockwords)&&!empty($_POST)){$useBlocks=explode(",",$blockwords);foreach($useBlocks as $blockWord){foreach($_POST as $Name=>$Value){$Value=trim($Value);$Value=strtolower($Value);if(!empty($Value)&&strpos($Value,$blockWord)!==false){exit();}}}}
?>