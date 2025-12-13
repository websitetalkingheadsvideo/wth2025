window.onload = function () {
  var N = navigator.appName,
    ua = navigator.userAgent,
    tem;
  var M = ua.match(/(opera|chrome|safari|firefox|msie)\/?\s*(\.?\d+(\.\d+)*)/i);
  if (M && (tem = ua.match(/version\/([\.\d]+)/i)) != null) M[2] = tem[1];
  M = M ? [M[1], M[2]] : [N, navigator.appVersion, "-?"];
  var browserName = M[0];
  var form = document.getElementById("__vtigerWebForm"),
    inputs = form.elements;
  form.onsubmit = function () {
    document.getElementById("vtigerFormSubmitBtn").disabled = true;
    if (testCrylic === false) {
      console.log("fail");
      document.getElementById("vtigerFormSubmitBtn").disabled = false;
    }
    var required = [],
      att, val;
    var startDate;
    var endDate;
    var endDate1;
    for (var i = 0; i < inputs.length; i++) {
      att = inputs[i].getAttribute("required");
      val = inputs[i].value;
      type = inputs[i].type;
      if (inputs[i].name == "birthday") {
        birthdayDate = new Date(inputs[i].value);
        todayDate = new Date();
        todayDate.setHours(0, 0, 0, 0);
        birthdayDate.setHours(0, 0, 0, 0);
        if (birthdayDate >= todayDate) {
          alert("Date of Birth should be less than Today's Date.");
          document.getElementById("vtigerFormSubmitBtn").disabled = false;
          return false;
        }
      }
      if (inputs[i].name == "support_start_date" || inputs[i].name == "startdate") {
        startDate = inputs[i].value;
      }
      if (inputs[i].name == "support_end_date" || inputs[i].name == "targetenddate" || inputs[i].name == "enddate") {
        endDate = inputs[i].value;
      }
      if (inputs[i].name == "actualenddate") {
        endDate1 = inputs[i].value;
      }
      if (type == "email") {
        if (val != "") {
          var elemLabel = inputs[i].getAttribute("data-label");
          var emailFilter = /^[_/a-zA-Z0-9]+([!"#$%&()*+,./:;<=>?\^_`{|}~-]?[a-zA-Z0-9/_/-])*@[a-zA-Z0-9]+([\_\-\.]?[a-zA-Z0-9]+)*\.([\-\_]?[a-zA-Z0-9])+(\.?[a-zA-Z0-9]+)?$/;
          var illegalChars = /[\(\)\<\>\,\;\:\"\[\]]/;
          if (!emailFilter.test(val)) {
            alert("For " + elemLabel + " field please enter valid email address");
            document.getElementById("vtigerFormSubmitBtn").disabled = false;
            return false;
          } else if (val.match(illegalChars)) {
            alert(elemLabel + " field contains illegal characters");
            document.getElementById("vtigerFormSubmitBtn").disabled = false;
            return false;
          }
        }
      }
      if (startDate) {
        if (typeof startDate !== "undefined") {
          if (endDate) {
            if (typeof endDate !== "undefined") {
              startDate = new Date(startDate);
              endDate = new Date(endDate);
              if (endDate < startDate) {
                alert("End Date should be greater than or equal to Start Date");
                document.getElementById("vtigerFormSubmitBtn").disabled = false;
                return false;
              }
            }
          }
          if (endDate1) {
            if (typeof endDate1 !== "undefined") {
              startDate = new Date(startDate);
              endDate1 = new Date(endDate1);
              if (endDate1 < startDate) {
                alert("End Date should be greater than or equal to Start Date");
                document.getElementById("vtigerFormSubmitBtn").disabled = false;
                return false;
              }
            }
          }
        }
      }
      if (att != null) {
        if (val.replace(/^\s+|\s+$/g, "") == "") {
          required.push(inputs[i].getAttribute("label"));
        }
      }
    }
    if (required.length > 0) {
      alert("The following fields are required: " + required.join());
      document.getElementById("vtigerFormSubmitBtn").disabled = false;
      return false;
    }
    var numberTypeInputs = document.querySelectorAll("input[type=number]");
    for (var i = 0; i < numberTypeInputs.length; i++) {
      val = numberTypeInputs[i].value;
      var elemLabel = numberTypeInputs[i].getAttribute("label");
      var elemDataType = numberTypeInputs[i].getAttribute("datatype");
      if (val != "") {
        if (elemDataType == "double") {
          var numRegex = /^[+-]?\d+(\.\d+)?$/;
        } else {
          var numRegex = /^[+-]?\d+$/;
        }
        if (!numRegex.test(val)) {
          alert("For " + elemLabel + " field please enter valid number");
          document.getElementById("vtigerFormSubmitBtn").disabled = false;
          return false;
        }
      }
    }
    var dateTypeInputs = document.querySelectorAll("input[type=date]");
    for (var i = 0; i < dateTypeInputs.length; i++) {
      dateVal = dateTypeInputs[i].value;
      var elemLabel = dateTypeInputs[i].getAttribute("label");
      if (dateVal != "") {
        var dateRegex = /^[1-9][0-9]{3}-(0[1-9]|1[0-2]|[1-9]{1})-(0[1-9]|[1-2][0-9]|3[0-1]|[1-9]{1})$/;
        if (!dateRegex.test(dateVal)) {
          alert("For " + elemLabel + " field please enter valid date in required format");
          document.getElementById("vtigerFormSubmitBtn").disabled = false;
          return false;
        }
      }
    }
    var inputElems = document.getElementsByTagName("input");
    var totalFileSize = 0;
    for (var i = 0; i < inputElems.length; i++) {
      if (inputElems[i].type.toLowerCase() === "file") {
        var file = inputElems[i].files[0];
        if (typeof file !== "undefined") {
          var totalFileSize = totalFileSize + file.size;
        }
      }
    }
    if (totalFileSize > 52428800) {
      alert("Maximum allowed file size including all files is 50MB.");
      document.getElementById("vtigerFormSubmitBtn").disabled = false;
      return false;
    }
    var inputElem = document.querySelectorAll("input[type=file]");
    var fileSize = 0;
    for (var i = 0; i < inputElem.length; i++) {
      if (inputElem[i].type.toLowerCase() === "file") {
        if (inputElem[i].hasAttribute("selectedTypeImage")) {
          var imageFile = inputElem[i].files[0];
          var fileSize = imageFile.size;
        }
      }
      if (fileSize > 5242880) {
        alert("Maximum allowed image size is 5MB.");
        document.getElementById("vtigerFormSubmitBtn").disabled = false;
        return false;
      }
    }
    document.getElementById("vtigerFormSubmitBtn").disabled = true;
    var recaptchaValidationValue = document.getElementById("recaptcha_validation_value").value;
    if (recaptchaValidationValue != true) {
      var recaptchaResponse = document.getElementsByName("g-recaptcha-response")[0].value;
      var currentUrl = window.location.href;
      var urlHash = window.location.hash;
      currentUrl = currentUrl.replace(urlHash, "");
      currentUrl = currentUrl.replace("#", "");
      var validationUrl = document.getElementById("captchaUrl").value + "?recaptcha_response=" + recaptchaResponse + "&current_url=" + currentUrl + "&callback=captchaCallback";
      jsonp.fetch(validationUrl);
      return false;
    }
  };
};
var jsonp = {
  callbackCounter: 0,
  fetch: function (url) {
    url = url + "&callId=" + this.callbackCounter;
    var scriptTag = document.createElement("SCRIPT");
    scriptTag.src = url;
    scriptTag.async = true;
    scriptTag.id = "captchaCallback_" + this.callbackCounter;
    scriptTag.type = "text/javascript";
    document.getElementsByTagName("HEAD")[0].appendChild(scriptTag);
    this.callbackCounter++;
  }
};

function captchaCallback(data) {
  if (data.result.success == true) {
    document.getElementById("recaptcha_validation_value").value = true;
    var form = document.getElementById("__vtigerWebForm");
    form.submit();
  } else {
    document.getElementById("vtigerFormSubmitBtn").disabled = false;
    grecaptcha.reset();
    alert("Captcha not verified. Please verify captcha.");
  }
  var element = document.getElementById("captchaCallback_" + data.result.callId);
  element.parentNode.removeChild(element);
}

function testCrylic() {
  let pattern = /[\u0400-\u04FF]/;
  if (pattern.test($('input textarea').val())) { //If "input" contains a Cyrillic character...
    alert('Invalid input: please use Latin characters only.'); // pop alert message
    $('input textarea').val("") // empty field of invalid contents
    return false; // prevent form from submitting
  } else
    return true; // allow form to be submitted
}
