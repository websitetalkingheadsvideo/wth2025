        <div class="playerBox">
 			<div id="musicChosen">Select Your Music</div>
            <input type="hidden" name="music" id="music" value="" />
            <ul class="player">
                <?php
                $url = '
https://websitetalkingheads.com/music/VirtualSetsMusic.xml';
                $xml = simplexml_load_file($url);
                foreach($xml as $item){
                    $actor = $item['track'];
                    $shortFilename = str_replace("VirtualSetsMusic/", "", $actor);
                    $shortFilename = str_replace(".mp3", "", $shortFilename);
                echo '<li data-src="'.$actor.'">'.$shortFilename.'</li><input type="radio" name="music" value="'.$shortFilename.'" id="'.$shortFilename.'" onclick="musicChosen(this);"/>';
                echo '<div class="c"></div>';
                }
                
                ?>
            </ul>
				<script src="
https://websitetalkingheads.com/orderform/js/musicPlayer.js"></script>
        </div>