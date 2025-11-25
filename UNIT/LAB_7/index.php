<?php
if (isset($_POST["brojevi"])) {

    $niz = explode(",", $_POST["brojevi"]);

    $parni = [];
    $neparni = [];

    foreach ($niz as $n) {
        $n = trim($n);
        if (is_numeric($n)) {
            if ($n % 2 == 0) $parni[] = $n;
            else $neparni[] = $n;
        }
    }

    echo "Parni: " . implode(", ", $parni) . "<br>";
    echo "Neparni: " . implode(", ", $neparni);
}
?>
<form method="post">
    <input type="text" name="brojevi" placeholder="npr. 1,2,3,4,5">
    <button>Klik tu</button>
</form>




<?php
if (isset($_POST["ime"]) && isset($_POST["prezime"])) {

    $ime = trim($_POST["ime"]);
    $prezime = trim($_POST["prezime"]);

    echo strtolower("$ime $prezime") . "<br>";
    echo strtoupper("$ime $prezime") . "<br>";
    echo ucwords(strtolower("$ime $prezime")) . "<br>";

    $inic = strtoupper($ime[0]) . "." . strtoupper($prezime[0]) . ".";
    echo $inic;
}
?>

<form method="post">
    <input type="text" name="ime" placeholder="Ime">
    <input type="text" name="prezime" placeholder="Prezime">
    <button>Klik tu</button>
</form>



<?php
if (isset($_POST["tekst"]) && isset($_POST["br"])) {

    $t = $_POST["tekst"];
    $broj = (int)$_POST["br"];

    if ($t == strrev($t)) echo "Palindrom<br>";
    else echo "Nije palindrom<br>";

    for ($i = 0; $i < $broj; $i++) {
        echo $t . " ";
    }
}
?>

<form method="post">
    <input type="text" name="tekst" placeholder="niz">
    <input type="number" name="br" placeholder="broj">
    <button>Klik tu</button>
</form>




<?php
if (isset($_POST["org"])) {

    $org = $_POST["org"];
    $novi = $_POST["novi"];
    $poz = (int)$_POST["poz"];
    $duz = (int)$_POST["duz"];

    echo substr_replace($org, $novi, $poz, $duz);
}
?>

<form method="post">
    <input type="text" name="org" placeholder="origigi niz znakova">
    <input type="text" name="novi" placeholder="novi niz znakova">
    <input type="number" name="poz" placeholder="pozicija gdje mjenjam">
    <input type="number" name="duz" placeholder="za koliko znakova">
    <button>Klik tu</button>
</form>




<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap u PHP-u</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        body {
            background-color: #f5f5f5;
        }

        .forma-box {
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
            width: 100%;
        }

        h1 {
            color: #007bff;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1 class="mt-4 mb-3">Ovo je bootstrap stranica</h1>
        <p>Ovo je neki paragraf.</p>

        <div class="forma-box">

            <h4>Unesite podatke</h4>

            <form>
                <div class="form-group">
                    <label>Tekst 1</label>
                    <input type="text" class="form-control" placeholder="Unesite nešto">
                </div>

                <div class="form-group">
                    <label>Tekst 2</label>
                    <input type="text" class="form-control" placeholder="Unesite još nešto">
                </div>

                <button type="submit" class="btn btn-custom">Pošalji</button>
            </form>

        </div>

    </div>

</body>

</html>