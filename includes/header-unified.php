<?php
/**
 * Unified Header Component (Bootstrap 4)
 * Uses image buttons like homepage, responsive design
 */
$page = basename($_SERVER["PHP_SELF"]);
$pagename = strtok($page, ".");
?>
<header class="header-unified">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Logo (left) -->
    <a class="navbar-brand" href="https://www.websitetalkingheads.com/">
      <img src="/images/Talking_Heads_Banner_Logo.png" alt="Website Talking Heads" class="header-logo">
    </a>

    <!-- Hamburger (mobile) -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#unifiedNav" aria-controls="unifiedNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Nav links with image buttons (center) -->
    <div class="collapse navbar-collapse justify-content-center" id="unifiedNav">
      <ul class="navbar-nav navbar-images">
        <li class="nav-item<?php echo ($pagename == "index" || $pagename == "") ? " current" : ""; ?>" id="menuHome" title="Website Talking Heads">
          <a href="/index.php"><img src="/images/menu-button.png" alt="Home" class="img-fluid img-nav"><span class="caption">Home</span></a>
        </li>
        <li class="nav-item<?php echo (strpos($_SERVER["REQUEST_URI"], "/spokespeople") !== false || strpos($_SERVER["REQUEST_URI"], "/actors") !== false) ? " current" : ""; ?>" id="menuActors" title="Our Spokespeople">
          <a href="/spokespeople/women.php"><img src="/images/menu-button.png" alt="Spokespeople" class="img-fluid img-nav"><span class="caption">Actors</span></a>
        </li>
        <li class="nav-item<?php echo (strpos($_SERVER["REQUEST_URI"], "/order") !== false) ? " current" : ""; ?>" id="menuOrder" title="Order a Video">
          <a href="/orders.php"><img src="/images/menu-button.png" alt="Order" class="img-fluid img-nav"><span class="caption">Order</span></a>
        </li>
        <li class="nav-item<?php echo (strpos($_SERVER["REQUEST_URI"], "/whiteboard") !== false) ? " current" : ""; ?>" id="menuWhiteboard" title="Whiteboard Videos">
          <a href="/whiteboard/"><img src="/images/menu-button-purple.png" alt="Whiteboard Videos" class="img-fluid img-nav"><span class="caption">White<br>Board</span></a>
        </li>
        <li class="nav-item<?php echo (strpos($_SERVER["REQUEST_URI"], "/videopresentations") !== false) ? " current" : ""; ?>" id="menuVideos" title="Video Styles">
          <a href="/videopresentations/"><img src="/images/menu-button.png" alt="Video Presentations" class="img-fluid img-nav"><span class="caption">Videos</span></a>
        </li>
        <li class="nav-item<?php echo ($pagename == "contact") ? " current" : ""; ?>" id="menuContact" title="Contact Us">
          <a href="/contact.php"><img src="/images/menu-button.png" alt="Contact" class="img-fluid img-nav"><span class="caption">Contact</span></a>
        </li>
        <li class="nav-item<?php echo (strpos($_SERVER["REQUEST_URI"], "/specials") !== false) ? " current" : ""; ?>" id="menuSpecials" title="Specials">
          <a href="/specials/"><img src="/images/menu-specials.png" alt="Specials" class="img-fluid img-nav"><span class="caption">Specials</span></a>
        </li>
      </ul>
    </div>

    <!-- Phone (right) -->
    <span class="navbar-text d-none d-lg-block">
      <a href="tel:801-748-2281" class="phone-link">801-748-2281</a>
    </span>
  </nav>
</header>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "Website Talking Heads",
  "url": "https://www.websitetalkingheads.com/",
  "telephone": "801-748-2281",
  "email": "info@websitetalkingheads.com",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "245 W. 9000 S.",
    "addressLocality": "Sandy",
    "addressRegion": "Utah",
    "postalCode": "84070"
  },
  "openingHours": "Mo-Fr 09:00-17:30",
  "paymentAccepted": "Visa, MasterCard, Discover, Amex"
}
</script>
