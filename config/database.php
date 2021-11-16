<?php
session_start();

if(!isset($_SESSION['user_id'])){
    // Test pour les urls 'product'
    if(strpos($_SERVER['REQUEST_URI'], 'product') !== false){
        header("Location:/divers/mini-projet-php-mysql/src/user/login.php");
        exit();
    }
}

require_once __DIR__ . '/globals.php';

$dbName = DB_NAME;
$dbHost = DB_HOST;

$dsn = "mysql:dbname=$dbName;host=$dbHost";

$pdo = new PDO($dsn, DB_USER, DB_PASSWORD, [
    PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION
]);
