<?php
//require_once "Dice.php";
require_once "AlphabeticDice.php";
$d1 = new Dice(566);
$d1->roll(2);
var_dump($d1);
var_dump($d1->getRolls());

$da = new AlphabeticDice(2);
$da->roll(1);
var_dump($da);

echo $da->roll(1);

Dice::dies();