<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
$url = "https://www.websitetalkingheads.com/sitemap22.php";
preg_match("/<title>(.+)<\/title>/siU", file_get_contents($url), $matches);
$title = $matches[1];
    echo $title;
?>
</body>
</html>