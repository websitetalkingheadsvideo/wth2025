$(document).ready(function () {
    var $videoHover = $(".video-hover");
    var $videoPlay = $(".video-hover video")[0];
    var $button = $(".video-hover button");
    var playPressed = false;
    $videoHover.on('mouseenter', function () {
        if ($videoPlay.paused) {
            $videoPlay.play();
        } else {
            playPressed = true;
            console.log( "inside playPressed" );
        }
    });
    $videoHover.on('mouseleave', function () {
        console.log( playPressed );
        if (!playPressed) {
            $videoPlay.pause();
            $button.show();
        }
    });

});
