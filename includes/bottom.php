<!-- Bootstrap 5.3.8 JS - No jQuery dependency, Popper included (CDN) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<!-- jQuery (kept for other site functionality) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="js/evenHeight.js"></script>
<script src="js/jquery.plugin.js"></script>
<script src="js/jquery.countdown.js"></script>

<script>
    // Bootstrap 5 tooltip initialization (vanilla JS)
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
    var script = document.createElement( 'script' );
    var prefix = document.location.protocol;
    script.async = true;
    script.type = 'text/javascript';
    var target = prefix + '//scripts.clixtell.com/track.js';
    script.src = target;
    var elem = document.head;
    elem.appendChild( script );
</script>