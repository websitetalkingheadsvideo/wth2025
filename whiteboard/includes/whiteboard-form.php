<?php
$pageURL = 'http';
if ( $_SERVER[ "HTTPS" ] == "on" ) {
	$pageURL .= "s";
}
$pageURL .= "://";
if ( $_SERVER[ "SERVER_PORT" ] != "80" ) {
	$pageURL .= $_SERVER[ "SERVER_NAME" ] . ":" . $_SERVER[ "SERVER_PORT" ] . $_SERVER[ "REQUEST_URI" ];
} else {
	$pageURL .= $_SERVER[ "SERVER_NAME" ] . $_SERVER[ "REQUEST_URI" ];
}
if ( isset( $_SERVER[ 'HTTP_X_FORWARDED_FOR' ] ) && $_SERVER[ 'HTTP_X_FORWARTDED_FOR' ] != '' ) {
	$sentIP = $_SERVER[ 'HTTP_X_FORWARDED_FOR' ];
} else {
	$sentIP = $_SERVER[ 'REMOTE_ADDR' ];
}
?>
<div id="get-a-quote">
	<div class="pipedriveWebForms" data-pd-webforms="https://webforms.pipedrive.com/f/6iEedSyxyfpsmZJ9Lk6TV4IKc7GVkQli7zOkCePQv0EIbJDBJR3asm5VNIi1XcGkMP"><script src="https://webforms.pipedrive.com/f/loader"></script></div>
</div>