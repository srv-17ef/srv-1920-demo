<?php
// controller

$header = "Exempel D - templating med Twig";

//sätt urlen vi ska hämta data från
$url = "https://jsonplaceholder.typicode.com/users";

// hämta data
$data = file_get_contents($url);

// konvertera till array
$users = json_decode($data, true);


// --- TWIG ---
//du behöver först köra commandot i terminalen
//composer require "twig/twig:^2.0"

// ange rätt sökväg till mappen vendor utifrån filen
require_once '../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('views');
$twig = new \Twig\Environment($loader, [
//    'cache' => '/path/to/compilation_cache',
]);
echo $twig->render('twig.html', [
    'header' => $header,
    'users' => $users
]);

