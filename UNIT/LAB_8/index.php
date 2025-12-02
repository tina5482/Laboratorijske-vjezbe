<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Zadatak 1</title>
</head>

<body>

    <form method="post">
        Ime: <input type="text" name="ime"><br>
        Prezime: <input type="text" name="prezime"><br>
        Godine: <input type="number" name="godine"><br>
        <button type="submit">Pošalji</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $podaci = [
            $_POST['ime'] ?? '',
            $_POST['prezime'] ?? '',
            $_POST['godine'] ?? ''
        ];

        // CSV string
        $csv = implode(',', $podaci);

        // Ispis traženi u zadatku
        var_dump($csv);
    }
    ?>

</body>

</html>

<br>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Zadatak 2</title>
</head>

<body>

    <form method="post">
        Web adresa: <input type="text" name="url" placeholder="npr. www.vsite.hr">
        <button type="submit">Dohvati linkove</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $url = trim($_POST['url'] ?? '');


        if (!preg_match('/^https?:\/\//i', $url)) {
            $url = 'http://' . $url;
        }

        echo "<p>Korišteni URL: " . htmlspecialchars($url) . "</p>";

        // Dohvati HTML
        $html = @file_get_contents($url);

        if ($html === false) {
            echo "<p>Ne mogu dohvatiti sadržaj stranice.</p>";
        } else {
            // Regex za linkove (href="...") po uputama
            $pattern = '/<a\s+href=[\'"](.+?)[\'"][^>]*>/i';

            if (preg_match_all($pattern, $html, $matches)) {
                echo "<h3>Pronađeni linkovi:</h3>";
                // $matches[1] sadrži URL-ove iz href-a
                for ($i = 0; $i < count($matches[1]); $i++) {
                    echo htmlspecialchars($matches[1][$i]) . "<br>";
                }
            } else {
                echo "<p>Nema pronađenih linkova.</p>";
            }
        }
    }
    ?>

</body>

</html>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Zadatak 3</title>
</head>

<body>

    <form method="post">
        Ime i prezime: <input type="text" name="imeprezime" placeholder="Marko Marković"><br>
        Datum rođenja: <input type="text" name="datum" placeholder="1.5.1999."><br>
        Telefon: <input type="text" name="telefon" placeholder="091 123 4567"><br>
        E-mail: <input type="text" name="email" placeholder="netko@example.com"><br>
        <button type="submit">Provjeri</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $imeprezime = $_POST['imeprezime'] ?? '';
        $datum      = $_POST['datum'] ?? '';
        $telefon    = $_POST['telefon'] ?? '';
        $email      = $_POST['email'] ?? '';


        $imeOk = preg_match('/^[A-Za-z]+(\s+[A-Za-z]+)+$/', $imeprezime);


        $datumOk = preg_match('/^[0-3]?\d\.[0-1]?\d\.\d{4}\.$/', $datum);

        $telefonOk = preg_match('/^0\d{1,2}\s\d{3}\s\d{3,4}$/', $telefon);

        $emailOk = preg_match('/^[\w\.-]+@[\w\.-]+\.\w{2,}$/', $email);

        echo "<h3>Rezultat provjere:</h3>";

        echo "Ime i prezime: " . ($imeOk ? "OK" : "NEISPRAVNO") . "<br>";
        echo "Datum rođenja: " . ($datumOk ? "OK" : "NEISPRAVNO") . "<br>";
        echo "Telefon: " . ($telefonOk ? "OK" : "NEISPRAVNO") . "<br>";
        echo "E-mail: " . ($emailOk ? "OK" : "NEISPRAVNO") . "<br>";
    }
    ?>

</body>

</html>

<?php
$tekst = "Porast broja noćenja od 50% očekujemo u drugoj polovici 2017. godine. 
Iduća 2018. godina bit će povijesno najveća po porastu BDP-a. 
Od 2013. godine na drveću će rasti euri koje ćete samo trebati pobrati i odnijeti u banku. 
Kao Švicarska bit ćemo bogati u 2010. godini.";

// Zamijeni sve četveroznamenkaste godine s 2020
$noviTekst = preg_replace('/\d{4}/', '2020', $tekst);

echo "<p>$noviTekst</p>";
