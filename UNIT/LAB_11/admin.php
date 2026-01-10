<?php
require_once "db.php";
$db->exec("USE Prodaja");

$upit = $db->query("
    SELECT proizvodID, nazivPro, kolicina, cijena,
           (kolicina * cijena) AS vrijednost
    FROM Proizvod
");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
</head>

<body>

    <div style="text-align: center;">
        <h3>Baza proizvoda</h3>

        <table border="1" cellpadding="2" cellspacing="2"
            style="width:60%; margin-left:auto; margin-right:auto;">
            <tr>
                <th>Naziv proizvoda</th>
                <th>Količina</th>
                <th>Cijena</th>
                <th>Vrijednost robe</th>
                <th>Uredi</th>
            </tr>

            <?php
            foreach ($upit as $red) {
                echo "<tr>";
                echo "<td>{$red['nazivPro']}</td>";
                echo "<td>{$red['kolicina']}</td>";
                echo "<td>{$red['cijena']}</td>";
                echo "<td>{$red['vrijednost']}</td>";
                echo "<td><a href='proizvod.php?action=uredi&id={$red['proizvodID']}'>[UREDI]</a></td>";
                echo "</tr>";
            }
            ?>

        </table>
    </div>

</body>

</html>