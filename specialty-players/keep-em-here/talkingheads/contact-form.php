<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Thanks from Talking Heads</title>
	<link href="../../../css/pricing.css" rel="stylesheet" type="text/css"/>
	<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
	<meta name="keywords" content="Awards, Video Spokesperson, #1 Video SEO, #1 in Video Production, Best Web Design Video Production, Best Web Design Explainer Videos, Video Production, Explainer Videos">
	<meta name="description" content="Talking Heads Awards we have won:#1 Video Spokesperson, #1 Video SEO, #1 in Video Production, Best Web Design Video Production, Best Web Design Explainer Videos">
	<META NAME="robots" CONTENT="index, follow">
	<!-- (Robot commands: All, None, Index, No Index, Follow, No Follow) -->
	<META NAME="revisit-after" CONTENT="30 days">
	<META NAME="distribution" CONTENT="global">
	<META NAME="rating" CONTENT="general">
	<META NAME="Content-Language" CONTENT="english">
	<meta name="verify-v1" content="YNESpqoAwK51PmBV7/PFKLG0agx7AQPKhXXcYAXGGF8="/>
	<meta name="norton-safeweb-site-verification" content="iinbv24r-1ix20hgj5l94wz2rnn3aiwi0336hwysvvpiskquy6ijsh9wy12f3znbed-hz1ay8ppzhgqap-sicqtw6ui29d0wrfcpenudh1ml9xwjbej7u25xy9pnm6yr"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<link href="/css/style.css?v=<?php echo rand(1,100); ?>" rel="stylesheet" type="text/css"/>
	<link href="/css/fluid.css" rel="stylesheet" type="text/css"/>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>

<body>
	<section style="width:375px;height: 174px">
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<form class="keep" name="Keep em here" id="__vtigerWebForm" action="https://websitetalkingheads.od1.vtiger.com/modules/Webforms/capture.php" enctype="multipart/form-data" method="post" accept-charset="utf-8">
			<input name="__vtrftk" type="hidden" value="sid:9aa00fb9b8d4a773e43ac6d8abed4d58bb863539,1530139030">
			<input name="publicid" type="hidden" value="c08cbf87086cd01615f160494e4a0adf">
			<input name="urlencodeenable" type="hidden" value="1">
			<input name="name" type="hidden" value="Keep em here">
			<input name="__vtCurrency" type="hidden" value="1">
			<table>
				<tbody>
					<tr>
						<td>
							<label>Name*</label>

						</td>
						<td>
							<input name="lastname" required="" type="text" value="" data-label=""> </td>
					</tr>
					<tr>
						<td>
							<label>Primary Email*</label>

						</td>
						<td>
							<input name="email" required="" type="email" value="" data-label="Primary Email" td="" <="">
						</td>
					</tr>
					<tr>
						<td>
							<label>Email Opt-in*</label>
						</td>
						<td>
							<input name="emailoptin" type="hidden" value="0" data-label="">
							<input class="my-checkbox" name="emailoptin" required="" type="checkbox" value="1" data-label="">
						</td>
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
						if ( startDate && typeof startDate !== "undefined" ) {
							if ( endDate && typeof endDate !== "undefined" ) {
								startDate = new Date( startDate );
								endDate = new Date( endDate );
								if ( endDate < startDate ) {
									alert( "End Date should be greater than or equal to Start Date" );
									document.getElementById( "vtigerFormSubmitBtn" ).disabled = false;
									return false;
								}
							}
							if ( endDate1 && typeof endDate1 !== "undefined" ) {
								startDate = new Date( startDate );
								endDate1 = new Date( endDate1 );
								if ( endDate1 < startDate ) {
									alert( "End Date should be greater than or equal to Start Date" );
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
	</section>
</body>
</html>