<?php
$cars = [
    [
        'id' => 1,
        'name' => "X70",
        'make' => "Volvo",
        'year' => 2019
    ],
    [
        'id' => 4,
        'name' => "Ceed",
        'make' => "KIA",
        'year' => 2007
    ],
    [
        'id' => 5,
        'name' => "Firebird Trans Am",
        'make' => "Pontiac",
        'year' => 1989
    ],
    [
        'id' => 42,
        'name' => "911",
        'make' => "Porsche",
        'year' => 2012
    ]
];

var_dump($cars);

//yttre loop
foreach ($cars as $carIndex=>$car) {
//    echo "<hr>yttre loop påbörjad, index $carIndex";
//    var_dump($carIndex);
//    var_dump($car);
//inre loop
    foreach ($car as $key => $value) {
//        echo "<br>inre loop påbörjad";
//        var_dump($key, $value);
        echo "<br>$key innehåller $value";
//        echo "<br>inre loop avslutad";
    }
//    echo "<br>yttre loop avslutat för detta varv";
}

