<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Talking Heads&reg; Video Order Form</title>
<meta name="keywords" content="order form for video spokesperson, website talking heads, website actor, website video, transparent video, virtual spokesperson, spokesperson, video presenter, website presenter, website spokesperson, video salesperson, Green Screen, Greenscreen, You Tube Ready">
<meta name="description" content="Order a Video Spokesperson for your website or video project.  We will film your script and provide you with Green Screen Video, a YouTube Ready Video, or a Website Spokesperson.">
<META NAME="robots" CONTENT="index, follow">
<!-- (Robot commands: All, None, Index, No Index, Follow, No Follow) -->
<META NAME="revisit-after" CONTENT="30 days">
<META NAME="distribution" CONTENT="global">
<META NAME="rating" CONTENT="general">
<META NAME="Content-Language" CONTENT="english">
<meta name="verify-v1" content="YNESpqoAwK51PmBV7/PFKLG0agx7AQPKhXXcYAXGGF8="/>
<meta name="norton-safeweb-site-verification" content="iinbv24r-1ix20hgj5l94wz2rnn3aiwi0336hwysvvpiskquy6ijsh9wy12f3znbed-hz1ay8ppzhgqap-sicqtw6ui29d0wrfcpenudh1ml9xwjbej7u25xy9pnm6yr"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include("includes/css-b4.php"); ?>
<link href="orderform/css/orderform.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php include ('includes/header25.php'); ?>
<section class="container">
  <h1>Video Order Form</h1>
