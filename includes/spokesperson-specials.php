<section class="spokesperson-specials mb-2">
    <?php
    $url = 'https://www.websitetalkingheads.com/featuredactor/featuredactor.xml';
    $xml = simplexml_load_file( $url );
    $male = $xml->male;
    $female = $xml->female;
    $newdateBase = $xml->newdate;
    $newdate = "THIS OFFER EXPIRES<br>Friday, " . $newdateBase;
    ?>
    <h2 class="text-capitalize">Website Spokesperson Specials<br>
        Featured actors</h2>
    <div class="row">
        <div class="col-lg-3 offset-1">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" type="text/html" src="ivideo/talking-heads-player.php?video=<?=$male?>&autostart=no&controls=mouse&actor=true"></iframe>
            </div>
            <div class="spokesperson-name">
                <?=$male?>
            </div>
        </div>
        <div class="col-lg-4 d-flex flex-column text-center">
            <div class="specials">
                <div class="text-center text-dark">
                    <?=$newdate?>
                </div>
                <div class="text-center text-primary"><a href="/order.php">Buy One, Get One Free</a></div>
                <div class="seconds">30 Second Video $399(41-90 Words)</div>
                <div class="seconds">60 Second Video $499(91-180 Words)</div>
            </div>
            <div class="m-auto">
                <p class="tiny text-capitalize">Featured Actor Videos Must be shot at same time, for same domain, using only ONE Featured Actor</p>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" type="text/html" src="ivideo/talking-heads-player.php?video=<?=$female?>&autostart=no&controls=mouse&actor=true"></iframe>
            </div>
            <div class="spokesperson-name">
                <?=$female?>
            </div>
        </div>
    </div>
</section>
