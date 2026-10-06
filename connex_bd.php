<?php 
if ($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == '127.0.0.1') {
    $host     = "localhost";
    $dbname   = "projet";
    $user     = "root";
    $password = "";
} else {
    $host     = "sql211.infinityfree.com";
    $dbname   = "if0_43097375_projet";
    $user     = "if0_43097375";
    $password = "STiyitaIrnvxNA";
}

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>