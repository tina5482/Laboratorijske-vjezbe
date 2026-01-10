<?php
require_once "db.php";

$proizvodID = $_POST["proizvodID"] ?? "";
$nazivPro   = trim($_POST["nazivPro"] ?? "");
$kolicina   = $_POST["kolicina"] ?? "";
$cijena     = $_POST["cijena"] ?? "";

if (!ctype_digit($proizvodID) || $nazivPro === "" || !is_numeric($kolicina) || !is_numeric($cijena)) {
    die("Neispravan unos!");
}

$proizvodID = (int)$proizvodID;
$kolicina   = (int)$kolicina;
$cijena     = (float)$cijena;

$stmt = $db->prepare("
    UPDATE Proizvod
    SET nazivPro = ?, kolicina = ?, cijena = ?
    WHERE proizvodID = ?
");
$stmt->execute([$nazivPro, $kolicina, $cijena, $proizvodID]);

header("Location: admin.php");
exit;
