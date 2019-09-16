<?php
// controller

$header = "Exempel C - växla mellan html och php";
//sätt urlen vi ska hämta data från
$url = "https://jsonplaceholder.typicode.com/users";

// hämta data
$data = file_get_contents($url);

// konvertera till array
$users = json_decode($data, true);


require "views/users-c.view.php";
