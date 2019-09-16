<?php
// controller

$header = "Exempel A - php skapar html";
//sätt urlen vi ska hämta data från
$url = "https://jsonplaceholder.typicode.com/users";

// hämta data
$data = file_get_contents($url);

// konvertera till array
$users = json_decode($data, true);

//var_dump($users);


require "views/users-a.view.php";
