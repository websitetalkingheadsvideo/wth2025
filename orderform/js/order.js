// Order form functionality - converted to vanilla JavaScript (no jQuery dependency)
(function() {
  'use strict';

  // Wait for DOM to be ready
  function domReady(fn) {
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', fn);
    } else {
      fn();
    }
  }

  // Initialize when DOM is ready
  domReady(function() {
    // Initialize Bootstrap 4 tooltips (jQuery)
    $('[data-toggle="tooltip"]').tooltip();

    // Word count for script field
    var scriptField = document.getElementById('script');
    var wordCountSpan = document.getElementById('wordCount');
    
    if (scriptField && wordCountSpan) {
      function updateWordCount() {
        var text = scriptField.value;
        var numWords = 0;
        if (text.trim() !== '') {
          // Split by whitespace and filter out empty strings
          var words = text.trim().split(/\s+/);
          numWords = words.length;
        }
        wordCountSpan.textContent = numWords;
      }
      
      scriptField.addEventListener('input', updateWordCount);
      scriptField.addEventListener('propertychange', updateWordCount); // IE support
      updateWordCount(); // Initial count
    }

    // Video type change handler - show/hide additional fields
    var typeField = document.getElementById('type');
    var hideFields = document.querySelectorAll('.hide');
    
    if (typeField) {
      function toggleHideFields() {
        var isTransparent = typeField.value === 'Transparent';
        hideFields.forEach(function(field) {
          if (isTransparent) {
            field.style.display = 'block';
          } else {
            field.style.display = 'none';
          }
        });
      }
      
      typeField.addEventListener('change', toggleHideFields);
      toggleHideFields(); // Initial state
    }

    // Hide fields initially
    hideFields.forEach(function(field) {
      field.style.display = 'none';
    });

    // Featured actor checkbox handler (if exists)
    var featuredCheckbox = document.getElementById('featured');
    var spokespersonDiv = document.getElementById('spokesperson');
    var faselectDiv = document.getElementById('faselect');
    
    if (featuredCheckbox) {
      function toggleFeaturedActor() {
        if (featuredCheckbox.checked) {
          if (spokespersonDiv) spokespersonDiv.style.display = 'none';
          if (faselectDiv) faselectDiv.style.display = 'block';
        } else {
          if (spokespersonDiv) spokespersonDiv.style.display = 'block';
          if (faselectDiv) faselectDiv.style.display = 'none';
        }
        setPayPal();
      }
      
      featuredCheckbox.addEventListener('change', toggleFeaturedActor);
      if (faselectDiv) faselectDiv.style.display = 'none'; // Initially hidden
    }

    // PayPal/description setting function (if needed)
    function setPayPal() {
      var featured = featuredCheckbox && featuredCheckbox.checked;
      var lengthField = document.getElementById('cf_contacts_length');
      var descriptionField = document.getElementById('description');
      var payField = document.getElementById('pay');
      
      if (!lengthField) return;
      
      var length = lengthField.value;
      var description = '';
      var pay = 0;
      
      if (!featured) {
        switch (length) {
          case "30 second (1-90 words)":
            description = "30 Second Video - 0-90 words.";
            pay = 399;
            break;
          case "60 second (91-180 words)":
            description = "60 Second Video - 91-180 words.";
            pay = 499;
            break;
          default:
            pay = 0;
            description = "Longer or Multiple Videos";
        }
      } else {
        switch (length) {
          case "30 second (1-90 words)":
            description = "Featured Actor Special 30 Second Video - 0-90 words.";
            pay = 399;
            break;
          case "60 second (91-180 words)":
            description = "Featured Actor Special 60 Second Video - 91-180 words.";
            pay = 499;
            break;
          default:
            description = "Longer or Multiple Videos";
            pay = 0;
        }
      }
      
      if (descriptionField) descriptionField.value = description;
      if (payField) payField.value = pay;
    }

    // Length field change handler
    var lengthField = document.getElementById('cf_contacts_length');
    if (lengthField) {
      lengthField.addEventListener('change', setPayPal);
    }
    
    // Initial setup
    setPayPal();
  });
})();
