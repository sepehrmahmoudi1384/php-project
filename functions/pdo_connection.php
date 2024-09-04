<?php

$serverName = 'localhost';
$userName = 'root';
$password = '';
$dbName = 'php_project';
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
);

global $connection;

try {
    $connection = new PDO(
        "mysql:host=$serverName;dbname=$dbName",
        $userName,
        $password,
        $options);

    return $connection;
} catch (PDOException $e) {
    die('error: ' . $e->getMessage());
}