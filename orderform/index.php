<?php
session_start();
?>
<!doctype html>

<head>
<meta charset="utf-8">
<title>Talking Heads&reg; Website Spokesperson Order Form</title>
<meta name="keywords" content="order form for video spokesperson, website talking heads, website actor, website video, transparent video, virtual  spokesperson, spokesperson, video presenter, website presenter, website spokesperson, video salesperson, Green Screen, Greenscreen, You Tube Ready">
<meta name="description" content="Order a Video Spokesperson for your website or video project.  We will  film your script and provide you with Green Screen Video, a YouTube Ready Video, or a Website Spokesperson.">
<META NAME="robots" CONTENT="index, follow">
<!-- (Robot commands: All, None, Index, No Index, Follow, No Follow) -->
<META NAME="revisit-after" CONTENT="30 days">
<META NAME="distribution" CONTENT="global">
<META NAME="rating" CONTENT="general">
<META NAME="Content-Language" CONTENT="english">
<meta name="verify-v1" content="YNESpqoAwK51PmBV7/PFKLG0agx7AQPKhXXcYAXGGF8="/>
<meta name="norton-safeweb-site-verification" content="iinbv24r-1ix20hgj5l94wz2rnn3aiwi0336hwysvvpiskquy6ijsh9wy12f3znbed-hz1ay8ppzhgqap-sicqtw6ui29d0wrfcpenudh1ml9xwjbej7u25xy9pnm6yr"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self' 'unsafe-inline' 'unsafe-eval' https://www.google.com https://www.gstatic.com https://www.googletagmanager.com https://www.google-analytics.com https://cdn.jsdelivr.net https://code.jquery.com https://cdnjs.cloudflare.com https://stackpath.bootstrapcdn.com https://webforms.pipedrive.com https://cdn.was-1.pipedriveassets.com https://ssl.google-analytics.com https://googleads.g.doubleclick.net https://www.googleadservices.com https://scripts.clixtell.com; style-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://stackpath.bootstrapcdn.com https://use.typekit.net https://p.typekit.net; frame-src 'self' https://www.google.com https://webforms.pipedrive.com https://player.vimeo.com https://www.googletagmanager.com; worker-src 'self' https://www.gstatic.com; connect-src 'self' https://www.google.com https://www.google-analytics.com https://analytics.google.com https://www.gstatic.com https://webforms.pipedrive.com https://cdn.was-1.pipedriveassets.com https://cdnjs.cloudflare.com https://use.typekit.net https://p.typekit.net https://stackpath.bootstrapcdn.com https://tracker.clixtell.com; img-src 'self' data: https:; font-src 'self' data: https://use.typekit.net https://p.typekit.net https://cdnjs.cloudflare.com;">
<?php include("../includes/css-b4.php"); ?>
<link href="https://www.websitetalkingheads.com/css/orderform.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php include ('../includes/header25.php'); ?>
<section class="container">
  <h1 class="h2">Website Spokesperson Order Form</h1>
