<?php
// view
// denna fil visar hur man växlar mellan html och php
// målet är att all php ska vara så gott som enrad
// denna blir mycket svårläst när man har komplex data
// fördelen är att man kan skriva html enklare

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<ul>
    <li><a href="users-a.php"></a>a - bas med 2 loopar</li>
    <li><a href="users-b.php"></a>b - endast 1 loop</li>
    <li><a href="users-c.php"></a>c - växla html/php</li>
    <li><a href="users-d.php"></a>d - utskrift med funktion</li>
    <li><a href="twig.php"></a>templating med twig</li>
</ul>
<h1><?= $header ?></h1>



<?php
foreach ($users as $user) { ?>
    <div class='box'>
        <h1><?=$user["name"]?></h1>
        <h4><?=$user["username"]?></h4>";
    </div>
 <?php } // foreach yttre
?>
</body>
</html>
