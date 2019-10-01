<?php

// Skapa anslutningssträng, dsn
// anger man ett filnamn för sqlite som inte existerar så skapas filen
$dsn = "sqlite:demo.sqlite";

// försök ansluta till databasen
try {
    $db = new PDO($dsn);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) { // fånga upp fel och skriv ut
    echo $e->errorInfo;
    exit();
}

// förbered och kör en SQL-fråga
$stmt = $db->prepare("SELECT * FROM teachers");
$stmt->execute();

// hämta resultatet från frågan
$results = $stmt->fetchAll();
var_dump($results);

