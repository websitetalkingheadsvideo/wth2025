<footer class="bg-dark wow fadeIn">
  <div class="row small text-center">
    <div class="col-lg-4">
      <div class="text-light">Why Video?</div>
      <div class="italics"> <a href="tel:801-748-2281" title="Let's Talk!"> "It's <span class="thin">Time</span> We Talk..." </a> </div>
      <i class="fa fa-phone text-light"></i> <br/>
      <span> <a href="tel:801-748-2281" title="Give us a call." > 801-748-2281 </a> </span> </div>
    <div class="col-lg-4">
      <div class="text-light">Follow Us</div>
      <div class="social-icons mt-3"> <a href="https://www.facebook.com/websitetalkingheads/" title="Facebook" target="new" class="social-link-small">
        <div class="social-facebook"></div>
        </a> <a href="https://twitter.com/TalkingHeadsVid" title="Twitter" target="_blank" class="social-link-small">
        <div class="social-twitter"></div>
        </a> <a href="https://www.instagram.com/websitevideopro/" title="Instagram" target="_blank" class="social-link-small">
        <div class="social-instagram"></div>
        </a> <a href="https://goo.gl/Wuj6Gm" title="YouTube" target="_blank" class="social-link-small">
        <div class="social-youtube"></div>
        </a> <a href="https://www.linkedin.com/company/websitetalkingheads.com/" title="LinkedIn" target="_blank" class="social-link-small">
        <div class="social-linkedin"></div>
        </a> <a href="https://www.pinterest.com/websitetalkingheadsvideo" title="Pinterest" target="_blank" class="social-link-small">
        <div class="social-pinterest"></div>
        </a> <a href="https://coolwebsitevideo.tumblr.com/" title="Tumbler" target="_blank" class="social-link-small">
        <div class="social-tumbler"></div>
        </a> </div>
    </div>
    <div class="col-lg-4">
      <div class="text-light">Navigation</div>
      <div class="text-info">
        <?php
        $linkString = $_SERVER[ "REQUEST_URI" ];
        $linkString = substr( $linkString, 0, strpos( $linkString, "?" ) );
        $crumbs = explode( "/", $linkString );
        $crumbs = array_filter( $crumbs );
        array_unshift( $crumbs, "home" );
        $linkBase = strtolower( substr( $_SERVER[ "SERVER_PROTOCOL" ], 0, 5 ) ) == 'https' ? 'https' : 'http';
        $linkBase = $linkBase . "://";
        $linkPath = $linkBase . $_SERVER[ 'HTTP_HOST' ];
        $word = "";
        $crumbCounter = 0;
        ?>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent justify-content-center">
            <?php
            foreach ( $crumbs as $crumb ) {
              $word = $crumb;
              if ( $crumbCounter === 0 ) {
                echo '<li class="breadcrumb-item"><a href="' . $linkPath . '" >Home</a></li>';
                $linkPath = $linkPath . '/';
              } else {
                $linkPath = $linkPath . $word . '/';
                echo '<li class="breadcrumb-item"><a href="' . $linkPath . '" >' . $word . '</a></li>';
              }
              $crumbCounter++;
            }
            ?>
          </ol>
        </nav>
        <a class="text-light" href="https://www.websitetalkingheads.com/sitemap.php" title="Sitemap"> Sitemap </a> </div>
    </div>
  </div>
  <div class="text-light text-center" style="font-size: .75rem"><a href="https://www.websitetalkingheads.com/privacy-policy.php">Privacy Policy</a></div>
  <div class="notification"><i class="far fa-copyright"></i> <span id="year"> <?php echo date("Y")?> </span> Talking Heads. All rights reserved.</div>
</footer>
<!-----------------------------Java Script-----------------------------> 
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> 
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> 
<script src="https://www.websitetalkingheads.com/js/wow.js"></script> 
<script src="https://www.websitetalkingheads.com/js/izeetak.js"></script> 
<script src="https://www.websitetalkingheads.com/js/site.js"></script> 
<!-- Clixtell Tracking Code --> 
<script src="https://www.websitetalkingheads.com/js/tracking.js"></script>