</section>
<section class="alert alert-info">
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
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <link rel="stylesheet" href="https://websitetalkingheads.od1.vtiger.com//layouts/v8/lib/intl-tel-input/build/css/intlTelInput.min.css">
  <form class="my-form" id="__vtigerWebForm_30" name="Order" action="https://websitetalkingheads.od1.vtiger.com/modules/Webforms/capture.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
    <input type="hidden" name="__vtrftk" value="sid:a13f4694b00cf792086083c9052894fcd449b233,1668030927">
    <input type="hidden" name="publicid" value="00b19d3fb94d85c8e7ff06ac5ee1592e">
    <input type="hidden" name="urlencodeenable" value="1">
    <input type="hidden" name="name" value="Order">
    <input type="hidden" name="cf_contacts_formlocation" maxlength="255" data-label="" value="<?=$sentIP?>">
    <input type="hidden" name="__vtCurrency" value="1">
    <table class="container order">
      <tbody class="w-50 mx-auto">
        <tr>
          <td class="w-25"><label> Last Name
              * </label></td>
          <td class="w-75"><input type="text" name="lastname" maxlength="80" data-label="" value="" required=""></td>
        </tr>
        <tr>
          <td class="w-25"><label> Primary Email
              * </label></td>
          <td class="w-75"><input type="email" name="email" data-label="Primary Email" value="" required=""></td>
        </tr>
        <tr>
          <td class="w-25"><label> Email Opt-in </label></td>
          <td class="w-75"><input type="hidden" name="emailoptin" data-label="" value="0">
            <input type="checkbox" class="checkbox" name="emailoptin" data-label="" value="1"></td>
        </tr>
        <tr>
          <td class="w-25"><label> Office Phone </label></td>
          <td class="w-75"><input type="text" name="phone" maxlength="50" data-label="" value="" data-type="phone"></td>
        </tr>
        <tr>
          <td class="w-25"><label> Organization Name </label></td>
          <td class="w-75"><input type="text" name="account_id" data-label="" value=""></td>
        </tr>
        <tr>
          <td class="w-25"><label> Website </label></td>
          <td class="w-75"><input type="url" name="cf_1150" maxlength="255" data-label="" value=""></td>
        </tr>
        <tr>
          <td class="w-25"><label> Spokesperson </label></td>
          <td class="w-75"><input type="text" name="cf_contacts_spokesperson" maxlength="64" data-label="" value=""></td>
        </tr>
        <tr>
          <td class="w-25"><label> Wardrobe </label></td>
          <td class="w-75"><input type="text" name="cf_contacts_wardrobe" maxlength="255" data-label="" value=""></td>
        </tr>
        <tr>
          <td class="w-25"><label> Script </label></td>
          <td><textarea name="cf_contacts_script"></textarea></td>
        </tr>
        <tr>
          <td class="w-25"><label> Length </label></td>
          <td><select name="cf_contacts_length" data-label="label:Length">
              <option value="">Select Value</option>
              <option value="30 second (1-90 words)"> 30 second (1-90 words) </option>
              <option value="60 second (91-180 words)"> 60 second (91-180 words) </option>
              <option value="Featured Actor 30 second (1-90 words)"> Featured Actor 30 second (1-90 words) </option>
              <option value="Featured Actor 60 second (91-180 words)"> Featured Actor 60 second (91-180 words) </option>
              <option value="Longer or Multiple"> Longer or Multiple </option>
            </select></td>
        </tr>
        <tr>
          <td class="w-25"><label> Crop </label></td>
          <td><select name="cf_contacts_crop" data-label="label:Crop">
              <option value="">Select Value</option>
              <option value="Close Up"> Close Up </option>
              <option value="Half Body"> Half Body </option>
              <option value="Three Quarter"> Three Quarter </option>
              <option value="Full Body"> Full Body </option>
            </select></td>
        </tr>
        <tr>
          <td class="w-25"><label> Positioning </label></td>
          <td><select name="cf_contacts_positioning" data-label="label:Positioning">
              <option value="">Select Value</option>
              <option value="Bottom Left"> Bottom Left </option>
              <option value="Bottom Right"> Bottom Right </option>
              <option value="Bottom Center"> Bottom Center </option>
              <option value="Top Left"> Top Left </option>
              <option value="Top Right"> Top Right </option>
              <option value="Top Center"> Top Center </option>
              <option value="Middle Left"> Middle Left </option>
              <option value="Middle Right"> Middle Right </option>
              <option value="Center"> Center </option>
              <option value="Custom"> Custom </option>
            </select></td>
        </tr>
        <tr>
          <td class="w-25"><label> Appearance </label></td>
          <td><select name="cf_contacts_appearance" data-label="label:Appearance">
              <option value="">Select Value</option>
              <option value="Standing"> Standing </option>
              <option value="Custom"> Custom </option>
            </select></td>
        </tr>
        <tr>
          <td class="w-25"><label> Start </label></td>
          <td><select name="cf_contacts_start" data-label="label:Start">
              <option value="">Select Value</option>
              <option value="Mute"> Mute </option>
              <option value="Image"> Image </option>
            </select></td>
        </tr>
        <tr>
          <td class="w-25"><label> Session </label></td>
          <td><select name="cf_contacts_session" data-label="label:Session">
              <option value="">Select Value</option>
              <option value="Play Every Time"> Play Every Time </option>
              <option value="Once Only"> Once Only </option>
            </select></td>
        </tr>
        <tr>
          <td class="w-25"><label> Comments </label></td>
          <td><textarea name="cf_contacts_comments"></textarea></td>
        </tr>
      </tbody>
    </table>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <div class="g-recaptcha" data-sitekey="6LcmdSATAAAAAGWw734vGo0AXQwuxJS7RmDZA_Fe">
    </div>
    <input type="hidden" id="siteKey_30" value="6LcmdSATAAAAAGWw734vGo0AXQwuxJS7RmDZA_Fe">
    <script src="https://websitetalkingheads.od1.vtiger.com//layouts/v8/lib/intl-tel-input/build/js/intlTelInput.min.js"></script> <script src="https://websitetalkingheads.od1.vtiger.com//layouts/v8/lib/intl-tel-input/build/js/utils.js"></script><script type="text/javascript">window.addEventListener("load", function() {function getCountryCode() {var timezoneCountryMap = { "Africa/Abidjan": "ci", "Africa/Accra": "gh", "Africa/Addis_Ababa": "et", "Africa/Algiers": "dz", "Africa/Asmara": "er", "Africa/Asmera": "er", "Africa/Bamako": "ml", "Africa/Bangui": "cf", "Africa/Banjul": "gm", "Africa/Bissau": "gw", "Africa/Blantyre": "mw", "Africa/Brazzaville": "cg", "Africa/Bujumbura": "bi", "Africa/Cairo": "eg", "Africa/Casablanca": "ma", "Africa/Ceuta": "es", "Africa/Conakry": "gn", "Africa/Dakar": "sn", "Africa/Dar_es_Salaam": "tz", "Africa/Djibouti": "dj", "Africa/Douala": "cm", "Africa/El_Aaiun": "eh", "Africa/Freetown": "sl", "Africa/Gaborone": "bw", "Africa/Harare": "zw", "Africa/Johannesburg": "za", "Africa/Juba": "ss", "Africa/Kampala": "ug", "Africa/Khartoum": "sd", "Africa/Kigali": "rw", "Africa/Kinshasa": "cd", "Africa/Lagos": "ng", "Africa/Libreville": "ga", "Africa/Lome": "tg", "Africa/Luanda": "ao", "Africa/Lubumbashi": "cd", "Africa/Lusaka": "zm", "Africa/Malabo": "gq", "Africa/Maputo": "mz", "Africa/Maseru": "ls", "Africa/Mbabane": "sz", "Africa/Mogadishu": "so", "Africa/Monrovia": "lr", "Africa/Nairobi": "ke", "Africa/Ndjamena": "td", "Africa/Niamey": "ne", "Africa/Nouakchott": "mr", "Africa/Ouagadougou": "bf", "Africa/Porto-Novo": "bj", "Africa/Sao_Tome": "st", "Africa/Timbuktu": "ml", "Africa/Tripoli": "ly", "Africa/Tunis": "tn", "Africa/Windhoek": "na", "America/Adak": "us", "America/Anchorage": "us", "America/Anguilla": "ai", "America/Antigua": "ag", "America/Araguaina": "br", "America/Argentina/Buenos_Aires": "ar", "America/Argentina/Catamarca": "ar", "America/Argentina/ComodRivadavia": "ar", "America/Argentina/Cordoba": "ar", "America/Argentina/Jujuy": "ar", "America/Argentina/La_Rioja": "ar", "America/Argentina/Mendoza": "ar", "America/Argentina/Rio_Gallegos": "ar", "America/Argentina/Salta": "ar", "America/Argentina/San_Juan": "ar", "America/Argentina/San_Luis": "ar", "America/Argentina/Tucuman": "ar", "America/Argentina/Ushuaia": "ar", "America/Aruba": "aw", "America/Asuncion": "py", "America/Atikokan": "ca", "America/Atka": "us", "America/Bahia": "br", "America/Bahia_Banderas": "mx", "America/Barbados": "bb", "America/Belem": "br", "America/Belize": "bz", "America/Blanc-Sablon": "ca", "America/Boa_Vista": "br", "America/Bogota": "co", "America/Boise": "us", "America/Buenos_Aires": "ar", "America/Cambridge_Bay": "ca", "America/Campo_Grande": "br", "America/Cancun": "mx", "America/Caracas": "ve", "America/Catamarca": "ar", "America/Cayenne": "gf", "America/Cayman": "ky", "America/Chicago": "us", "America/Chihuahua": "mx", "America/Coral_Harbour": "ca", "America/Cordoba": "ar", "America/Costa_Rica": "cr", "America/Creston": "ca", "America/Cuiaba": "br", "America/Curacao": "cw", "America/Danmarkshavn": "gl", "America/Dawson": "ca", "America/Dawson_Creek": "ca", "America/Denver": "us", "America/Detroit": "us", "America/Dominica": "dm", "America/Edmonton": "ca", "America/Eirunepe": "br", "America/El_Salvador": "sv", "America/Ensenada": "mx", "America/Fort_Nelson": "ca", "America/Fort_Wayne": "us", "America/Fortaleza": "br", "America/Glace_Bay": "ca", "America/Godthab": "gl", "America/Goose_Bay": "ca", "America/Grand_Turk": "tc", "America/Grenada": "gd", "America/Guadeloupe": "gp", "America/Guatemala": "gt", "America/Guayaquil": "ec", "America/Guyana": "gy", "America/Halifax": "ca", "America/Havana": "cu", "America/Hermosillo": "mx", "America/Indiana/Indianapolis": "us", "America/Indiana/Knox": "us", "America/Indiana/Marengo": "us", "America/Indiana/Petersburg": "us", "America/Indiana/Tell_City": "us", "America/Indiana/Vevay": "us", "America/Indiana/Vincennes": "us", "America/Indiana/Winamac": "us", "America/Indianapolis": "us", "America/Inuvik": "ca", "America/Iqaluit": "ca", "America/Jamaica": "jm", "America/Jujuy": "ar", "America/Juneau": "us", "America/Kentucky/Louisville": "us", "America/Kentucky/Monticello": "us", "America/Knox_IN": "us", "America/Kralendijk": "bq", "America/La_Paz": "bo", "America/Lima": "pe", "America/Los_Angeles": "us", "America/Louisville": "us", "America/Lower_Princes": "sx", "America/Maceio": "br", "America/Managua": "ni", "America/Manaus": "br", "America/Marigot": "mf", "America/Martinique": "mq", "America/Matamoros": "mx", "America/Mazatlan": "mx", "America/Mendoza": "ar", "America/Menominee": "us", "America/Merida": "mx", "America/Metlakatla": "us", "America/Mexico_City": "mx", "America/Miquelon": "pm", "America/Moncton": "ca", "America/Monterrey": "mx", "America/Montevideo": "uy", "America/Montreal": "ca", "America/Montserrat": "ms", "America/Nassau": "bs", "America/New_York": "us", "America/Nipigon": "ca", "America/Nome": "us", "America/Noronha": "br", "America/North_Dakota/Beulah": "us", "America/North_Dakota/Center": "us", "America/North_Dakota/New_Salem": "us", "America/Nuuk": "gl", "America/Ojinaga": "mx", "America/Panama": "pa", "America/Pangnirtung": "ca", "America/Paramaribo": "sr", "America/Phoenix": "us", "America/Port-au-Prince": "ht", "America/Port_of_Spain": "tt", "America/Porto_Acre": "br", "America/Porto_Velho": "br", "America/Puerto_Rico": "pr", "America/Punta_Arenas": "cl", "America/Rainy_River": "ca", "America/Rankin_Inlet": "ca", "America/Recife": "br", "America/Regina": "ca", "America/Resolute": "ca", "America/Rio_Branco": "br", "America/Rosario": "ar", "America/Santa_Isabel": "mx", "America/Santarem": "br", "America/Santiago": "cl", "America/Santo_Domingo": "do", "America/Sao_Paulo": "br", "America/Scoresbysund": "gl", "America/Shiprock": "us", "America/Sitka": "us", "America/St_Barthelemy": "bl", "America/St_Johns": "ca", "America/St_Kitts": "kn", "America/St_Lucia": "lc", "America/St_Thomas": "vi", "America/St_Vincent": "vc", "America/Swift_Current": "ca", "America/Tegucigalpa": "hn", "America/Thule": "gl", "America/Thunder_Bay": "ca", "America/Tijuana": "mx", "America/Toronto": "ca", "America/Tortola": "vg", "America/Vancouver": "ca", "America/Virgin": "vi", "America/Whitehorse": "ca", "America/Winnipeg": "ca", "America/Yakutat": "us", "America/Yellowknife": "ca", "Antarctica/Casey": "aq", "Antarctica/Davis": "aq", "Antarctica/DumontDUrville": "aq", "Antarctica/Macquarie": "au", "Antarctica/Mawson": "aq", "Antarctica/McMurdo": "aq", "Antarctica/Palmer": "aq", "Antarctica/Rothera": "aq", "Antarctica/South_Pole": "aq", "Antarctica/Syowa": "aq", "Antarctica/Troll": "aq", "Antarctica/Vostok": "aq", "Arctic/Longyearbyen": "sj", "Asia/Aden": "ye", "Asia/Almaty": "kz", "Asia/Amman": "jo", "Asia/Anadyr": "ru", "Asia/Aqtau": "kz", "Asia/Aqtobe": "kz", "Asia/Ashgabat": "tm", "Asia/Ashkhabad": "tm", "Asia/Atyrau": "kz", "Asia/Baghdad": "iq", "Asia/Bahrain": "bh", "Asia/Baku": "az", "Asia/Bangkok": "th", "Asia/Barnaul": "ru", "Asia/Beirut": "lb", "Asia/Bishkek": "kg", "Asia/Brunei": "bn", "Asia/Calcutta": "in", "Asia/Chita": "ru", "Asia/Choibalsan": "mn", "Asia/Chongqing": "cn", "Asia/Chungking": "cn", "Asia/Colombo": "lk", "Asia/Dacca": "bd", "Asia/Damascus": "sy", "Asia/Dhaka": "bd", "Asia/Dili": "tl", "Asia/Dubai": "ae", "Asia/Dushanbe": "tj", "Asia/Famagusta": "cy", "Asia/Gaza": "ps", "Asia/Harbin": "cn", "Asia/Hebron": "ps", "Asia/Ho_Chi_Minh": "vn", "Asia/Hong_Kong": "hk", "Asia/Hovd": "mn", "Asia/Irkutsk": "ru", "Asia/Istanbul": "tr", "Asia/Jakarta": "id", "Asia/Jayapura": "id", "Asia/Jerusalem": "il", "Asia/Kabul": "af", "Asia/Kamchatka": "ru", "Asia/Karachi": "pk", "Asia/Kashgar": "cn", "Asia/Kathmandu": "np", "Asia/Katmandu": "np", "Asia/Khandyga": "ru", "Asia/Kolkata": "in", "Asia/Krasnoyarsk": "ru", "Asia/Kuala_Lumpur": "my", "Asia/Kuching": "my", "Asia/Kuwait": "kw", "Asia/Macao": "mo", "Asia/Macau": "mo", "Asia/Magadan": "ru", "Asia/Makassar": "id", "Asia/Manila": "ph", "Asia/Muscat": "om", "Asia/Nicosia": "cy", "Asia/Novokuznetsk": "ru", "Asia/Novosibirsk": "ru", "Asia/Omsk": "ru", "Asia/Oral": "kz", "Asia/Phnom_Penh": "kh", "Asia/Pontianak": "id", "Asia/Pyongyang": "kp", "Asia/Qatar": "qa", "Asia/Qostanay": "kz", "Asia/Qyzylorda": "kz", "Asia/Rangoon": "mm", "Asia/Riyadh": "sa", "Asia/Saigon": "vn", "Asia/Sakhalin": "ru", "Asia/Samarkand": "uz", "Asia/Seoul": "kr", "Asia/Shanghai": "cn", "Asia/Singapore": "sg", "Asia/Srednekolymsk": "ru", "Asia/Taipei": "tw", "Asia/Tashkent": "uz", "Asia/Tbilisi": "ge", "Asia/Tehran": "ir", "Asia/Tel_Aviv": "il", "Asia/Thimbu": "bt", "Asia/Thimphu": "bt", "Asia/Tokyo": "jp", "Asia/Tomsk": "ru", "Asia/Ujung_Pandang": "id", "Asia/Ulaanbaatar": "mn", "Asia/Ulan_Bator": "mn", "Asia/Urumqi": "cn", "Asia/Ust-Nera": "ru", "Asia/Vientiane": "la", "Asia/Vladivostok": "ru", "Asia/Yakutsk": "ru", "Asia/Yangon": "mm", "Asia/Yekaterinburg": "ru", "Asia/Yerevan": "am", "Atlantic/Azores": "pt", "Atlantic/Bermuda": "bm", "Atlantic/Canary": "es", "Atlantic/Cape_Verde": "cv", "Atlantic/Faeroe": "fo", "Atlantic/Faroe": "fo", "Atlantic/Jan_Mayen": "sj", "Atlantic/Madeira": "pt", "Atlantic/Reykjavik": "is", "Atlantic/South_Georgia": "gs", "Atlantic/St_Helena": "sh", "Atlantic/Stanley": "fk", "Australia/ACT": "au", "Australia/Adelaide": "au", "Australia/Brisbane": "au", "Australia/Broken_Hill": "au", "Australia/Canberra": "au", "Australia/Currie": "au", "Australia/Darwin": "au", "Australia/Eucla": "au", "Australia/Hobart": "au", "Australia/LHI": "au", "Australia/Lindeman": "au", "Australia/Lord_Howe": "au", "Australia/Melbourne": "au", "Australia/North": "au", "Australia/NSW": "au", "Australia/Perth": "au", "Australia/Queensland": "au", "Australia/South": "au", "Australia/Sydney": "au", "Australia/Tasmania": "au", "Australia/Victoria": "au", "Australia/West": "au", "Australia/Yancowinna": "au", "Brazil/Acre": "br", "Brazil/DeNoronha": "br", "Brazil/East": "br", "Brazil/West": "br", "Canada/Atlantic": "ca", "Canada/Central": "ca", "Canada/Eastern": "ca", "Canada/Mountain": "ca", "Canada/Newfoundland": "ca", "Canada/Pacific": "ca", "Canada/Saskatchewan": "ca", "Canada/Yukon": "ca", "Chile/Continental": "cl", "Chile/EasterIsland": "cl", "Cuba": "cu", "Egypt": "eg", "Eire": "ie", "Europe/Amsterdam": "nl", "Europe/Andorra": "ad", "Europe/Astrakhan": "ru", "Europe/Athens": "gr", "Europe/Belfast": "gb", "Europe/Belgrade": "rs", "Europe/Berlin": "de", "Europe/Bratislava": "sk", "Europe/Brussels": "be", "Europe/Bucharest": "ro", "Europe/Budapest": "hu", "Europe/Busingen": "de", "Europe/Chisinau": "md", "Europe/Copenhagen": "dk", "Europe/Dublin": "ie", "Europe/Gibraltar": "gi", "Europe/Guernsey": "gg", "Europe/Helsinki": "fi", "Europe/Isle_of_Man": "im", "Europe/Istanbul": "tr", "Europe/Jersey": "je", "Europe/Kaliningrad": "ru", "Europe/Kiev": "ua", "Europe/Kirov": "ru", "Europe/Lisbon": "pt", "Europe/Ljubljana": "si", "Europe/London": "gb", "Europe/Luxembourg": "lu", "Europe/Madrid": "es", "Europe/Malta": "mt", "Europe/Mariehamn": "ax", "Europe/Minsk": "by", "Europe/Monaco": "mc", "Europe/Moscow": "ru", "Europe/Nicosia": "cy", "Europe/Oslo": "no", "Europe/Paris": "fr", "Europe/Podgorica": "me", "Europe/Prague": "cz", "Europe/Riga": "lv", "Europe/Rome": "it", "Europe/Samara": "ru", "Europe/San_Marino": "sm", "Europe/Sarajevo": "ba", "Europe/Saratov": "ru", "Europe/Simferopol": "ru", "Europe/Skopje": "mk", "Europe/Sofia": "bg", "Europe/Stockholm": "se", "Europe/Tallinn": "ee", "Europe/Tirane": "al", "Europe/Tiraspol": "md", "Europe/Ulyanovsk": "ru", "Europe/Uzhgorod": "ua", "Europe/Vaduz": "li", "Europe/Vatican": "va", "Europe/Vienna": "at", "Europe/Vilnius": "lt", "Europe/Volgograd": "ru", "Europe/Warsaw": "pl", "Europe/Zagreb": "hr", "Europe/Zaporozhye": "ua", "Europe/Zurich": "ch", "GB": "gb", "GB-Eire": "gb", "Hongkong": "hk", "Iceland": "is", "Indian/Antananarivo": "mg", "Indian/Chagos": "io", "Indian/Christmas": "cx", "Indian/Cocos": "cc", "Indian/Comoro": "km", "Indian/Kerguelen": "tf", "Indian/Mahe": "sc", "Indian/Maldives": "mv", "Indian/Mauritius": "mu", "Indian/Mayotte": "yt", "Indian/Reunion": "re", "Iran": "ir", "Israel": "il", "Jamaica": "jm", "Japan": "jp", "Kwajalein": "mh", "Libya": "ly", "Mexico/BajaNorte": "mx", "Mexico/BajaSur": "mx", "Mexico/General": "mx", "Navajo": "us", "NZ": "nz", "NZ-CHAT": "nz", "Pacific/Apia": "ws", "Pacific/Auckland": "nz", "Pacific/Bougainville": "pg", "Pacific/Chatham": "nz", "Pacific/Chuuk": "fm", "Pacific/Easter": "cl", "Pacific/Efate": "vu", "Pacific/Enderbury": "ki", "Pacific/Fakaofo": "tk", "Pacific/Fiji": "fj", "Pacific/Funafuti": "tv", "Pacific/Galapagos": "ec", "Pacific/Gambier": "pf", "Pacific/Guadalcanal": "sb", "Pacific/Guam": "gu", "Pacific/Honolulu": "us", "Pacific/Johnston": "um", "Pacific/Kanton": "ki", "Pacific/Kiritimati": "ki", "Pacific/Kosrae": "fm", "Pacific/Kwajalein": "mh", "Pacific/Majuro": "mh", "Pacific/Marquesas": "pf", "Pacific/Midway": "um", "Pacific/Nauru": "nr", "Pacific/Niue": "nu", "Pacific/Norfolk": "nf", "Pacific/Noumea": "nc", "Pacific/Pago_Pago": "as", "Pacific/Palau": "pw", "Pacific/Pitcairn": "pn", "Pacific/Pohnpei": "fm", "Pacific/Ponape": "fm", "Pacific/Port_Moresby": "pg", "Pacific/Rarotonga": "ck", "Pacific/Saipan": "mp", "Pacific/Samoa": "ws", "Pacific/Tahiti": "pf", "Pacific/Tarawa": "ki", "Pacific/Tongatapu": "to", "Pacific/Truk": "fm", "Pacific/Wake": "um", "Pacific/Wallis": "wf", "Pacific/Yap": "fm", "Poland": "pl", "Portugal": "pt", "PRC": "cn", "ROC": "tw", "ROK": "kr", "Singapore": "sg", "Turkey": "tr", "US/Alaska": "us", "US/Aleutian": "us", "US/Arizona": "us", "US/Central": "us", "US/East-Indiana": "us", "US/Eastern": "us", "US/Hawaii": "us", "US/Indiana-Starke": "us", "US/Michigan": "us", "US/Mountain": "us", "US/Pacific": "us", "US/Samoa": "ws", "W-SU": "ru" };var timezone = "";var country = "us";if(Intl && Intl.DateTimeFormat) timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;if (timezoneCountryMap[timezone]) {country = timezoneCountryMap[timezone];}return country;}var phoneFields = document.querySelectorAll('[data-type="phone"]');if (phoneFields && phoneFields.length) {phoneFields.forEach(function(ele) { window.intlTelInput(ele, {initialCountry: "auto",separateDialCode: true,autoPlaceholder: false,hiddenInput: ele.getAttribute("name"),geoIpLookup: function (success, failure) {success(getCountryCode())},});});}});</script>
    <input type="hidden" id="phoneLibScript_30" value="https://websitetalkingheads.od1.vtiger.com//layouts/v8/lib/intl-tel-input/build/js/intlTelInput.min.js" disabled="">
    <input type="hidden" id="phoneUtilScript_30" value="https://websitetalkingheads.od1.vtiger.com//layouts/v8/lib/intl-tel-input/build/js/utils.js" disabled="">
    <div class="text-center">
      <input class="mx-auto text-center btn btn-primary w-25 tex" type="submit" value="Submit" id="vtigerFormSubmitBtn_30">
    </div>
  </form>
  <script  type="text/javascript">window.addEventListener("load", function() { var N=navigator.appName, ua=navigator.userAgent, tem;var M=ua.match(/(opera|chrome|safari|firefox|msie)\/?\s*(\.?\d+(\.\d+)*)/i);if(M && (tem= ua.match(/version\/([\.\d]+)/i))!= null) M[2]= tem[1];M=M? [M[1], M[2]]: [N, navigator.appVersion, "-?"];var browserName = M[0];var form = document.getElementById("__vtigerWebForm_30"), inputs = form.elements; form.onsubmit = function(event) { document.getElementById("vtigerFormSubmitBtn_30").disabled=true;var required = [], att, val; var startDate;var endDate;var endDate1;for (var i = 0; i < inputs.length; i++) { att = inputs[i].getAttribute("required"); val = inputs[i].value; type = inputs[i].type; if(inputs[i].name == "birthday"){birthdayDate = new Date(inputs[i].value);todayDate = new Date();todayDate.setHours(0,0,0,0);birthdayDate.setHours(0,0,0,0);if(birthdayDate >= todayDate){alert("Date of Birth should be less than Today's Date.");document.getElementById("vtigerFormSubmitBtn_30").disabled=false;return false;}}if(inputs[i].getAttribute("data-type") == "anniversary" && inputs[i].value){anniversaryDate = new Date(inputs[i].value);todayDate = new Date();todayDate.setHours(0,0,0,0);anniversaryDate.setHours(0,0,0,0);if(anniversaryDate >= todayDate){var anniversaryLabel = inputs[i].getAttribute("data-displaylabel");alert(anniversaryLabel+" should be less than Today's Date.");document.getElementById("vtigerFormSubmitBtn_30").disabled=false;return false;}}if(inputs[i].name=="support_start_date" || inputs[i].name=="startdate"){startDate = inputs[i].value;}if(inputs[i].name=="support_end_date" || inputs[i].name=="targetenddate" || inputs[i].name=="enddate"){endDate = inputs[i].value;}if(inputs[i].name=="actualenddate"){endDate1 = inputs[i].value;}if(type == "email") {if(val != "") {var elemLabel = inputs[i].getAttribute("data-label");var emailFilter = /^[_/a-zA-Z0-9]+([!"#$%&()*+,./:;<=>?\^_`{|}~-]?[a-zA-Z0-9/_/-])*@[a-zA-Z0-9]+([\_\-\.]?[a-zA-Z0-9]+)*\.([\-\_]?[a-zA-Z0-9])+(\.?[a-zA-Z0-9]+)?$/;var illegalChars= /[\(\)\<\>\,\;\:\"\[\]]/ ;if (!emailFilter.test(val)) {alert("For "+ elemLabel +" field please enter valid email address"); document.getElementById("vtigerFormSubmitBtn_30").disabled=false; return false;} else if (val.match(illegalChars)) {alert(elemLabel +" field contains illegal characters"); document.getElementById("vtigerFormSubmitBtn_30").disabled=false; return false;}}}if(startDate){if(typeof startDate !== "undefined") {if(endDate){if(typeof endDate !== "undefined") {startDate = new Date(startDate);endDate = new Date(endDate);if(endDate < startDate){alert("End Date should be greater than or equal to Start Date");document.getElementById("vtigerFormSubmitBtn_30").disabled = false;return false;}}}if(endDate1){if(typeof endDate1 !== "undefined") {startDate = new Date(startDate);endDate1 = new Date(endDate1);if(endDate1 < startDate){alert("End Date should be greater than or equal to Start Date");document.getElementById("vtigerFormSubmitBtn_30").disabled = false;return false;}}}}}if (att != null) { if (val.replace(/^\s+|\s+$/g, "") == "") { required.push(inputs[i].getAttribute("label")); } } } if (required.length > 0) { alert("The following fields are required: " + required.join()); document.getElementById("vtigerFormSubmitBtn_30").disabled=false;return false; } var numberTypeInputs = document.querySelectorAll("input[type=number]");for (var i = 0; i < numberTypeInputs.length; i++) { val = numberTypeInputs[i].value;var elemLabel = numberTypeInputs[i].getAttribute("label");var elemDataType = numberTypeInputs[i].getAttribute("datatype");if(val != "") {if(elemDataType == "double") {var numRegex = /^[+-]?\d+(\.\d+)?$/;}else{var numRegex = /^[+-]?\d+$/;}if (!numRegex.test(val)) {alert("For "+ elemLabel +" field please enter valid number"); document.getElementById("vtigerFormSubmitBtn_30").disabled=false; return false;}}}var dateTypeInputs = document.querySelectorAll("input[type=date]");for (var i = 0; i < dateTypeInputs.length; i++) {dateVal = dateTypeInputs[i].value;var elemLabel = dateTypeInputs[i].getAttribute("label");if(dateVal != "") {var dateRegex = /^[1-9][0-9]{3}-(0[1-9]|1[0-2]|[1-9]{1})-(0[1-9]|[1-2][0-9]|3[0-1]|[1-9]{1})$/;if(!dateRegex.test(dateVal)) {alert("For "+ elemLabel +" field please enter valid date in required format"); document.getElementById("vtigerFormSubmitBtn_30").disabled=false; return false;}}}var inputElems = document.getElementsByTagName("input");var totalFileSize = 0;for(var i = 0; i < inputElems.length; i++) {if(inputElems[i].type.toLowerCase() === "file") {var file = inputElems[i].files[0];if(typeof file !== "undefined") {var totalFileSize = totalFileSize + file.size;}}}if(totalFileSize > 52428800) {alert("Maximum allowed file size including all files is 50MB.");document.getElementById("vtigerFormSubmitBtn_30").disabled=false;return false;}var inputElem = document.querySelectorAll("input[type=file]");var fileSize = 0;for(var i = 0; i < inputElem.length; i++) {if(inputElem[i].type.toLowerCase() ===  "file") {if(inputElem[i].hasAttribute("selectedTypeImage")) {var imageFile = inputElem[i].files[0];var fileSize = imageFile.size;}}if(fileSize > 5242880) {alert("Maximum allowed image size is 5MB.");document.getElementById("vtigerFormSubmitBtn_30").disabled=false;return false;}}document.getElementById("vtigerFormSubmitBtn_30").disabled = true;var recaptchaResponse = form.getElementsByClassName("g-recaptcha-response")[0].value;if (recaptchaResponse) {var currentUrl = window.location.href;var urlHash = window.location.hash;currentUrl = currentUrl.replace(urlHash, "");currentUrl = currentUrl.replace("#", "");currentUrl = currentUrl.split("?");currentUrl = currentUrl[0];var currentUrlTag = document.createElement("input");currentUrlTag.type = "hidden";currentUrlTag.name = "current_url";currentUrlTag.value = currentUrl;document.getElementById("__vtigerWebForm_30").appendChild(currentUrlTag);return true;} else {alert("Captcha not verified. Please verify captcha.");document.getElementById("vtigerFormSubmitBtn_30").disabled = false;return false;}};var getParams=function(a){var e={},t=document.createElement('a');t.href=a;for(var r=t.search.substring(1).split('&'),l=0;l<r.length;l++){var o=r[l].split('=');if(o[0]){var c=decodeURIComponent(o[1]);c&&(e[o[0]]=c,c&&localStorage.setItem(o[0],c))}}return e};document.querySelectorAll('[data-type=storage]').forEach(a=>{if(a){var e=a.getAttribute('data-param'),t=localStorage.getItem(e);t&&(a.value=t)}});var allParameters=getParams(window.location.href);Object.keys(allParameters).length>0&&document.querySelectorAll('[data-type=url]').forEach(a=>{if(a){var e=a.getAttribute('data-param');allParameters[e]&&(a.value=allParameters[e])}});});</script>
  <aside class="text-center w-50 mx-auto">*Most Browsers now block autoplay with sound.</aside>
</section>
<?php include("includes/call-contact.php"); ?>
<?php include("includes/footer25.php"); ?>
<script type="text/javascript" src="orderform/js/video-type.js"></script> 
<script type="text/javascript" src="orderform/js/basic-video-validate.js"></script> 
<!--	<script src="talkingheads/exit-intent.js"></script>--> 
<script type="text/javascript">
		$( document ).ready( function () {
			$( '[data-toggle="tooltip"]' ).tooltip();
		} );
	</script>
</body>
</html>