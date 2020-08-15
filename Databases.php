<?php

//Datasource name that accepts information such as host (with mysql: prefix), port, charset, dbname
// key-value pairs separated by ;
$dsn = "mysql:host=127.0.0.1;port=8889;charset=utf8mb4";
$options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];

//a connection between PHP and a database server.
$pdo = new PDO($dsn, "root", "root",$options);
echo sprintf("Connected successfully to SQL server! V%s, on %s\n", $pdo->getAttribute(PDO::ATTR_SERVER_VERSION), $pdo->getAttribute(PDO::ATTR_CONNECTION_STATUS));


if($pdo->exec('CREATE SCHEMA sch')===true){
    $pdo->exec('
    CREATE table students id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(200) NULL UNIQUE
');
}

//Prepared statements are templates and look like regular SQL queries, 
//with the difference that, instead of values, they contain placeholders (:email), 
//which will be replaced with escaped values at execution time.

$statement = $pdo->prepare('INSERT INTO users (email) VALUES (?)');
$statement->execute('first@second.com'); //pass by value

$pdoStatement = $pdo->prepare('INSERT INTO users (email) VALUES (:email)');
$pdoStatement->bindParam(':email', 'first@second.com'); //pass by reference

if($pdoStatement->execute('second@second.com')===false){
    list(, , $driverMessage) = $pdoStatement->errorInfo();
}