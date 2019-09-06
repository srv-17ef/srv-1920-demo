<?php

//------ initiering ------
//skapa tom array
$gameBoard = [];

//initiera lite inställningar
$nrOfRows = 3;
$nrOfColumns = 3;
$counter = 1;

//------ fylla arrayen men värden ------

//skapa den yttre loopen
for ($rowNr = 0; $rowNr < $nrOfRows; $rowNr++) {

//    skapa den inre loopen
    for ($colNr = 0; $colNr < $nrOfColumns; $colNr++) {

//        skriv till arrayen på rätt position
        $gameBoard[$rowNr][$colNr] = $counter;

//        öka räknaren
        $counter++;
    }
}

//kontrollera att arrayen ser rätt ut
//var_dump($gameBoard);
?>


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
    //------ skriva ut arrayen som boxar i html ------
    foreach ($gameBoard as $row) {
        foreach ($row as $cell) {
            echo "<div class='box'>$cell</div>";
        }
    }
    ?>
</div>
</body>
</html>


