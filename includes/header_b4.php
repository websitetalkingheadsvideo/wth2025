<?php $page = basename( $_SERVER[ 'PHP_SELF' ] ); /* Returns The Current PHP File Name */ $pagename = strtok( $page, "." ); if ( $pagename != "index" ) { 	$pagename = str_replace( "-", " ", $pagename ); } else { 	$geturl = $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'PHP_SELF' ]; /* get url */ 	$baseurl = trim( $geturl, "/index.php" ); 	$myurl = substr( $baseurl, 28 ); 	$pagename = $myurl; } $pagename = ucfirst( $pagename ); if ( $pagename != "" ) {} else { 	$pagename = "Home"; } $pagetitle = trim( $page, "/" ); /* get page title */ $tags = get_meta_tags( $pagetitle ); /* get tags for info */ ?>
<header class="mx-auto">
	<nav title="Website Talking Heads® Navigation" class="navbar navbar-expand-lg navbar-light bg-light"> <a class="navbar-brand" href="https://www.websitetalkingheads.com/"><img class="navbar-brand img img-fluid" src="https://www.websitetalkingheads.com/images/Talking_Heads_Banner_Logo.png" alt="Website Talking Heads"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
		<div class="collapse navbar-collapse justify-content-center" id="navbarText">
			<ul class="navbar-nav main-nav">
				<li class="nav-item" id="menuHome"><a href="/index.php">Home</a></li>
				<li class="nav-item" id="menuActors"><a href="/spokespeople/female-carousel.php">Actors</a></li>
				<li class="nav-item" id="menuOrder"><a href="/orderform/">Order</a></li>
				<li class="nav-item" id="whiteboard"><a href="/whiteboard/">White<br>Board</a></li>
				<li class="nav-item" id="menuVideos"><a href="/videopresentations/">Videos</a></li>
				<li class="nav-item" id="menuContact"><a href="/contact.php">Contact</a></li>
				<li class="nav-item" id="menuSpecials"><a href="/specials/">Specials</a></li>
			</ul>
			</div>
			<span class="navbar-text"> <a class="phone-header" href="tel:801-748-2281" title="Give us a call.">801-748-2281</a> </span> 
	</nav>
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