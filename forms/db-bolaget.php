<?php


/**
 * Koppla ihop php med databas via PDO
 * @return PDO kopplingen till databasen
 */
function connect()
{
    try {
        $dsn = "sqlite:" . __DIR__ . "/systembolaget.sqlite";

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
 * @param string $query
 * @return bool success
 */
function runQuery(string $query)
{
    $db = connect();
    $stmt = $db->prepare($query);
    return $stmt->execute();
}

/**
 * Hämta enskild rad data
 * @param string $query
 * @return mixed result assoc array
 */
function fetch(string $query)
{
    $db = connect();
// förbered och kör en SQL-fråga
    $stmt = $db->prepare($query);
    $stmt->execute();
    // hämta resultatet från frågan
    return $stmt->fetch();

}

/**
 * Hämta flera rader data
 * @param string $query
 * @return mixed 2d result assoc array
 */
function fetchAll(string $query)
{
    $db = connect();
    $stmt = $db->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();
}


/**
 * @param $options
 * @return mixed
 */
function all($options)
{
    $allowed = [
        "sortby" => ['namn', 'volym'],
        "ursprungsland" => ['Sverige']
    ];

    $query = "SELECT * FROM beverages WHERE 1";
    if ($options["ursprungsland"] ?? null) {
        $query .= " AND ursprungsland='" . $options["ursprungsland"] . "'";
    }

    if (in_array($options["sortby"] ?? null, $allowed["sortby"])) {
        $query .= " ORDER BY " . $options["sortby"];
    }
//    if($options["sortby"] ?? null) {
//        if(in_array($options["sortby"], $allowed["sortby"])){
//            $query .= " ORDER BY " . $options["sortby"];
//        }
//    }
    return fetchAll($query);
}


/**
 * Hämta x, [sorting]
 * @param array $options
 * @return mixed
 */
function x(array $options)
{
    $query = "SELECT * FROM beverages WHERE 1 ";
    $allowed = [
        "sorting" => ["namn", "ursprungsland"]
    ];
//    Kontrollera sorteringsordning
    if ($options["sorting"] ?? null) {
        if (in_array($options["sorting"], $allowed["sorting"])) {
            $query .= "ORDER BY " . $options["sorting"];
        }
    }
    return fetchAll($query);
}


/**
 * Lägg till ny dryck
 * @param array $data
 * @return bool
 */
function storeDrink(array $data): bool
{
    $result = fetch("SELECT MAX(id) FROM beverages");
    $id = $result['MAX(id)']+1;

    $alkoholhalt = $data['alkoholhalt'] ?? null;
    $namn = $data['namn'] ?? null;
    $query = "INSERT INTO beverages VALUES ($id, $alkoholhalt, null, null, null, '$namn', null, null, null, null, null, null);";
    $success = runQuery($query);
    return $success;
}



/**
 * Hämta alla användare
 * @return mixed 2d assoc array
 */
function findAllUsers()
{
    $query = "SELECT * FROM teachers";
    return fetchAll($query);
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
 * @return mixed
 */
function findUserByName(string $name)
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

/**
 * Droppa en tabell
 * @param string $table
 * @return bool
 */
function drop(string $table)
{
    $query = "DROP TABLE IF EXISTS $table;";
    return runQuery($query);
}

/**
 *  Create tables
 */
function createTables()
{
    $query =
        "CREATE TABLE beverages(
            id       INTEGER primary key autoincrement,
            alkoholhalt     varchar(255),
            forpackning  varchar(255),
            kategori varchar(255),
            leverantor varchar(255),
            namn varchar(255),
            pris INTEGER,
            prisPerLiter REAL,
            producent varchar(255),
            ursprungsland varchar(255),
            varugrupp varchar(255),
            volym INTEGER
        );";
    $migrated = runQuery($query);
    if ($migrated) {
        echo "Tables were migrated successfully.";
    } else {
        echo "Something did not go according to plan. Tables are not migrated.";
    }
}

/**
 * Seed tables with dummy data
 */
function seed()
{
    $data = file_get_contents("systembolaget.json");
    $beverages = json_decode($data);
//    var_dump($beverages);
    foreach ($beverages as $b) {
        $query =
            "INSERT INTO beverages
         VALUES (
                 $b->id, 
                 '$b->alkoholhalt', 
                 '$b->forpackning',
                 '$b->kategori',
                 '$b->leverantor',
                 '$b->namn',
                 $b->pris,
                 $b->prisPerLiter,
                 '$b->producent',
                 '$b->ursprungsland',
                 '$b->varugrupp',
                 $b->volym
        )";
//        var_dump($query);
        echo "$b->id<br>";
        $seeded = runQuery($query);
    }

//    if ($seeded) {
//        echo "Tables were seeded successfully.";
//    } else {
//        echo "Something did not go according to plan. Tables are not seeded.";
//    }
}

/**
 * Migrate tables and seed data
 */
function migrate()
{
    drop("teachers");
    createTables();
    seed();
}

/**
 * Lägg till en användare
 * @param string $name
 * @param string $username
 * @param int $ranking
 * @param string $clan
 * @return bool success
 */
function store(string $name, string $username, int $ranking = 100, string $clan = 'Clanless'): bool
{
    $query = "INSERT INTO teachers VALUES (null, $name, $username, $ranking, $clan);";
    $success = runQuery($query);
    return $success;
}

/**
 * Uppdatera användardata
 * @param int $id
 * @param string $name
 * @param string $username
 * @param int $ranking
 * @param string $clan
 * @return bool success
 */
function update(int $id, string $name, string $username, int $ranking, string $clan): bool
{
    $query = "UPDATE teachers SET name='$name', username='$username', ranking='$ranking', clan='$clan' WHERE id=$id;";
    $success = runQuery($query);
    return $success;
}


/**
 * Ta bort en användare
 * @param int $id
 * @return bool
 */
function destroy(int $id): bool
{
    $query = "DELETE FROM teachers WHERE id=$id;";
    $success = runQuery($query);
    return $success;
}