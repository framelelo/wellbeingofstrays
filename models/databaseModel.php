<?php
global $pdo;

$host = 'localhost';
$dbName = 'wos';
$username = 'root';
$password = 'root';

// Create connection with PDO
try {
    if (!isset($pdo)) {
        $pdo = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $username, $password);
    }
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
} 

return $pdo;