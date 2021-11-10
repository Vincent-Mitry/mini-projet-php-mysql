<?php

require_once __DIR__ . '/globals.php';

$dbName = DB_NAME;
$dbHost = DB_HOST;

$dsn = "mysql:dbname=$dbName;host=$dbHost";

$pdo = new PDO($dsn, DB_USER, DB_PASSWORD, [
    PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION
]);
