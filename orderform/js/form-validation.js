// Form validation for order form
(function() {
  'use strict';

  // Initialize phone input with intl-tel-input
  function initPhoneInput() {
    function getCountryCode() {
      var timezoneCountryMap = {
        "America/New_York": "us",
        "America/Chicago": "us",
        "America/Denver": "us",
        "America/Los_Angeles": "us",
        "Europe/London": "gb",
        "Europe/Paris": "fr",
        "Asia/Tokyo": "jp",
        "Australia/Sydney": "au"
      };
      var timezone = "";
      var country = "us";
      if (Intl && Intl.DateTimeFormat) {
        timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
      }
      if (timezoneCountryMap[timezone]) {
        country = timezoneCountryMap[timezone];
      }
      return country;
    }

    var phoneFields = document.querySelectorAll('[data-type="phone"]');
    if (phoneFields && phoneFields.length) {
      phoneFields.forEach(function(ele) {
        if (window.intlTelInput) {
          var iti = window.intlTelInput(ele, {
            initialCountry: "auto",
            separateDialCode: true,
            autoPlaceholder: false,
            geoIpLookup: function (success, failure) {
              success(getCountryCode());
            }
          });
          
          // Update field with full international number on blur/submit
          ele.addEventListener('blur', function() {
            if (iti.isValidNumber()) {
              ele.value = iti.getNumber();
            }
          });
          
          // Also update on form submit to ensure we get the formatted number
          var form = ele.closest('form');
          if (form) {
            form.addEventListener('submit', function() {
              if (iti.isValidNumber()) {
                ele.value = iti.getNumber();
              }
            });
          }
        }
      });
    }
  }

  // Validate email format
  function validateEmail(email) {
    var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
  }

  // Validate URL format
  function validateUrl(url) {
    if (!url || url.trim() === '') {
      return true; // URL is optional
    }
    try {
      new URL(url);
      return true;
    } catch (e) {
      return false;
    }
  }

  // Show field error
  function showFieldError(field, message) {
    field.classList.add('is-invalid');
    var feedback = field.nextElementSibling;
    if (!feedback || !feedback.classList.contains('invalid-feedback')) {
      feedback = document.createElement('div');
      feedback.className = 'invalid-feedback';
      field.parentNode.insertBefore(feedback, field.nextSibling);
    }
    feedback.textContent = message;
  }

  // Clear field error
  function clearFieldError(field) {
    field.classList.remove('is-invalid');
    var feedback = field.nextElementSibling;
    if (feedback && feedback.classList.contains('invalid-feedback')) {
      feedback.remove();
    }
  }

  // Validate form on submit
  function validateForm(event) {
    var form = document.getElementById('orderForm');
    if (!form) return true;

    var isValid = true;
    var submitBtn = document.getElementById('submitBtn');
    var spinner = submitBtn.querySelector('.spinner-border');

    // Validate required fields
    var requiredFields = form.querySelectorAll('[required]');
    requiredFields.forEach(function(field) {
      clearFieldError(field);
      if (!field.value || field.value.trim() === '') {
        showFieldError(field, 'This field is required');
        isValid = false;
      }
    });

    // Validate email if provided
    var emailField = document.getElementById('email');
    if (emailField && emailField.value && emailField.value.trim() !== '') {
      clearFieldError(emailField);
      if (!validateEmail(emailField.value)) {
        showFieldError(emailField, 'Please enter a valid email address');
        isValid = false;
      }
    }

    // Validate website URL if provided
    var websiteField = document.getElementById('cf_1150');
    if (websiteField && websiteField.value && websiteField.value.trim() !== '') {
      clearFieldError(websiteField);
      if (!validateUrl(websiteField.value)) {
        showFieldError(websiteField, 'Please enter a valid website URL (e.g., https://example.com)');
        isValid = false;
      }
    }

    // Validate reCAPTCHA
    var recaptchaResponse = form.querySelector('.g-recaptcha-response');
    if (!recaptchaResponse || !recaptchaResponse.value) {
      alert('Please complete the reCAPTCHA verification');
      isValid = false;
    }

    if (!isValid) {
      event.preventDefault();
      event.stopPropagation();
      
      // Scroll to first error
      var firstError = form.querySelector('.is-invalid');
      if (firstError) {
        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
        firstError.focus();
      }
      return false;
    }

    // Show loading state
    submitBtn.disabled = true;
    if (spinner) {
      spinner.classList.remove('d-none');
    }
    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Submitting...';

    return true;
  }

  // Real-time validation on blur
  function setupRealTimeValidation() {
    var form = document.getElementById('orderForm');
    if (!form) return;

    // Email validation
    var emailField = document.getElementById('email');
    if (emailField) {
      emailField.addEventListener('blur', function() {
        if (this.value && this.value.trim() !== '') {
          if (validateEmail(this.value)) {
            clearFieldError(this);
          } else {
            showFieldError(this, 'Please enter a valid email address');
          }
        } else {
          clearFieldError(this);
        }
      });
    }

    // Website URL validation
    var websiteField = document.getElementById('cf_1150');
    if (websiteField) {
      websiteField.addEventListener('blur', function() {
        if (this.value && this.value.trim() !== '') {
          if (validateUrl(this.value)) {
            clearFieldError(this);
          } else {
            showFieldError(this, 'Please enter a valid website URL (e.g., https://example.com)');
          }
        } else {
          clearFieldError(this);
        }
      });
    }
  }

  // Initialize when DOM is ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', function() {
      initPhoneInput();
      setupRealTimeValidation();
      
      var form = document.getElementById('orderForm');
      if (form) {
        form.addEventListener('submit', validateForm);
      }
    });
  } else {
    initPhoneInput();
    setupRealTimeValidation();
    
    var form = document.getElementById('orderForm');
    if (form) {
      form.addEventListener('submit', validateForm);
    }
  }
})();

