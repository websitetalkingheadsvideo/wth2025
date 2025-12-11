<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<?php include("../includes/css-b4.php"); ?>
<link href="https://www.websitetalkingheads.com/css/animate.css" rel="stylesheet" type="text/css">
<style type="text/css">
.box {
    padding: 100px;
    background-color: #64B6AC;
    text-align: center;
    line-height: 200px;
    margin: 200px auto;
    color: #fff;
    font-weight: bold;
}
    .hidden{opacity: 0}
</style>
</head>

<body>
<h1 class="intro-text">Scroll Down To Reveal Stuff!</h1>
<section class="container">
  <div class="box hidden fadeInLeftBig slow">
    I came from left
  </div>
</section>
<section class="container">
  <div class="box hidden fadeInRightBig slow delay-1s">
    I came from right
  </div>
</section>
<section class="container">
  <div class="box hidden fadeInUpBig">
    I came from bottom
  </div>
</section>
<section class="container">
  <div class="box hidden fadeInDownBig">
    I came from above
  </div>
</section>
<script>
    function scrollTrigger(selector, options = {}){
    let els = document.querySelectorAll(selector)
    els = Array.from(els)
    els.forEach(el => {
        addObserver(el, options)
    })
}

function addObserver(el, options){
    if(!('IntersectionObserver' in window)){
        if(options.cb){
            options.cb(el)
        }else{
            entry.target.classList.add('animated')
        }
        return
    }
    let observer = new IntersectionObserver((entries, observer) => { //this takes a callback function which receives two arguments: the elemts list and the observer instance
        entries.forEach(entry => {
            if(entry.isIntersecting){
                if(options.cb){
                    options.cb(el)
                }else{
                    entry.target.classList.replace('hidden','animated');
                }
                observer.unobserve(entry.target)
            }
        })
    }, options)
    observer.observe(el)
}
// Example usages:
scrollTrigger('.intro-text')

scrollTrigger('.hidden', {
    rootMargin: '-200px',
})

scrollTrigger('.loader', {
    rootMargin: '-200px',
    cb: function(el){
        el.innerText = 'Loading...'
        setTimeout(() => {
            el.innerText = 'Task Complete!'
        }, 1000)
    }
})
    </script>
</body>
</html>