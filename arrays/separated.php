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

require "separated.view.php";