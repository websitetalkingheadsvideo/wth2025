// JavaScript Document
$(document).ready(function () {
    "use strict";
    player();
});

function player() {
    "use strict";
    var thv = $('#Talking_Heads_Video'),
        fullWidth, progressPad, otherWidth, progressWidth, timeString = "",
        center, clickWidth, pullRight, muteTest, clickPlay;
    try {
        if (thv[0].loop) {
            muteTest = true;
        } else {
            clickPlay = true;
            muteTest = false;
        }
    } catch (err) {}
    var playerColor = $('#color').text();
    $('.playerBar').css("background", playerColor);
    barSpace();
    //---------------------------create click to play
    $("#video-player").append($('<h2>').attr("id", "clicktoplay").append("<span/>").text("Click to Play").css('width', 'auto'));
    placeClicktoPlay();
    //-----------------------------event listeners----------------------------
    $("#Talking_Heads_Video").on("timeupdate", function () {
        showTime(this.currentTime, this.duration);
        var playedPercent = 100 * this.currentTime / this.duration;
        playedPercent = playedPercent.toFixed(1);
        $('.timeBar').css({
            'width': playedPercent + '%'
        });
    });
    $(window).resize(function () {
        if ($('#clicktoplay')) {
            placeClicktoPlay();
            barSpace();
        }
    });
    var theParent = document.querySelector("#video-player");
    try {
        theParent.addEventListener("click", playerClick, false);
        theParent.addEventListener("mouseover", overVideo, false);
        theParent.addEventListener("mouseout", outVideo, false);
    } catch (err) {}

    function outVideo(e) {
        if (e.target !== e.currentTarget) {
            hideControls();
            switch (e.target.id) {
                case "playpause":
                case "fullscreen":
                case "muteBtn":
                    e.target.style.opacity = 1;
                    break;
            }
        }
        e.stopPropagation();
    }

    function overVideo(e) {
        if (e.target !== e.currentTarget) {
            showControls();
            switch (e.target.id) {
                case "muteBtn":
                case "playpause":
                case "fullscreen":
                    e.target.style.opacity = 0.7;
                    break;
            }
        }
        e.stopPropagation();
    }

    function playerClick(e) {
        if (e.target !== e.currentTarget) {
            if (muteTest || clickPlay) {
                removeClickPlay();
            } else {
                switch (e.target.id) {
                    case "Talking_Heads_Video":
                    case "playpause":
                        playpauseToggle();
                        break;
                    case "muteBtn":
                        muteToggle();
                        break;
                    case "fullscreen":
                        goFullscreen();
                        break;
                }
            }
        }
        e.stopPropagation();
    }

    function goFullscreen() {
        try {
            thv[0].mozRequestFullScreen();
        } catch (err) {}
        try {
            thv[0].webkitRequestFullscreen();
        } catch (err) {}
    }

    function playpauseToggle() {
        $('#playpause').toggleClass('fa-pause-circle-o  fa-play-circle-o');
        if (thv[0].paused) {
            thv[0].play();
        } else {
            thv[0].pause();
        }
    }

    function removeClickPlay() {
        $("#clicktoplay").hide();
        $('#playpause').toggleClass('fa-pause-circle-o  fa-play-circle-o');
        thv[0].currentTime = 0;
        if (muteTest) {
            muteToggle();
        }
        thv[0].play();
        thv[0].loop = false;
        barSpace();
        muteTest = false;
        clickPlay = false;
    }

    function muteToggle() {
        $('#muteBtn').toggleClass('fa-volume-up  fa-volume-off');
        if (thv[0].muted) {
            thv[0].muted = false;
        } else {
            thv[0].muted = true;
        }
    }

    function showTime(currentTime, duration) {
        var cur = parseInt(currentTime);
        setTimeDisplay(cur);
        $("#current").text(timeString);
        var dur = parseInt(duration);
        setTimeDisplay(dur);
        $("#duration").text(timeString);
    }

    function setTimeDisplay(t) {
        var minutes = Math.floor(t / 60);
        var seconds = Math.floor(t - (minutes * 60));
        if (seconds < 10) {
            seconds = "0" + seconds;
        }
        timeString = minutes + ":" + seconds;
        return timeString;
    }
    var timeDrag = false; /* Drag status */
    $('.progressBar').mousedown(function (e) {
        timeDrag = true;
        updatebar(e.pageX);
    });
    $(document).mouseup(function (e) {
        if (timeDrag) {
            timeDrag = false;
            updatebar(e.pageX);
        }
    });
    $(document).mousemove(function (e) {
        if (timeDrag) {
            updatebar(e.pageX);
        }
    });
    //update Progress Bar control
    var updatebar = function (x) {
        var progress = $('.progressBar');
        var maxduration = thv[0].duration; //Video duraiton
        var position = x - progress.offset().left; //Click pos
        var percentage = 100 * position / progress.width();
        //Check within range
        if (percentage > 100) {
            percentage = 100;
        }
        if (percentage < 0) {
            percentage = 0;
        }
        //Update progress bar and video currenttime
        $('.timeBar').css('width', percentage + '%');
        thv[0].currentTime = maxduration * percentage / 100;
    };

    function barSpace() {
        fullWidth = $('.playerBar').innerWidth();
        progressPad = $('.progressBar').css('padding-left');
        try {
            progressPad = progressPad.replace('px', '') * 2;
        } catch (err) {}
        otherWidth = Math.round($('#playpause').outerWidth() + $('#muteBtn').outerWidth() + $('#timeHolder').outerWidth() + $('#fullscreen').outerWidth() + progressPad);
        progressWidth = fullWidth - otherWidth - 10;
        $('.progressBar').css({
            "width": progressWidth,
        });
    }

    function placeClicktoPlay() {
        center = $("#video-player").width() / 2;
        clickWidth = $('#clicktoplay').outerWidth() / 2;
        pullRight = center - clickWidth;
        $("#clicktoplay").css({'left': pullRight,'color':playerColor,'border-color':playerColor});
    }

    function showControls() {
        $(".playerBar").stop().animate({
            "opacity": "1"
        }, 1000);
    }

    function hideControls() {
        $(".playerBar").stop().animate({
            "opacity": "0"
        }, 1000);
    }
}
