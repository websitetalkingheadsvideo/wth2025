<?php
$spintax = new Spintax();
$url = $spintax->process( '{15127886532|15188469041|15235769881|15238264771|15238265591|15238268511|3d Logo Intro|3d Logo Reveal|Best 3d Logo Reveal|Best 3d Logo Sting|Best Custom Element 3d Logo Sting|Best Custom Element 3d Logo Stinger|Best Custom Logo Animation|Best Element 3d Logo Reveal|Best Explainer Video|Best Logo Sting|Best Logo Stinger|Best Person On Website |Best Professional 3d Logo Stinger|Best Professional Element 3d Logo Sting|Best Professional Logo Sting|Best SEO Video |Best Sketch Video Maker|Chalkboard Example - Logo Stinger|Claymation - Online Marketing|Claymation - Online Promotion|Claymation - Online Video Marketing|Crayon Demo- vSEO |Crayon Demo- vSEO Expert|Crayon Demo- vSEO Experts|Custom 3d Logo Reveal|Custom Element 3d Logo Reveal|Drawing Video-Internet Marketing |Drawing Video-Website Video Experts|Element 3d Logo Stinger|Internet Video Promotion - Watercolor Example|Kinetic Typography Definition|Kinetic Typography Songs|Kinetic Typography Video|Kinetic Typography YouTube|Logo Reveal|Logo Sting|Music Videos With Text|Professional 3d Logo Reveal|Professional 3d Logo Sting|Professional 3d Logo Stinger|Professional Logo Animation|Professional Logo Stinger}' );
$spintax = new Spintax();
$title = $spintax->process( '{Custom |}{Web|Internet|Website|Online}{ Marketing|} {Video|}' );
echo '<img src="http://seovideoexperts.com/wp-content/uploads/wp_image_duplicator_uploads/' . $url . '.jpg" class="img-responsive" title="' . $title . '" alt="' . $title . '">';
echo PHP_EOL;
class Spintax {
    public

    function process( $text ) {
        return preg_replace_callback( '/\{(((?>[^\{\}]+)|(?R))*)\}/x', array(
            $this,
            'replace'
        ), $text );
    }
    public

    function replace( $text ) {
        $text = $this->process( $text[ 1 ] );
        $parts = explode( '|', $text );
        return $parts[ array_rand( $parts ) ];
    }
}
?>