<!doctype html>
<html><head>
	<meta charset="utf-8">
	<title>Website Talking Heads&reg; | Product Demos</title>
	<meta name="keywords" content="Product Demonstration,Product Demo Videos ,Product Demonstration Videos,benefits of product demonstration,product demonstration video company,what is product demonstration,what is a demo video,product demo video examples,product video examples,product video production,">
	<meta name="description" content="Here are examples of the product demonstations we have created.  We can create a custom product demonstration to demonstrate your product.  Use a whiteboard or animation video to show your process or service.">
	<meta name="robots" CONTENT="index, follow">
	<!-- (Robot commands: All, None, Index, No Index, Follow, No Follow) -->
	<meta name="revisit-after" CONTENT="30 days">
	<meta name="distribution" CONTENT="global">
	<meta name="rating" CONTENT="general">
	<meta name="Content-Language" CONTENT="english">
	<meta name="verify-v1" content="YNESpqoAwK51PmBV7/PFKLG0agx7AQPKhXXcYAXGGF8="/>
	<meta name="norton-safeweb-site-verification" content="iinbv24r-1ix20hgj5l94wz2rnn3aiwi0336hwysvvpiskquy6ijsh9wy12f3znbed-hz1ay8ppzhgqap-sicqtw6ui29d0wrfcpenudh1ml9xwjbej7u25xy9pnm6yr"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include("../includes/googleanalytics.php"); ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<link href="/css/style.css?v=<?php echo rand(1,100); ?>" rel="stylesheet" type="text/css"/>
	<link href="/css/fluid.css" rel="stylesheet" type="text/css"/>
	<!-- // <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.js"></script> -->
	<!-- // <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.1.0.js"></script>  -->
	<link rel="stylesheet" type="text/css" href="../lightbox/js/lightbox/themes/default/jquery.lightbox.css"/>
	<!--[if IE 6]>
  <link rel="stylesheet" type="text/css" href="js/lightbox/themes/default/jquery.lightbox.ie6.css" />
  <![endif]-->
	<script type="text/javascript" src="../lightbox/js/lightbox/jquery.lightbox.min_v2.js"></script>
	<!-- // <script type="text/javascript" src="src/jquery.lightbox.js"></script>   -->
	<script type="text/javascript">
		jQuery( document ).ready( function ( $ ) {
			$( '.lightbox' ).lightbox();
		} );
	</script>
	<link href="../css/examples.css" rel="stylesheet" type="text/css"/>
	<script src="//use.typekit.net/dib0cib.js"></script>
	<script>
		try {
			Typekit.load();
		} catch ( e ) {}
	</script>
</head>

<body>
	<?php include ('../includes/header-tracking-removed.php'); ?>
	<section class="jumbotron">
		<h1>Product Demonstrations</h1>
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<!-- 16:9 aspect ratio -->
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/2N4S6yjk2tA?loop=1&rel=0&iv_load_policy=3" frameborder="0"></iframe>
					</div>
				</div>
				<div class="col-sm-4">
					<?php include("../forms/contactform.php"); ?>
				</div>
			</div>
		</div>
	</section>
	<section class="container">
		<div class="header-group">
			<h2>Product Development</h2>
			<h3>Sometimes when you develop a brand-new product the most challenging part is figuring out the best way to reveal it to the masses.</h3>
			<h3>Here at Talking Heads<sup>&reg;</sup> we make it easy for you.</h3>
			<h3>Our Product Demo Videos will show off your product and explain how it will work for your customers.</h3>
		</div>
	</section>
	<section class="container">
		<?php 
				    $table ="product_demos";
				    $show ="3";
				    include("Product-Demo.php"); 
		?>
	</section>

	<section class="alert alert-success">
		<div class="container product-demo">
			<h2>You only get one chance to make a first impression</h2>
			<h3>Make it count with a sensational, expertly produced product demonstration.</h3>
			<p>Sometimes when you develop a brand-new product the hardest part is brainstorming the easiest way to reveal it to the masses. How is your service going to make that impression for a brand-new product? Prior to the web, business counted on print media and photos to promote their products, however with the web and social networks, business are relying on product demonstrations to engage their audience and drive sales.</p>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-md-offset-3">
					<img id="bannerHeight" src="../images/video-production-banner.png" alt="Number One Video Production" class="vertical-center img-responsive" title="Number One Video Production">
				</div>
				<div class="col-md-3">
					<img id="seal" src="../images/video-production-seal.png" alt="#1 Video Production" class="img-responsive" title="#1 Video Production">
				</div>
			</div>
		</div>
		<h3 class="text-center"><a href="https://www.websitetalkingheads.com/product-demonstrations/">More Product Demonstrations</a></h3>
		<section class="container" style="margin-bottom: 1rem">
			<div class="embed-responsive embed-responsive-16by9">
				<iframe src="https://www.google.com/maps/d/embed?mid=1_79CC2C4eX_r_48_WUl-LltTAeW7S00e" width="640" height="480"></iframe>
			</div>
		</section>
	</section>
	<?php include ('../includes/footer.php'); ?>
	<?php include ('../includes/chatform.php'); ?>
	<script>
		var seal = $( '#seal' ).outerHeight();
		var banner = $( '#bannerHeight' ).outerHeight();
		var pad = ( seal - banner ) / 2 + "px";
		$( '#bannerHeight' ).css( "padding-top", pad );
	</script>
</body>

</html>