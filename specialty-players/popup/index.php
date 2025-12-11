<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Talking Heads®|Popup Player</title>
<META HTTP-EQUIV="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="keywords" content="Popup Player,online spokesperson, video spokesperson, website talking heads, website actor, website video, transparent flash, virtual spokesperson, spokesperson, video presenter, website presenter, website spokesperson, video salesperson">
<meta name="description" content="pop up video" <!-- (Robot commands: All, None, Index, No Index, Follow, No Follow) -->
<meta name="revisit-after" content="30 days">
<meta name="distribution" content="global">
<meta name="rating" content="general">
<meta name="Content-Language" content="english">
<meta name="verify-v1" content="YNESpqoAwK51PmBV7/PFKLG0agx7AQPKhXXcYAXGGF8="/>
<meta name="norton-safeweb-site-verification" content="iinbv24r-1ix20hgj5l94wz2rnn3aiwi0336hwysvvpiskquy6ijsh9wy12f3znbed-hz1ay8ppzhgqap-sicqtw6ui29d0wrfcpenudh1ml9xwjbej7u25xy9pnm6yr"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include("../../includes/css-b4.php"); ?>
<link href="/css/pricing.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<div id="exitpopup_bg">
</div>
<div class="container">
  <div id="exitpopup">
    <h4 id="popup_title">Wait!!! Before you go...</h4>
    <div class="row" style="max-width: 760px">
      <div class="col-xs-6">
        <div id="talkingPopup">
        </div>
      </div>
      <div class="col-xs-6" style="padding: 0 1rem;margin-top: 40px">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <form name="PopUp Form" id="__vtigerWebForm" action="https://websitetalkingheads.od1.vtiger.com/modules/Webforms/capture.php" enctype="multipart/form-data" method="post" accept-charset="utf-8">
          <input name="__vtrftk" type="hidden" value="sid:f2f6450985c5bfbed518544d98ffccab1653c20e,1519252474">
          <input name="publicid" type="hidden" value="5979b5c0472a3584b88b3220f2367c07">
          <input name="urlencodeenable" type="hidden" value="1">
          <input name="name" type="hidden" value="PopUp Form">
          <input name="__vtCurrency" type="hidden" value="1">
          <table>
            <tbody>
              <tr>
                <td><label>Last Name*</label></td>
                <td><input name="lastname" required="" type="text" value="" data-label=""></td>
              </tr>
              <tr>
                <td><label>Primary Email*</label></td>
                <td><input name="email" required="" type="email" value="" data-label=""></td>
              </tr>
              <tr>
                <td><input name="cf_1001" type="hidden" value="" data-label=""></td>
              </tr>
              <tr>
                <td><input name="cf_leads_popup" type="hidden" value="0" data-label="">
                  <input name="cf_leads_popup" type="hidden" checked="" value="1" data-label=""></td>
              </tr>
              <tr>
                <td><input name="designation" type="hidden" value="" data-label=""></td>
              </tr>
            </tbody>
          </table>
          <input id="vtigerFormSubmitBtn" type="submit" value="Submit">
        </form>
        <script type="text/javascript">
						window.onload = function () {
							var N = navigator.appName,
								ua = navigator.userAgent,
								tem;
							var M = ua.match( /(opera|chrome|safari|firefox|msie)\/?\s*(\.?\d+(\.\d+)*)/i );
							if ( M && ( tem = ua.match( /version\/([\.\d]+)/i ) ) != null ) M[ 2 ] = tem[ 1 ];
							M = M ? [ M[ 1 ], M[ 2 ] ] : [ N, navigator.appVersion, "-?" ];
							var browserName = M[ 0 ];
							var form = document.getElementById( "__vtigerWebForm" ),
								inputs = form.elements;
							form.onsubmit = function () {
								document.getElementById( "vtigerFormSubmitBtn" ).disabled = true;
								var required = [],
									att, val;
								var startDate;
								var endDate;
								for ( var i = 0; i < inputs.length; i++ ) {
									att = inputs[ i ].getAttribute( "required" );
									val = inputs[ i ].value;
									type = inputs[ i ].type;
									if ( inputs[ i ].name == "birthday" ) {
										birthdayDate = new Date( inputs[ i ].value );
										todayDate = new Date();
										todayDate.setHours( 0, 0, 0, 0 );
										birthdayDate.setHours( 0, 0, 0, 0 );
										if ( birthdayDate >= todayDate ) {
											alert( "Date of Birth should be less than Today's Date." );
											document.getElementById( "vtigerFormSubmitBtn" ).disabled = false;
											return false;
										}
									}
									if ( inputs[ i ].name == "support_start_date" ) {
										startDate = inputs[ i ].value;
									}
									if ( inputs[ i ].name == "support_end_date" ) {
										endDate = inputs[ i ].value;
									}
									if ( type == "email" ) {
										if ( val != "" ) {
											var elemLabel = inputs[ i ].getAttribute( "label" );
											var emailFilter = /^[_/a-zA-Z0-9]+([!"#$%&()*+,./:;<=>?\^_`{|}~-]?[a-zA-Z0-9/_/-])*@[a-zA-Z0-9]+([\_\-\.]?[a-zA-Z0-9]+)*\.([\-\_]?[a-zA-Z0-9])+(\.?[a-zA-Z0-9]+)?$/;
											var illegalChars = /[\(\)\<\>\,\;\:\"\[\]]/;
											if ( !emailFilter.test( val ) ) {
												alert( "For " + elemLabel + " field please enter valid email address" );
												document.getElementById( "vtigerFormSubmitBtn" ).disabled = false;
												return false;
											} else if ( val.match( illegalChars ) ) {
												alert( elemLabel + " field contains illegal characters" );
												document.getElementById( "vtigerFormSubmitBtn" ).disabled = false;
												return false;
											}
										}
									}
									if ( startDate && typeof startDate !== "undefined" ) {
										if ( endDate && typeof endDate !== "undefined" ) {
											startDate = new Date( startDate );
											endDate = new Date( endDate );
											if ( endDate < startDate ) {
												alert( "Support End Date should be greater than or equal to Support Start Date" );
												document.getElementById( "vtigerFormSubmitBtn" ).disabled = false;
												return false;
											}
										}
									}
									if ( att != null ) {
										if ( val.replace( /^\s+|\s+$/g, "" ) == "" ) {
											required.push( inputs[ i ].getAttribute( "label" ) );
										}
									}
								}
								if ( required.length > 0 ) {
									alert( "The following fields are required: " + required.join() );
									document.getElementById( "vtigerFormSubmitBtn" ).disabled = false;
									return false;
								}
								var numberTypeInputs = document.querySelectorAll( "input[type=number]" );
								for ( var i = 0; i < numberTypeInputs.length; i++ ) {
									val = numberTypeInputs[ i ].value;
									var elemLabel = numberTypeInputs[ i ].getAttribute( "label" );
									var elemDataType = numberTypeInputs[ i ].getAttribute( "datatype" );
									if ( val != "" ) {
										if ( elemDataType == "double" ) {
											var numRegex = /^[+-]?\d+(\.\d+)?$/;
										} else {
											var numRegex = /^[+-]?\d+$/;
										}
										if ( !numRegex.test( val ) ) {
											alert( "For " + elemLabel + " field please enter valid number" );
											document.getElementById( "vtigerFormSubmitBtn" ).disabled = false;
											return false;
										}
									}
								}
								var dateTypeInputs = document.querySelectorAll( "input[type=date]" );
								for ( var i = 0; i < dateTypeInputs.length; i++ ) {
									dateVal = dateTypeInputs[ i ].value;
									var elemLabel = dateTypeInputs[ i ].getAttribute( "label" );
									if ( dateVal != "" ) {
										var dateRegex = /^[1-9][0-9]{3}-(0[1-9]|1[0-2]|[1-9]{1})-(0[1-9]|[1-2][0-9]|3[0-1]|[1-9]{1})$/;
										if ( !dateRegex.test( dateVal ) ) {
											alert( "For " + elemLabel + " field please enter valid date in required format" );
											document.getElementById( "vtigerFormSubmitBtn" ).disabled = false;
											return false;
										}
									}
								}
								var inputElems = document.getElementsByTagName( "input" );
								var totalFileSize = 0;
								for ( var i = 0; i < inputElems.length; i++ ) {
									if ( inputElems[ i ].type.toLowerCase() === "file" ) {
										var file = inputElems[ i ].files[ 0 ];
										if ( typeof file !== "undefined" ) {
											var totalFileSize = totalFileSize + file.size;
										}
									}
								}
								if ( totalFileSize > 52428800 ) {
									alert( "Maximum allowed file size including all files is 50MB." );
									document.getElementById( "vtigerFormSubmitBtn" ).disabled = false;
									return false;
								}
								var inputElem = document.querySelectorAll( "input[type=file]" );
								var fileSize = 0;
								for ( var i = 0; i < inputElem.length; i++ ) {
									if ( inputElem[ i ].type.toLowerCase() === "file" ) {
										if ( inputElem[ i ].hasAttribute( "selectedTypeImage" ) ) {
											var imageFile = inputElem[ i ].files[ 0 ];
											var fileSize = imageFile.size;
										}
									}
									if ( fileSize > 5242880 ) {
										alert( "Maximum allowed image size is 5MB." );
										document.getElementById( "vtigerFormSubmitBtn" ).disabled = false;
										return false;
									}
								}
							};
						}
					</script>
      </div>
    </div>
  </div>
</div>
<?php include ('../../includes/header25.php'); ?>
<section class="page-header">
  <h1>PopUp Spokesperson</h1>
  <h2>When a visitor moves their mouse to the top of the screen like they are going to leave your site have a Spokesperson PopUp and get them to stay on your site</h2>
</section>
<section class="pricing" style="min-height: 320px"> </section>
<?php include("../../includes/call-contact.php"); ?>
<?php include("../../includes/footer25.php"); ?>
<script src="talkingheads/talking-popup_v6.js"></script> 
<script>
		$( document ).ready( function () {
			$( '#talking-popup' ).talkingPopup();
		} );
	</script>
</body>
</html>