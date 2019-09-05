<?php

// skapa indexerad array
$people = [
    "Ada",
    "Yoko",
    "Adil",
    "Sune"
];
var_dump($people);

//loopa igenon
$itemCount = count($people);
for ($i = 0; $i < $itemCount; $i++) {
    echo $people[$i] . "<br>";
    var_dump($people[$i]);
}


// skapa associativ array
$car = [
    'id' => 1,
    'name' => "X70",
    'make' => "Volvo",
    'year' => 2019
];
var_dump($car);

//kan ej loopa med räknar så använda foreach
foreach ($car as $key => $value) {
    var_dump($key, $value);
    echo $key . " innehåller " . $value . "<br>";
}
