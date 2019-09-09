<?php

$gameBoard = [];
$nrOfRows = 3;
$nrOfColumns = 3;
$counter = 1;

for ($rowNr = 0; $rowNr < $nrOfRows; $rowNr++) {
    for ($colNr = 0; $colNr < $nrOfColumns; $colNr++) {
        $gameBoard[$rowNr][$colNr] = $counter;
        $counter++;
    }
}

//kontrollera att arrayen ser rätt ut
//var_dump($gameBoard);

require "separated.view.php";