<?php
require __DIR__ . "\db.php";
migrate();

runQuery("INSERT INTO teachers VALUES (null,'marko','polo',100,'KeBi');");
$allUsers = fetchAll("SELECT * FROM teachers");
$user = fetch("SELECT * FROM teachers WHERE id=4;");

// med egna funktioner
$users = findAllUsers();
$user = findUserById(4);
store('Peer','uberdude');
$peer = findUserByName('Peer');
$peer = findUserByName('ee');
