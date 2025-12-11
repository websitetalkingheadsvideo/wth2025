<!-- jQuery (required for Bootstrap 4) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<!-- Popper.js (required for Bootstrap 4) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<!-- Bootstrap 4.1.3 JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="js/evenHeight.js"></script>
<script src="js/jquery.plugin.js"></script>
<script src="js/jquery.countdown.js"></script>

<script>
    // Bootstrap 4 tooltip initialization (jQuery)
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
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