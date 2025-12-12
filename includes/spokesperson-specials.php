<style>
.poster { position: relative; display: inline-block; cursor: pointer; }
.poster .btn-play-small { 
    position: absolute; 
    top: 50%; 
    left: 50%; 
    transform: translate(-50%, -50%); 
    background-color: #0072FF; 
    color: white; 
    border: 2px solid white; 
    cursor: pointer; 
    border-radius: 50%; 
    opacity: 0.8; 
    height: 48px; 
    width: 48px; 
    z-index: 10;
}
.poster .btn-play-small:hover { 
    background-color: #6BCEFF; 
    border-color: #0072FF; 
    opacity: 0.9; 
}
.poster .btn-play-small::before { 
    position: absolute; 
    top: 50%; 
    left: 53%; 
    transform: translate(-50%, -50%); 
    font-family: "Font Awesome 5 Pro", "Font Awesome 5 Free"; 
    font-weight: 600; 
    content: "\f04b"; 
    color: white; 
    font-size: 22px; 
}
</style>
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
            <div class="poster spokesperson mx-auto" data-toggle="modal" data-target=".modal-spokesperson" data-video="<?=$male?>">
                <div class="btn-play-small"></div>
                <img src="https://www.websitetalkingheads.com/carimages/<?=$male?>.png" width="320" height="360" alt="<?=$male?> - Video Spokesperson" class="img-fluid">
            </div>
            <div class="spokesperson-name text-center mt-2">
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
            <div class="poster spokesperson mx-auto" data-toggle="modal" data-target=".modal-spokesperson" data-video="<?=$female?>">
                <div class="btn-play-small"></div>
                <img src="https://www.websitetalkingheads.com/carimages/<?=$female?>.png" width="320" height="360" alt="<?=$female?> - Video Spokesperson" class="img-fluid">
            </div>
            <div class="spokesperson-name text-center mt-2">
                <?=$female?>
            </div>
        </div>
    </div>
</section>
