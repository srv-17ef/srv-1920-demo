<?php
require __DIR__ . "/db.php";
$users = findAllUsers();
require __DIR__ . "/views/index.view.php";