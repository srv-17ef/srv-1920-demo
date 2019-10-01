<?php


/**
 * Koppla ihop php med databas via PDO
 * @return PDO kopplingen till databasen
 */
function connect()
{
    try {
        $dsn = "sqlite:" . __DIR__ . "/blog.sqlite";

        $db = new PDO($dsn);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $db;
    } catch (PDOException $e) { // fånga upp fel och skriv ut
        echo $e->errorInfo;
        exit();
    }
}


/**
 *  Kör fråga som ej returnerar data
 * @param $query
 * @return bool success
 */
function runQuery($query)
{

    $db = connect();
    $stmt = $db->prepare("SELECT * FROM teachers");
    return $stmt->execute();
}

/**
 * Hämta enskild rad data
 * @param $query
 * @return mixed result assoc array
 */
function fetch($query)
{
    $db = connect();
// förbered och kör en SQL-fråga
    $stmt = $db->prepare("SELECT * FROM teachers");
    $stmt->execute();
    // hämta resultatet från frågan
    return $stmt->fetch();

}

/**
 * Hämta enskild rad data
 * @param $query
 * @return mixed 2d result assoc array
 */
function fetchAll($query)
{
    $db = connect();
// förbered och kör en SQL-fråga
    $stmt = $db->prepare("SELECT * FROM teachers");
    $stmt->execute();
    // hämta resultatet från frågan
    return $stmt->fetchAll();

}


/**
 * Hämta en användare baserad på id
 * @param int $id
 * @return mixed användare, 1d assoc array
 */
function findUserById(int $id)
{
    $query = "SELECT * FROM teachers WHERE id=$id";
    $user = fetch($query);
    return $user;
}

/**
 * Hämta användare baserat på namn
 * @param string $name
 * @param bool $exactMatch
 * @return mixed
 */
function findUserByName(string $name, bool $exactMatch)
{
    $query = "SELECT * FROM teachers WHERE='$name'";
    $user = fetch($query);
    return $user;
}

/**
 * Hämta användare baserat på sträng med wildcards runt
 * @param string $partial
 * @return mixed
 */
function findUserByPartialName(string $partial)
{
    $query = "SELECT * FROM teachers WHERE name LIKE '%$partial%'";
    $user = fetch($query);
    return $user;
}

function setupTables()
{
    $query =
        "DROP TABLE IF EXISTS teachers;
         CREATE TABLE teachers(
            id       INTEGER primary key autoincrement,
            name     varchar(255) NOT NULL,
            username varchar(255) NOT NULL,
            ranking  INTEGER      NOT NULL,
            clan     varchar(255) NOT NULL
        );";
    $migrated = runQuery($query);
    if($migrated){
        echo "Tables were migrated successfully.";
    } else {
        echo "Something did not go according to plan. Tables are not migrated.";
    }
}

function seed()
{
    $query =
        "INSERT INTO teachers
         VALUES (null, 'Henry Larsson', 'thegreath', 4, 'MaFy'),
            (null, 'Anna Ostgård', 'doomgirl', 1, 'KeBi'),
            (null, 'Jonna Gustavsson', 'godwoken', 5, 'KeBi'),
            (null, 'Elisabet Eriksson', 'izzy', 3, 'H'),
            (null, 'Frans Stål', 'lussifer', 6, 'Da'),
            (null, 'Tommy Svensson', 'quillboar', 2, 'H');
        ";
    $seeded = runQuery($query);
    if($seeded){
        echo "Tables were seeded successfully.";
    } else {
        echo "Something did not go according to plan. Tables are not seeded.";
    }
}

function migrate(){
    setupTables();
    seed();
}