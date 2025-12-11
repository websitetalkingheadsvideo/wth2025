<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Website Talking Heads&reg; | Examples Page</title>
    <meta name="keywords" content="online spokesperson, video spokesperson, website talking heads, website actor, website video, transparent flash, virtual spokesperson, spokesperson, video presenter, website presenter, website spokesperson, video salesperson">
    <meta name="description" content="Here are examples of the many types of videos we can make for you.  Use a Website Spokesperson to greet visitors to your site.  If you are a professional video developer you can use one of our Professional Spokespeople in your next internet video project.  Use a Custom Video Presentation to demonstrate your product.  Use a whiteboard or animation video to show your process or service.">
    <meta name="robots" CONTENT="index, follow">
    <!-- (Robot commands: All, None, Index, No Index, Follow, No Follow) -->
    <meta name="revisit-after" CONTENT="30 days">
    <meta name="distribution" CONTENT="global">
    <meta name="rating" CONTENT="general">
    <meta name="Content-Language" CONTENT="english">
    <meta name="verify-v1" content="YNESpqoAwK51PmBV7/PFKLG0agx7AQPKhXXcYAXGGF8="/>
    <meta name="norton-safeweb-site-verification" content="iinbv24r-1ix20hgj5l94wz2rnn3aiwi0336hwysvvpiskquy6ijsh9wy12f3znbed-hz1ay8ppzhgqap-sicqtw6ui29d0wrfcpenudh1ml9xwjbej7u25xy9pnm6yr"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <link href="/css/style.css?v=<?php echo rand(1,100); ?>" rel="stylesheet" type="text/css"/>
    <link href="/css/fluid.css" rel="stylesheet" type="text/css"/>
    <script src="//use.typekit.net/dib0cib.js"></script>
    <script>
        try {
            Typekit.load();
        } catch ( e ) {}
    </script>
</head>

<body>
    <?php include ('../../includes/header.php'); ?>
    <section class="container">
        <?php
        require( "connect.php" );
        $table = $_GET["table"];
        echo '<h1 class="text-uppercase">'. $table . '</h1>';
        $sql = "SELECT * FROM " . $table;
        $sql .= " ORDER BY list_order";
        $result = $conn->query( $sql );

        if ( $result->num_rows > 0 ) {
            echo '<form action="database-update.php">';
            echo '<input name="table" type="hidden" value="'. $table .'">';
            $count = 0;
            while ( $row = $result->fetch_assoc() ) {
                $target = $row[ "target" ];
                $video = $row[ "name" ];
                $id = $row[ "id" ];
                $order = $row[ "list_order" ];
            echo '<div class="row p-10">';
                echo '<div class="col-sm-4">';
                echo PHP_EOL;
                echo '<h3 class="demo">' . $video . '</h3>';
                echo PHP_EOL;
                echo '</div>';
                echo PHP_EOL;
                echo '<div class="col-sm-2">';
                echo '<a href="https://www.youtube.com/watch?v=' . $target . '" target="_blank"><img src="//img.youtube.com/vi/' . $target . '/mqdefault.jpg" class="img img-responsive center-block data"></a>';
                echo PHP_EOL;
                echo '</div>';
                echo PHP_EOL;
                echo '<div class="col-sm-1">';
                echo PHP_EOL;
                echo 'ID=' . $id;
                echo PHP_EOL;
                echo '</div>';
                echo PHP_EOL;
                echo '<div class="col-sm-1">';
                echo '<input name="id[' . $id . ']" type="number" min="1" max="99" value="' . $order . '">';
                echo PHP_EOL;
                echo '</div>';
                echo PHP_EOL;
                echo '</div>';
                echo PHP_EOL;
                $count ++;
            }
            echo ' <input type="submit" class="m-25 center-block">';
            echo '</form>';
        } else {
            echo "0 results";
        }
        echo PHP_EOL;
        ?>
    </section>
    <?php include ('../../includes/footer.php'); ?>
</body>

</html>