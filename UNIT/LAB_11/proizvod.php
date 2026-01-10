<?php
require_once "db.php";

$action = $_GET["action"] ?? "";
$id = $_GET["id"] ?? "";

if ($action !== "uredi" || !ctype_digit($id)) {
    die("Pogresan poziv stranice.");
}

$id = (int)$id;

// dohvat proizvoda po ID-u
$stmt = $db->prepare("SELECT * FROM Proizvod WHERE proizvodID = ?");
$stmt->execute([$id]);
$proizvod = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$proizvod) {
    die("Proizvod ne postoji.");
}
?>
<!doctype html>
<html lang="hr">

<head>
    <meta charset="utf-8">
    <title>Uredi proizvod</title>
</head>

<body>

    <h3>Uredi proizvod</h3>

    <form action="potvrdi.php" method="post">
        <input type="hidden" name="proizvodID" value="<?= $proizvod["proizvodID"] ?>">

        <p>
            Naziv proizvoda:
            <input type="text" name="nazivPro" value="<?= htmlspecialchars($proizvod["nazivPro"]) ?>" required>
        </p>

        <p>
            Količina:
            <input type="number" name="kolicina" value="<?= (int)$proizvod["kolicina"] ?>" required>
        </p>

        <p>
            Cijena:
            <input type="number" step="0.01" name="cijena" value="<?= (float)$proizvod["cijena"] ?>" required>
        </p>

        <button type="submit">Spremi</button>
    </form>

    <p><a href="admin.php">Nazad</a></p>

</body>

</html>