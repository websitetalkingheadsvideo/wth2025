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
    <div class="quote-top">Get A Quote</div>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <form id="__vtigerWebForm_14" name="Whiteboard Captcha" action="https://websitetalkingheads.od1.vtiger.com/modules/Webforms/capture.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
        <input type="hidden" name="__vtrftk" value="sid:e7dc0a10d2007c92ae42229e2a03251f53df823f,1565982563">
        <input type="hidden" name="publicid" value="e3342afbff2983a5148df30f6d7dbe5b">
        <input type="hidden" name="urlencodeenable" value="1">
        <input type="hidden" name="name" value="Whiteboard Captcha">
        <input type="hidden" name="__vtCurrency" value="1">
        <input name="cf_1001" type="hidden" value="<?=$pageURL?>" data-label="">
        <input id="designation" name="designation" type="hidden" value="<?=$sentIP?>" data-label="">
        <div class="inputs">
            <table>
                <tbody>
                    <tr>
                        <td><label>Name </label></td>
                        <td><input type="text" name="lastname" maxlength="80" data-label="" value="" required=""></td>
                    </tr>
                    <tr>
                        <td><label>Email* </label></td>
                        <td><input type="email" name="email" data-label="Primary Email" value="" required="" <="" td=""></td>
                    </tr>
                    <tr>
                        <td><label>Phone* </label></td>
                        <td><input type="text" name="phone" maxlength="50" data-label="" value="" required=""></td>
                    </tr>
                    <tr>
                        <td><label>Description </label></td>
                        <td><textarea name="description"></textarea></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="captcha-holder"> 
            <script src="https://www.google.com/recaptcha/api.js"></script>
            <div class="g-recaptcha" data-sitekey="6LcmdSATAAAAAGWw734vGo0AXQwuxJS7RmDZA_Fe"></div>
            <input type="hidden" id="captchaUrl" value="https://websitetalkingheads.od1.vtiger.com/modules/Settings/Webforms/actions/ValidateCaptcha.php">
            <input type="hidden" id="recaptcha_validation_value" name="recaptcha_validation_value">
        </div>
        <div class="d-flex btn-holder">
            <input class="btn btn-custom" id="vtigerFormSubmitBtn_14" type="submit" value="Learn More">
        </div>
    </form>
</div>
<script src="https://www.websitetalkingheads.com/whiteboard/js/contact.js"></script>
        