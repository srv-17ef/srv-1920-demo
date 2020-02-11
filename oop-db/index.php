<?php
require_once 'Person.php';

$db = new Database();

//$sql = "INSERT INTO persons VALUES(null,'Kalle')";
//$db->runQuery($sql);


$p1 = new Person();
$p1->name = "Lola";
//$p1->save();
//var_dump($p1);

$p2 = new Person("Gudrun");
//$p2->save();
//var_dump($p2);

$p3 = new Person();
//$p3->find(2);
//var_dump($p3);
$p3->name = "Yams";
$p3->age = 78;
$p3->save();
var_dump($p3);
$p3->age = 38;
$p3->save();
//var_dump($p3);

//$tmp = $db->fetch("select * from persons");
//echo $tmp->name;
//echo $tmp["name"];
//var_dump($tmp);
