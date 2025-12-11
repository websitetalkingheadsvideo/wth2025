<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>database update</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <link href="/css/style.css?v=<?php echo rand(1,100); ?>" rel="stylesheet" type="text/css"/>
    <link href="/css/fluid.css" rel="stylesheet" type="text/css"/>
    
</head>

<body>
    <?php include ('https://www.websitetalkingheads.com/includes/header.php'); ?>
    <section class="container">
        <h1>Database Update</h1>
        <?php 
    require( "connect.php" );
    $table=$_GET["table"]; 
    $array = $_GET["id"];
    foreach ($array as $id => $order){
        $sql = 'UPDATE '. $table .' SET list_order="'.$order.'" WHERE id='.$id;
       if($conn->query($sql) === TRUE){
            echo '<br>success!';
        } else{
            echo '<br>error!';
        }
    }
?>
    </section>
    <section class="container">
        <div class="center-block">
            <a href="index.php">
<button class="btn btn-success m-25">Return</button>
</a>
        
        </div>
    </section>
</body>

</html>