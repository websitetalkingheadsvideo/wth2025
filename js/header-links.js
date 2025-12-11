(() => {
    'use strict';
  
    const setCurrentNav = () => {
      // Get location and normalize it
      let loc = window.location.href;
      loc = loc.replace("https://www.websitetalkingheads.com/", "");
      loc = loc.replace("https://websitetalkingheads.com/", "");
      
      // Get all menu items
      const menuHome = document.getElementById('menuHome');
      const menuActors = document.getElementById('menuActors');
      const menuExamples = document.getElementById('menuExamples');
      const menuPrices = document.getElementById('menuPrices');
      const menuOrder = document.getElementById('menuOrder');
      const menuWhiteboard = document.getElementById('menuWhiteboard');
      const menuVideos = document.getElementById('menuVideos');
      const menuContact = document.getElementById('menuContact');
      const specials = document.getElementById('specials');
      
      // Helper function to remove "current" class while preserving other classes
      const removeCurrentClass = (element) => {
        if (element) {
          element.classList.remove("current");
        }
      };
      
      // Clear "current" class from all menu items (preserve Bootstrap classes)
      removeCurrentClass(menuHome);
      removeCurrentClass(menuActors);
      removeCurrentClass(menuOrder);
      removeCurrentClass(menuWhiteboard);
      removeCurrentClass(menuVideos);
      removeCurrentClass(menuContact);
      removeCurrentClass(specials);
      
      // Set the current page based on URL
      let currentItem = null;
      switch (loc) {
        case "index.php":
        case "":
          currentItem = menuHome;
          break;
        case "https://websitetalkingheads.com/actors/female-carousel.php":
        case "https://websitetalkingheads.com/actors/male-carousel.php":
        case "https://websitetalkingheads.com/actors/female-carousel2.php":
        case "https://websitetalkingheads.com/actors/carousel4.php":
        case "spokespeople/female-carousel.php":
        case "spokespeople/male-carousel.php":
        case "spokespeople/":
          currentItem = menuActors;
          break;
        case "/examples.php":
        case "/examples/index.php":
          currentItem = menuExamples;
          break;
        case "/pricing/index.php":
          currentItem = menuPrices;
          break;
        case "/orderform/index.php":
        case "orderform/index.php":
        case "orderform/":
          currentItem = menuOrder;
          break;
        case "/explanationvideo":
        case "whiteboard/":
        case "whiteboard/index.php":
          currentItem = menuWhiteboard;
          break;
        case "videopresentations/index.php":
        case "/videopresentations/index.php":
        case "videopresentations/":
        case "/videopresentations/":
          currentItem = menuVideos;
          break;
        case "/contact.php":
        case "contact.php":
        case "/contact-us/":
        case "/contact-us/index.php":
        case "contact-us/":
        case "contact-us/index.php":
          currentItem = menuContact;
          break;
        case "specials/":
        case "/specials/":
        case "specials/index.php":
        case "/specials/index.php":
          currentItem = specials;
          break;
      }
      
      if (currentItem) {
        currentItem.classList.add("current");
      }
    };
  
    const loadGoogleAnalytics = () => {
      const gaq = window._gaq || [];
      window._gaq = gaq;
      gaq.push(['_setAccount', 'UA-3598588-2']);
      gaq.push(['_trackPageview']);
  
      const ga = document.createElement('script');
      ga.type = 'text/javascript';
      ga.async = true;
      ga.src = `${document.location.protocol === 'https:' ? 'https://ssl' : 'https://www'}.google-analytics.com/ga.js`;
      const firstScript = document.getElementsByTagName('script')[0];
      firstScript?.parentNode?.insertBefore(ga, firstScript);
    };
  
    const loadHeatmap = () => {
      // Heatmap endpoint is returning 500 errors and HTML instead of JavaScript
      // Disabling heatmap loading to prevent console errors
      // If heatmap functionality is needed, the endpoint needs to be fixed server-side
      if (typeof window.hmtracker !== 'undefined') {
        return;
      }
      
      // Commented out until heatmap endpoint is fixed
      // The endpoint at /heatmap/ is returning 500 errors and HTML instead of JavaScript
      /*
      const script = document.createElement('script');
      const purl = encodeURIComponent(window.location.href).replace('.', '~');
      script.type = 'text/javascript';
      // Use HTTPS to avoid mixed content errors
      script.src = `https://www.websitetalkingheads.com/heatmap/?hmtrackerjs=WTH&uid=370cf24c7a34e7a3f696452761f30d5bcab302a6&purl=${purl}`;
      document.getElementsByTagName('head')[0]?.appendChild(script);
      */
      
      // Silently fail - heatmap is not critical functionality
    };
  
    document.addEventListener('DOMContentLoaded', () => {
      try {
        setCurrentNav();
        loadGoogleAnalytics();
        loadHeatmap();
      } catch (error) {
        console.error('Header links script error:', error);
      }
    });
  })();
  