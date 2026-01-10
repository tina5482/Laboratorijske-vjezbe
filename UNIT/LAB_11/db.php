<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$HOST = "localhost";
$PORT = "3306";   // ako ne radi, promijeni u 3307
$USER = "root";
$PASS = "1234";

try {
    $db = new PDO("mysql:host=$HOST;port=$PORT;dbname=Prodaja;charset=utf8mb4", $USER, $PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Greška spajanja na MySQL: " . $e->getMessage());
}
