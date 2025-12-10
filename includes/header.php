<?php
$page = basename( $_SERVER[ 'PHP_SELF' ] ); /* Returns The Current PHP File Name */
$pagename = strtok( $page, "." );
if ( $pagename != "index" ) {
    $pagename = str_replace( "-", " ", $pagename );
} else {
    $geturl = $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'PHP_SELF' ]; /* get url */
    $baseurl = trim( $geturl, "/index.php" );
    $myurl = substr( $baseurl, 28 );
    $pagename = $myurl;
}
$pagename = ucfirst( $pagename );
if ( $pagename != "" ) {} else {
    $pagename = "Home";
}
$pagetitle = trim( $page, "/" ); /* get page title */
$tags = get_meta_tags( $pagetitle ); /* get tags for info */
?>
<header class="container-fluid center-block">
    <section id="header_top">
        <a href="https://www.websitetalkingheads.com/">
            <img class="img img-fluid" src="/images/Talking_Heads_Banner_Logo.png"  alt="Website Talking Heads"/>
        </a>
        <h3><a class="phone-header" href="tel:801-748-2281" title="Give us a call." >801-748-2281</a></h3>
    </section>
    <nav class="row center-block" id="Talking-Heads-Navigation">
        <ul class="center-block">
            <li class="center-block"><a href="https://www.websitetalkingheads.com/" id="menuHome">
                <h2>Home</h2>
                </a> </li>
            <li class="center-block"><a href="/spokespeople/female-carousel.php" id="menuActors">
                <h2>Actors</h2>
                </a> </li>
            <li class="center-block"><a href="/product-demonstrations/" id="menuProductDemos">
                <h2 class="nav-productDemos">Product<br>
                    Demos</h2>
                </a> </li>
            <li class="center-block"><a href="/pricing/" id="menuPrices">
                <h2>Prices</h2>
                </a> </li>
            <li class="center-block"><a href="/orderform/" id="menuOrder">
                <h2>Order</h2>
                </a> </li>
            <li class="center-block"><a href="/whiteboard/" id="whiteboard">
                <h2> <span class="wb">White<br/>
                    Board</span> </h2>
                </a> </li>
            <li class="center-block"><a href="/videopresentations/" id="menuVideos">
                <h2>Videos</h2>
                </a> </li>
            <li class="center-block"><a href="/contact.php" id="menuContact">
                <h2>Contact</h2>
                </a> </li>
            <li class="center-block"><a href="/specials/" id="menuSpecials">
                <h2>Specials</h2>
                </a> </li>
        </ul>
    </nav>
</header>
<div class="c line"></div>
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
<script type="application/ld+json"> { 
"@context" : "https://schema.org",
"@type" : "LocalBusiness", 
"address" : {
"@type": "PostalAddress",
"addressLocality": "Sandy", 
"addressRegion": "Utah", 
"postalCode": "84070", 
"streetAddress": "245 W. 9000 S." }, 
"name":"Website Talking Heads",
"url":"https://www.websitetalkingheads.com/",
"email":"info@websitetalkingheads.com",
"telephone":"8017482281",
"openingHours": [ 
"Monday - Friday 09:00-17:30"], 
"paymentAccepted":"Visa, Master Card, Discover, Amex"
} </script>