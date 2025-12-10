<?php 
$page = basename($_SERVER['PHP_SELF']); /* Returns The Current PHP File Name */
$pagename = ucfirst(strtok($page,"."));
$pagetitle = trim($page, "/");
$tags = get_meta_tags($pagetitle);
?>
<h1 class="hidden">Website Talking Heads | <?=$pagename?></h1>
<section title="Talking-Heads-Header">
<header class="center-block">
  <h2 class="hidden">Website Talking Heads | Navigation</h2>
  <section id="header_top">
    <h3><a href="tel:801-748-2281" title="Give us a call.">801-748-2281</a></h3>
  </section>
  <nav class="row center-block" id = "Talking-Heads-Navigation">
    <ul style="center-block">
      <li style="center-block"><a href="https://www.websitetalkingheads.com/index.php" id="menuHome">
        <h2>Home</h2>
        </a></li>
      <li style="center-block"><a href="https://websitetalkingheads.com/actors/female-carousel.php" id="menuActors">
        <h2>Actors</h2>
        </a></li>
      <li style="center-block"><a href="https://www.websitetalkingheads.com/examples/index.php" id="menuExamples">
        <h2>Examples</h2>
        </a></li>
      <li style="center-block"><a href="https://www.websitetalkingheads.com/pricing/index.php" id="menuPrices">
        <h2>Prices</h2>
        </a></li>
      <li style="center-block"><a href="https://www.websitetalkingheads.com/orderform/index.php" id="menuOrder">
        <h2>Order</h2>
        </a></li>
      <li style="center-block"><a href="https://www.websitetalkingheads.com/whiteboard/index.php" id = "whiteboard">
        <h2><div class="wb">White Board</div></h2>
        </a></li>
      <li style="center-block"><a href="https://www.websitetalkingheads.com/videopresentations/index.php" id="menuVideos">
        <h2>Videos</h2>
        </a></li>
      <li style="center-block"><a href="https://www.websitetalkingheads.com/contact.php" id="menuContact">
        <h2>Contact</h2>
        </a></li>
      <li style="center-block"><a href="https://www.websitetalkingheads.com/specials/"  id="menuSpecials">
        <h2>Specials</h2>
        </a></li>
    </ul>
    <div id="c"></div>
  </nav>
    <div class="line"></div>
</header>
</section>
<script src="/js/header-links.js" defer></script>