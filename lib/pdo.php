<?php 

//do not forget to include config.php wherever you include pdo.php

//data source name
$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME ;

$options = 
[
    PDO:: ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO:: ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO:: ATTR_EMULATE_PREPARES => false, //let the database prepare the query
];


try
{
    $pdo = new PDO($dsn,DB_USER,DB_PASSWORD,$options);
    echo "PDO.PHP -> connected to database";
}catch(PDOException $e)
{
    die("PDO.PHP -> error" . $e->getMessage());
}

// MACHINE (ADMIN CRUD)
