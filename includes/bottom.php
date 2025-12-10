<!-- JQuerry and Bootstrap JS-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="js/evenHeight.js"></script>
<script src="js/jquery.plugin.js"></script>
<script src="js/jquery.countdown.js"></script>

<script>
    $( '[data-toggle="tooltip"]' ).tooltip();
    var script = document.createElement( 'script' );
    var prefix = document.location.protocol;
    script.async = true;
    script.type = 'text/javascript';
    var target = prefix + '//scripts.clixtell.com/track.js';
    script.src = target;
    var elem = document.head;
    elem.appendChild( script );
</script>