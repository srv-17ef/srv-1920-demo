<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .container {
            display: flex;
            flex-wrap: wrap;
        }

        .box {
            width: 50px;
            height: 50px;
            outline: solid thin gray;
            margin: 10px;
            padding: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <?php
    foreach ($gameBoard as $row) {
        foreach ($row as $cell) {
            ?>
            <div class='box'><?= $cell ?></div>
            <?php
        }
    }
    ?>
</div>
</body>
</html>
