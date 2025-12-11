<div id="mainModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="videoModalLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
			</div>
			<div class="container d-flex justify-content-center">
				<video id="talking-heads-video" class="video-js" controls preload="auto" width="800" height="432" poster="" data-setup="{}">
					<source src="https://www.websitetalkingheads.com/ivideo/videos/Animated Alien Video.mp4" type='video/mp4'>
					<p class="vjs-no-js">
						To view this video please enable JavaScript, and consider upgrading to a web browser that
						<a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
					</p>
				</video>
			</div>
			<div class="d-none" id="form">
				<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
				<form name="PopUp Form" id="__vtigerWebForm" action="https://websitetalkingheads.od1.vtiger.com/modules/Webforms/capture.php" enctype="multipart/form-data" method="post" accept-charset="utf-8"><input name="__vtrftk" type="hidden" value="sid:2475a3e71dbf0fb16eaa8d219013d1c07e8ee868,1545253846">
					<input name="publicid" type="hidden" value="5979b5c0472a3584b88b3220f2367c07">
					<input name="urlencodeenable" type="hidden" value="1">
					<input name="name" type="hidden" value="PopUp Form">
					<input name="__vtCurrency" type="hidden" value="1">
					<div class="quote-top">
						<div class="">Contact Us<button type="button" class="close" id="contactClose" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button></div>
					</div>
					<div class="inputs">
						<label>Name</label>
						<input name="lastname" required="" type="text" maxlength="100" value="" data-label="" placeholder="Name">
						<label>Email*</label>
						<input name="email" required="" type="email" value="" data-label="Primary Email" placeholder="Email">
						<label>Phone</label>
						<input name="phone" placeholder="Phone" type="text" maxlength="100" value="" data-label="">
						<input name="cf_1001" type="hidden" maxlength="100" value="" data-label="">
						<input name="cf_leads_popup" type="hidden" value="0" data-label="">
					</div>
					<div class="d-flex justify-content-center btn-holder">
						<input class="btn btn-custom" id="vtigerFormSubmitBtn" type="submit" value="SUBMIT">
					</div>
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
							var endDate1;
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
								if ( inputs[ i ].name == "support_start_date" || inputs[ i ].name == "startdate" ) {
									startDate = inputs[ i ].value;
								}
								if ( inputs[ i ].name == "support_end_date" || inputs[ i ].name == "targetenddate" || inputs[ i ].name == "enddate" ) {
									endDate = inputs[ i ].value;
								}
								if ( inputs[ i ].name == "actualenddate" ) {
									endDate1 = inputs[ i ].value;
								}
								if ( type == "email" ) {
									if ( val != "" ) {
										var elemLabel = inputs[ i ].getAttribute( "data-label" );
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
								if ( startDate ) {
									if ( typeof startDate !== "undefined" ) {
										if ( endDate ) {
											if ( typeof endDate !== "undefined" ) {
												startDate = new Date( startDate );
												endDate = new Date( endDate );
												if ( endDate < startDate ) {
													alert( "End Date should be greater than or equal to Start Date" );
													document.getElementById( "vtigerFormSubmitBtn" ).disabled = false;
													return false;
												}
											}
										}
										if ( endDate1 ) {
											if ( typeof endDate1 !== "undefined" ) {
												startDate = new Date( startDate );
												endDate1 = new Date( endDate1 );
												if ( endDate1 < startDate ) {
													alert( "End Date should be greater than or equal to Start Date" );
													document.getElementById( "vtigerFormSubmitBtn" ).disabled = false;
													return false;
												}
											}
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
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="contact">Contact Us</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>