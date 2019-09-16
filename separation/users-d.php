<?php
// controller

$header = "Exempel D - skapa html via funktion";

//sätt urlen vi ska hämta data från
$url = "https://jsonplaceholder.typicode.com/users";

// hämta data
$data = file_get_contents($url);

// konvertera till array
$users = json_decode($data, true);


function outputBoxes(array $arr, string $class){
    foreach ($arr as $item) {
        echo "<div class='$class'>";
        foreach ($item as $value) {
            if (!is_array($value)) {
                echo "<p>$value</p>";
            }
        }
        echo "</div>";
    }
}


//require "users-a.view.php";
require "views/users-d.view.php";
//require "users-d.view.php";