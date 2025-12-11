<?php

// displays all the file nodes
if ( !$xml = simplexml_load_file( 'includes/examples-templates.xml' ) ) {
  trigger_error( 'Error reading XML file', E_USER_ERROR );
}
echo '<section id="products" class="container-fluid">';
echo PHP_EOL;
echo '<ul class="product-list">';
echo PHP_EOL;
foreach ( $xml as $example ) {
  $target = $example->target;
  $name = $example->name;
  $video = str_replace( "'", "", $name );
  echo '<li class="col-md-4 product-item" data-prod_id="' . $target . '">';
  echo PHP_EOL;
  echo '<a title="' . $video . '" href="https://www.youtube.com/watch?v=' . $target . '&rel=0&autoplay=1&hd=1" class="lightbox"><img src="https://img.youtube.com/vi/' . $target . '/maxresdefault.jpg" class="img img-responsive box" id="' . $video . '" alt="Custom Video Presentation Example - ' . $name . ' " ></a>';
  echo PHP_EOL;
  echo '<h2 class="product-name" data-type="animation">' . $name . '</h2>';
  echo PHP_EOL;
  echo '</li>';
  echo PHP_EOL;
}
echo '</ul>';
echo PHP_EOL;

?>
