// JavaScript Document
if (window.addEventListener) {
    window.addEventListener("load", faqPlayer, false);
}
else if (window.attachEvent) {
    window.attachEvent("onload", faqPlayer);
}
else {
    window.onload = faqPlayer;
}

function faqPlayer() {
    "use strict";
    var videoBox = document.getElementById('videoBox');
    videoBox.addEventListener("play", videoPlaying, false);
    videoBox.addEventListener("ended", videoEnded, false);
    document.getElementById('Volume').addEventListener("click", muteToggle, false);
    document.getElementById('PlayPauseBtn').addEventListener("click", playToggle, false);
    document.getElementById('RestartBtn').addEventListener("click", restartToggle, false);

    function videoPlaying() {
            videoBox.style.opacity = 1;
        }
        //function for when video Ends

    function videoEnded() {
        videoBox.style.opacity = 0;
        videoBox.autoplay = false;
        videoBox.load();
        document.getElementById('PlayPauseBtn').src = "play.png";
        videoBox.style.opacity = 1;
    }

    function playToggle() {
        if (videoBox.paused) {
            videoBox.play();
            document.getElementById('PlayPauseBtn').src = "buttons/pause.png";
        }
        else {
            document.getElementById('PlayPauseBtn').src = "buttons/play.png";
            videoBox.pause();
        }
    }

    function muteToggle() {
        if (videoBox.muted) {
            videoBox.muted = false;
            document.getElementById('Volume').src = "buttons/mute.png";
        }
        else {
            document.getElementById('Volume').src = "buttons/unmute.png";
            videoBox.muted = true;
        }
    }

    function restartToggle() {
        videoBox.currentTime = 0;
    }
}

function changeVideo(questionNumber) {
    "use strict";
    var newQuestion, newAnswer = "",
        videoBox = document.getElementById('videoBox');
    switch (questionNumber) {
        case 0:
            newQuestion = "Welcome to our Frequently Asked Questions center.";
            newAnswer =
                "Welcome to the FAQ Player.  We know you have some questions about a Video FAQ so we will use it to show you the benefits and answers some common questions.  Simply click on the question below and I will answer it for you.";
            delayQuestion();
            showVideo("video/jedfaq0777");
            break;
        case 1:
            document.getElementById('question').display = "none";
            newQuestion = "1. How many words can be used in the FAQ system?";
            newAnswer = "The basic FAQ can use a total of 400 words.  Those words can be spread however you want throughout the questions.";
            delayQuestion();
            showVideo("video/jedfaq0780");
            break;
        case 2:
            newQuestion = "2. Can I add more than the standard included number of words?";
            newAnswer = "Yes, you can add as many words as you need.  Please give us a call for pricing of additional words.";
            delayQuestion();
            showVideo("video/jedfaq0782");
            break;
        case 3:
            newQuestion = "3. How many questions does the standard FAQ player include?";
            newAnswer = "The standard player includes up to 10 questions.  So, you can create anywhere between 2 and 10 questions with the standard player.";
            delayQuestion();
            showVideo("video/jedfaq0784");
            break;
        case 4:
            newQuestion = "4. What if I have more questions than the standard included amount?";
            newAnswer =
                "We are fully capable of adding additional questions.  If you know how many questions (and words) your FAQ will have, give us a call and we can discuss your options and additional fees.";
            delayQuestion();
            showVideo("video/jedfaq0786");
            break;
        case 5:
            newQuestion = "5. Can I use more than one actor for my FAQ?";
            newAnswer =
                "The Standard Player includes one actor.  However, if you need to have more than one actor there is a cost to hire each additional actor you want in the FAQ.  We recommend just using one unless there is a really strong reason.";
            delayQuestion();
            showVideo("video/jedfaq0789");
            break;
        case 6:
            newQuestion = "6. Can I customize the Banner of the FAQ?";
            newAnswer =
                "Yes.  You can provide us with an image of the banner in jpg format only. 700x240pixel is the default size.  We can also customize that banner size to fit your website design.";
            delayQuestion();
            showVideo("video/jedfaq0792");
            break;
        case 7:
            newQuestion = "7.  Can you custom design a video FAQ system for me?";
            newAnswer =
                "Yes.  We have custom design FAQ systems for many of our clients.  Additional design and Programming fees will apply.  Please call with your exact design idea for a quote.";
            delayQuestion();
            showVideo("video/jedfaq0794");
            break;
        case 8:
            newQuestion = "8.  How will a video FAQ  benefit my website?";
            newAnswer =
                "People are more likely to watch a video than read text.  They are also more likely to remember what they has seen and heard than just read.  The FAQ player can help you save time and money by eliminate unnecessary customer service calls.";
            delayQuestion();
            showVideo("video/jedfaq0796");
            break;
        default:
            newQuestion = "Welcome to our Frequently Asked Questions center.";
            newAnswer =
                "Welcome to the FAQ Player.  We know you have some questions about a Video FAQ so we will use it to show you the benefits and answers some common questions.  Simply click on the question below and I will answer it for you.";
            delayQuestion();
            showVideo("video/jedfaq0777");
    }

    function delayQuestion() {
        document.getElementById('question').innerHTML = "";
        document.getElementById('answer').innerHTML = "";
        videoBox.pause();
        videoBox.style.opacity = 0;
        setTimeout(function() {
            document.getElementById('question').innerHTML = newQuestion;
        }, 300);
        setTimeout(function() {
            document.getElementById('answer').innerHTML = newAnswer;
        }, 700);
    }

    function showVideo(newSrc) {
        videoBox.style.opacity = 0;
        videoBox.src = newSrc + '.mp4';
        videoBox.load();
        videoBox.autoplay = true;
        videoBox.play();
        document.getElementById('PlayPauseBtn').src = "buttons/pause.png";
        videoBox.style.opacity = 1;
        videoBox.addEventListener("ended", function() {
            videoBox.style.opacity = 0;
            videoBox.autoplay = false;
            videoBox.load();
            document.getElementById('PlayPauseBtn').src = "buttons/play.png";
            videoBox.style.opacity = 1;
        });
    }
}