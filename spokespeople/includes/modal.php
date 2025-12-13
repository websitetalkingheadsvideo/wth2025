<?php
$pageURl = 'http';
if ( $_SERVER[ "HTTPS" ] == "on" ) {
  $pageURl .= "s";
}
$pageURl .= "://";
if ( $_SERVER[ "SERVER_PORT" ] != "80" ) {
  $pageURl .= $_SERVER[ "SERVER_NAME" ] . ":" . $_SERVER[ "SERVER_PORT" ] . $_SERVER[ "REQUEST_URI" ];
} else {
  $pageURl .= $_SERVER[ "SERVER_NAME" ] . $_SERVER[ "REQUEST_URI" ];
}
if ( isset( $_SERVER[ 'HTTP_X_FORWARDED_FOR' ] ) && $_SERVER[ 'HTTP_X_FORWARTDED_FOR' ] != '' ) {
  $sentIP = $_SERVER[ 'HTTP_X_FORWARDED_FOR' ];
} else {
  $sentIP = $_SERVER[ 'REMOTE_ADDR' ];
}
?>
<div id="mainModal" class="modal fade modal-spokesperson" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-spokesperson">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="videoModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
      </div>
      <div class="d-flex justify-content-center">
        <video id="talking-heads-video" class="" controls preload="auto" data-setup="{}">
          <p> To view this video please enable JavaScript, and consider upgrading to a web browser that supports HTML5 video<br>
            <a href="https://www.websitetalkingheads.com/support/" target="_blank">Talking Heads Support</a> </p>
        </video>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script src="js/spokesperson.js"></script> 
<script>
$(document).ready(function () {
    $("#show-more h4").click(function(){
        $("#hidden-spokespeople").removeClass("d-none");
        $("#show-more").addClass("d-none");
        
    });
});
</script>