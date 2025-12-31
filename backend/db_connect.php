<?php

$host = "localhost";
$db = 'Nexu';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
try {
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro ao conectar ao banco de dados" . $e->getMessage();
}
