<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>database update</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 4.1.3 CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="/css/style.css?v=<?php echo rand(1,100); ?>" rel="stylesheet" type="text/css"/>
    <link href="/css/fluid.css" rel="stylesheet" type="text/css"/>
    
</head>

<body>
    <?php include ('../includes/header.php'); ?>
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
            <a href="database-whiteboard.php">
<button class="btn btn-success m-25">Return</button>
</a>
        
        </div>
    </section>
<!-- jQuery 3.2.1 (required for Bootstrap 4) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<!-- Popper.js 1.14.3 (required for Bootstrap 4) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<!-- Bootstrap 4.1.3 JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbOW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>