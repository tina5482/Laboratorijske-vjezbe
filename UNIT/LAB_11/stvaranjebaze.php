<?php
require_once "db.php";

try {
    $db->exec("CREATE DATABASE IF NOT EXISTS Prodaja CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");
    $db->exec("USE Prodaja");

    $db->exec("
        CREATE TABLE IF NOT EXISTS Dobavljac (
            dobavljacID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
            nazivDob VARCHAR(60) NOT NULL,
            adresa VARCHAR(70) NOT NULL,
            telefon VARCHAR(20) NOT NULL,
            PRIMARY KEY (dobavljacID)
        ) ENGINE=MyISAM
    ");

    $db->exec("
        CREATE TABLE IF NOT EXISTS Kategorija (
            kategorijaID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
            nazivKat VARCHAR(30) NOT NULL,
            PRIMARY KEY (kategorijaID)
        ) ENGINE=MyISAM
    ");

    $db->exec("
        CREATE TABLE IF NOT EXISTS Proizvod (
            proizvodID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
            nazivPro VARCHAR(40) NOT NULL,
            cijena DECIMAL(7,2) NOT NULL,
            kolicina SMALLINT NOT NULL DEFAULT 0,
            dobavljacID INTEGER UNSIGNED,
            kategorijaID INTEGER UNSIGNED,
            PRIMARY KEY (proizvodID)
        ) ENGINE=MyISAM
    ");

    $db->exec("
        CREATE TABLE IF NOT EXISTS Narudzba (
            narudzbaID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
            datumNar DATE NOT NULL,
            PRIMARY KEY (narudzbaID)
        ) ENGINE=MyISAM
    ");

    echo "OK – baza i tablice su kreirane.";
} catch (PDOException $e) {
    echo "Greška: " . $e->getMessage();
}
