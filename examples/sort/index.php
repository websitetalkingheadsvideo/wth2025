<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Sort Examples Page</title>
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
    <link href="../../css/examples.css" rel="stylesheet" type="text/css"/>
    <script src="//use.typekit.net/dib0cib.js"></script>
    <script>
        try {
            Typekit.load();
        } catch ( e ) {}
    </script>
</head>

<body>
    <?php include ('https://www.websitetalkingheads.com/includes/header.php'); ?>
    <section class="container">
        <h1>Sort</h1>
        <h2>Choose demo to sort</h2>
        <form action="database-sort.php">
            
<?php
$servername = "vdb1b.pair.com";
$username = "working_39";
$password = "EsQBeq3E";
$dbname = "working_examples";
if (!mysql_connect($servername, $username, $password)) {
echo 'Could not connect to mysql';
exit;
}
$sql = "SHOW TABLES FROM $dbname";
$result = mysql_query($sql);
if (!$result) {
echo "DB Error, could not list tables\n";
echo 'MySQL Error: ' . mysql_error();
exit;
}
        echo '<select name="table"  class="center-block">'; 
while ($row = mysql_fetch_row($result)) {
    $value = $row[0];
    echo '<option value="' . $value . '">' . $value . '</option>';
 
}
echo '</select>';  
   

?>
       <input class="center-block m-25" type="submit">
        </form>
   
    </section>
    <?php include ('https://www.websitetalkingheads.com/includes/footer.php'); ?>
</body>

</html>