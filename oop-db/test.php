<?php
require_once "Database.php";

//$t1 = new Database();
//$t1->addStuff("Bobo",89);
$t2 = new Database();
$t2->name = "Bosse";
$t2->age = 3;
$t2->save();

//$t2->apa = "apa";
$t2->name = "fisk";

var_dump($t2);
//$t1->homicide(5);
//$t1->getOne(2);