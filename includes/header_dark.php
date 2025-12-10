<?php $page = basename( $_SERVER[ 'PHP_SELF' ] ); /* Returns The Current PHP File Name */ $pagename = strtok( $page, "." ); if ( $pagename != "index" ) { 	$pagename = str_replace( "-", " ", $pagename ); } else { 	$geturl = $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'PHP_SELF' ]; /* get url */ 	$baseurl = trim( $geturl, "/index.php" ); 	$myurl = substr( $baseurl, 28 ); 	$pagename = $myurl; } $pagename = ucfirst( $pagename ); if ( $pagename != "" ) {} else { 	$pagename = "Home"; } $pagetitle = trim( $page, "/" ); /* get page title */ $tags = get_meta_tags( $pagetitle ); /* get tags for info */ ?>
<header class="mx-auto header-dark">
  <nav alt="Website Talking Heads® Navigation" class="navbar navbar-expand-lg navbar-light bg-light"> <a class="navbar-brand" href="https://www.websitetalkingheads.com/index.php"><img class="navbar-brand img img-fluid" src="https://www.websitetalkingheads.com/images/Talking_Heads_Banner_Logo.png" alt="Website Talking Heads"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav navbar-images mx-auto">
        <li class="nav-item" id="menuHome" title="Website Talking Heads®"><a href="/index.php"><img src="https://www.websitetalkingheads.com/images/menu-button.png" alt="Home" class="img-responsive img-nav"><span class="caption">Home</span></a></li>
        <li class="nav-item" id="menuActors" title="Our Spokespeople"><a href="/spokespeople/female-carousel.php"><img src="https://www.websitetalkingheads.com/images/menu-button.png" alt="Spokespeople" class="img-responsive img-nav"><span class="caption">Actors</span></a></li>
        <li class="nav-item" id="menuOrder" title="Order a Video"><a href="/orderform/"><img src="https://www.websitetalkingheads.com/images/menu-button.png" alt="Order" class="img-responsive img-nav"><span class="caption">Order</span></a></li>
        <li class="nav-item" id="menuWhiteboard" title="Whiteboard Videos"><a href="/whiteboard/"><img src="https://www.websitetalkingheads.com/images/menu-button-purple.png" alt="Whiteboard Videos" class="img-responsive img-nav"><span class="caption">White<br>
          Board</span></a></li>
        <li class="nav-item" id="menuVideos" title="Video Styles"><a href="/videopresentations/"><img src="https://www.websitetalkingheads.com/images/menu-button.png" alt="Video Presentations" class="img-responsive img-nav"><span class="caption">Videos</span></a></li>
        <li class="nav-item" id="menuContact" title="Contact Us"><a href="/contact.php"><img src="https://www.websitetalkingheads.com/images/menu-button.png" alt="Contact" class="img-responsive img-nav"><span class="caption">Contact</span></a></li>
        <li class="nav-item" id="specials" title="Specials"><a href="/specials/"><img src="https://www.websitetalkingheads.com/images/menu-specials.png" alt="Specials" class="img-responsive img-nav"><span class="caption">Specials</span></a></li>
      </ul>
    </div>
    <span class="navbar-text"> <a class="phone-header" href="tel://801-748-2281" title="Give us a call.">801-748-2281</a> </span> </nav>
</header>
<script>
	var loc = location.href;
	switch ( loc ) {
		case "/index.php":
		case "/":
			document.getElementById( 'menuHome' ).className = "current";
			break;
		case "https://websitetalkingheads.com/actors/female-carousel.php":
		case "https://websitetalkingheads.com/actors/male-carousel.php":
		case "https://websitetalkingheads.com/actors/female-carousel2.php":
		case "https://websitetalkingheads.com/actors/carousel4.php":
			document.getElementById( 'menuActors' ).className = "current";
			break;
		case "/examples.php":
		case "/examples/index.php":
			document.getElementById( 'menuExamples' ).className = "current";
			break;
		case "/pricing/index.php":
			document.getElementById( 'menuPrices' ).className = "current";
			break;
		case "/orderform/index.php":
			document.getElementById( 'menuOrder' ).className = "current";
			break;
		case "/explanationvideo":
			document.getElementById( 'whiteboard' ).className = "current";
			break;
		case "/videopresentations/index.php":
			document.getElementById( 'menuVideos' ).className = "current";
			break;
		case "/contact.php":
			document.getElementById( 'menuHome' ).className = "other";
			document.getElementById( 'menuActors' ).className = "other";
			document.getElementById( 'menuExamples' ).className = "other";
			document.getElementById( 'menuPrices' ).className = "other";
			document.getElementById( 'menuOrder' ).className = "other";
			document.getElementById( 'whiteboard' ).className = "other";
			document.getElementById( 'menuVideos' ).className = "other";
			document.getElementById( 'menuContact' ).className = "current";
			document.getElementById( 'menuSpecials' ).className = "other";
			break;
		case "/specials/":
			document.getElementById( 'menuSpecials' ).className = "current";
			break;
	}
</script> 
<script type="application/ld+json">
	{
		"@context": "http://schema.org",
		"@type": "LocalBusiness",
		"address": {
			"@type": "PostalAddress",
			"addressLocality": "Sandy",
			"addressRegion": "Utah",
			"postalCode": "84070",
			"streetAddress": "245 W. 9000 S."
		},
		"name": "Website Talking Heads",
		"url": "https://www.websitetalkingheads.com/",
		"email": "info@websitetalkingheads.com",
		"telephone": "8017482281",
		"openingHours": [ "Monday - Friday 09:00-17:30" ],
		"paymentAccepted": "Visa, Master Card, Discover, Amex"
	}
</script>