</section>
<section class="alert alert-info bg-white">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-9 border p-4 bg-white" style="border-radius: 1rem;">
        <h2 class="mb-4 text-center">Spokesperson Video Order Form</h2>
        
        <?php
        // Display error messages if any
        if (isset($_SESSION['form_errors']) && !empty($_SESSION['form_errors'])) {
            echo '<div class="alert alert-danger" role="alert">';
            echo '<strong>Please correct the following errors:</strong><ul class="mb-0">';
            foreach ($_SESSION['form_errors'] as $error) {
                echo '<li>' . htmlspecialchars($error) . '</li>';
            }
            echo '</ul></div>';
            unset($_SESSION['form_errors']);
        }
        
        // Display success message if redirected from thank you
        if (isset($_SESSION['form_success'])) {
            echo '<div class="alert alert-success" role="alert">';
            echo htmlspecialchars($_SESSION['form_success']);
            echo '</div>';
            unset($_SESSION['form_success']);
        }
        ?>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.min.css">
        <form class="my-form" id="spokespersonOrderForm" name="Spokesperson Video Order Form" action="process-order.php" method="post" accept-charset="utf-8">
      <div class="row">
        <div class="col-md-6">
          <table>
            <tbody>
              <tr>
                <td><label> Full Name
                    * </label></td>
                <td><input type="text" name="lastname" maxlength="80" value="" required></td>
              </tr>
              <tr>
                <td><label> Email </label></td>
                <td><input type="email" name="email" data-label="Primary Email" value=""></td>
              </tr>
              <tr>
                <td><label> Phone </label></td>
                <td><input type="text" name="phone" maxlength="50" data-label="" value="" data-type="phone"></td>
              </tr>
              <tr>
                <td><label> Organization Name </label></td>
                <td><input type="text" name="organization" value=""></td>
              </tr>
              <tr>
                <td><label> Website </label></td>
                <td><input type="text" name="website" maxlength="255" placeholder="https://www.example.com" value=""></td>
              </tr>
              <tr>
                <td><label> Spokesperson </label></td>
                <td><input type="text" name="spokesperson" maxlength="64" value=""></td>
              </tr>
              <tr>
                <td><label> Wardrobe </label></td>
                <td><input type="text" name="wardrobe" maxlength="255" value=""></td>
              </tr>
              <tr>
                <td><label> Length </label></td>
                <td><select name="length" id="length">
                    <option value="30 second (1-90 words)"> 30 second (1-90 words) </option>
                    <option value="60 second (91-180 words)"> 60 second (91-180 words) </option>
                    <option value="Featured Actor 30 second (1-90 words)"> Featured Actor 30 second (1-90 words) </option>
                    <option value="Featured Actor 60 second (91-180 words)"> Featured Actor 60 second (91-180 words) </option>
                    <option value="Longer or Multiple"> Longer or Multiple </option>
                  </select></td>
              </tr>
              <tr>
                <td><label  data-toggle="tooltip" data-placement="top" title="Select the background type for your spokesperson video"> Video Type* </label></td>
                <td><select id="type" name="videotype">
                    <option value="Transparent" selected title="Spokesperson appears with a transparent background (most common)"> Transparent - Spokesperson appears with a transparent background (most common) </option>
                    <option value="Image" title="Spokesperson appears over a static background image"> Image - Spokesperson appears over a static background image </option>
                    <option value="Color" title="Spokesperson appears over a solid color background"> Color - Spokesperson appears over a solid color background </option>
                  </select></td>
              </tr>
              <tr>
                <td><label  data-toggle="tooltip" data-placement="top" title="How the spokesperson is shown"> Frame* </label></td>
                <td><select name="frame">
                    <option value="Half Body"> Half Body </option>
                    <option value="Close Up"> Close Up </option>
                    <option value="Three Quarter"> Three Quarter </option>
                    <option value="Full Body"> Full Body </option>
                  </select></td>
              </tr>
              <tr class="hide">
                <td><label  data-toggle="tooltip" data-placement="top" title="Position on Page Where Spokesperson Appears"> Positioning* </label></td>
                <td><select name="positioning">
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
              <tr class="hide">
                <td><label  data-toggle="tooltip" data-placement="top" title="Does the video autostart"> Autostart* </label></td>
                <td><select name="autostart">
                    <option value="Mute"> Mute </option>
                    <option value="Image"> Image </option>
                  </select></td>
              </tr>
              <tr class="hide">
                <td><label  data-toggle="tooltip" data-placement="top" title="Does the video play every time someone visits the page"> Session* </label></td>
                <td><select name="session">
                    <option value="Play Every Time"> Play Every Time </option>
                    <option value="Once Only"> Once Only </option>
                  </select></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-md-6">
          <table class="w-100">
            <tbody>
              <tr>
                <td class="w-150"><label class="w-150"> Script </label></td>
                <td><textarea class="text-small" id="script" rows="14" name="script"></textarea></td>
              </tr>
              <tr>
                <td class="w-150"><label> </label></td>
                <td><div id="result"> Word Count: <span id="wordCount">0</span> </div></td>
              </tr>
              <tr>
                <td class="w-150"><label> Comments </label></td>
                <td><textarea class="text-small" rows="6" name="comments"></textarea></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <script src="https://www.google.com/recaptcha/api.js?render=6LcYMiosAAAAAIHSQ6T8faGc6smlu56rZpAI8o9j"></script>
      <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
      <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js"></script>
      <script>
        window.addEventListener("load", function() {
          function getCountryCode() {
            var timezoneCountryMap = {
              "America/New_York": "us", "America/Chicago": "us", "America/Denver": "us", 
              "America/Los_Angeles": "us", "America/Phoenix": "us", "America/Anchorage": "us",
              "Europe/London": "gb", "Europe/Paris": "fr", "Europe/Berlin": "de",
              "Asia/Tokyo": "jp", "Asia/Shanghai": "cn", "Australia/Sydney": "au"
            };
            var timezone = "";
            var country = "us";
            if(Intl && Intl.DateTimeFormat) {
              timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
              if (timezoneCountryMap[timezone]) {
                country = timezoneCountryMap[timezone];
              }
            }
            return country;
          }
          var phoneFields = document.querySelectorAll('[data-type="phone"]');
          if (phoneFields && phoneFields.length) {
            phoneFields.forEach(function(ele) {
              window.intlTelInput(ele, {
                initialCountry: "auto",
                separateDialCode: true,
                autoPlaceholder: false,
                geoIpLookup: function (success, failure) {
                  success(getCountryCode());
                }
              });
            });
          }
        });
      </script>
      <div class="text-center mt-3">
        <input class="mx-auto btn btn-primary w-25" type="submit" value="Submit" id="submitBtn">
      </div>
    </form>
    <script>
      window.addEventListener("load", function() {
        // reCAPTCHA v3 - execute on form submit
        var form = document.getElementById("spokespersonOrderForm");
        var submitBtn = document.getElementById("submitBtn");
        var recaptchaInput = document.getElementById("g-recaptcha-response");
        
        if (form && submitBtn && recaptchaInput && typeof grecaptcha !== 'undefined') {
          form.addEventListener("submit", function(event) {
            event.preventDefault();
            
            submitBtn.disabled = true;
            submitBtn.value = "Submitting...";
            
            // Execute reCAPTCHA v3
            grecaptcha.ready(function() {
              grecaptcha.execute('6LcYMiosAAAAAIHSQ6T8faGc6smlu56rZpAI8o9j', {action: 'submit'})
                .then(function(token) {
                  recaptchaInput.value = token;
                  form.submit();
                })
                .catch(function(error) {
                  submitBtn.disabled = false;
                  submitBtn.value = "Submit";
                  alert("reCAPTCHA verification failed. Please try again.");
                });
            });
          });
        }
      });
    </script> 
      </div>
    </div>
  </div>
</section>
<?php include("../includes/footer25.php"); ?>
<script src="https://www.websitetalkingheads.com/orderform/js/order.js"></script>
</body>
