<?php
require "vendor/autoload.php";
use Klein\Klein;
$klein = new Klein();
$klein->respond('GET', '/hello-world', function () {
    return 'Hello World!';
});
$klein->respond('GET', '/fisk/[:fishtype]/[:var2]', function ($request) {
    return require "fisk.php";
});
$klein->respond('GET', '/', function () {
    return require "home.php";
});

// Klein current master (2.1 dev) style:
$klein->respond(function($request, $response, $service, $app, $klein, $matched) {
    var_dump($matched);
    if ($matched > 0) {
        // We must have matched a route earlier

    } else {
        // I guess we didn't match anything earlier, let's go home...
        
    }
});

$klein->dispatch();