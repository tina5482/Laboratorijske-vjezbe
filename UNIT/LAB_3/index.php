<!DOCTYPE html>
<html>
<p>Zad1</p>

<body>
    <form method="post">
        Kolokvij 1: <input type="number" name="k1"><br>
        Kolokvij 2: <input type="number" name="k2"><br>
        <input type="submit" value="Provjeri">
    </form>

    <?php
    function rezultat($a, $b)
    {
        if ($a < 40 || $b < 40) return "Pad";
        elseif (($a >= 40 && $a <= 49) || ($b >= 40 && $b <= 49)) return "Ponavljanje kolokvija";
        elseif ($a >= 40 && $b >= 40 && ($a + $b) >= 100) return "Položeno";
        else return "Nedovoljno bodova za prolaz";
    }

    if (isset($_POST['k1']) && isset($_POST['k2'])) {
        echo rezultat($_POST['k1'], $_POST['k2']);
    }
    ?>
</body>

</html>

<br>
<br>
<p>Zad2</p>

<?php
$v = 50;

function Oduzmi()
{
    global $v;
    $v -= 20;
}

function Dodaj()
{
    global $v;
    $v += 60;
}

Oduzmi();
echo "Nakon Oduzmi(): $v<br>";
Dodaj();
echo "Nakon Dodaj(): $v";
?>
<br>
<?php
function Ispis()
{
    static $st = 20;
    echo $st . "<br>";
    $st++;
}

for ($i = 0; $i < 10; $i++) {
    Ispis();
}
?>

<br>
<br>

<!DOCTYPE html>
<html>
<p>Zad3</p>

<body>
    <form method="post">
        Unesi prvi broj: <input type="number" name="a"><br>
        Unesi drugi broj: <input type="number" name="b"><br>
        <input type="submit" value="Ispiši neparne">
    </form>

    <?php
    if (isset($_POST['a']) && isset($_POST['b'])) {
        $a = $_POST['a'];
        $b = $_POST['b'];
        for ($i = $a; $i <= $b; $i++) {
            if ($i % 2 != 0) echo "$i ";
        }
    }
    ?>
</body>

</html>

<br>
<br>

<!DOCTYPE html>
<html>
<p>Zad4</p>

<body>
    <form method="post">
        Unesi prvi broj: <input type="number" name="a"><br>
        Unesi drugi broj: <input type="number" name="b"><br>
        <input type="submit" value="Ispiši neparne (while)">
    </form>

    <?php
    if (isset($_POST['a']) && isset($_POST['b'])) {
        $i = $_POST['a'];
        $b = $_POST['b'];
        while ($i <= $b) {
            if ($i % 2 != 0) echo "$i ";
            $i++;
        }
    }
    ?>
</body>

</html>

<br>
<br>

<!DOCTYPE html>
<html>
<p>Zad5</p>

<body>
    <form method="post">
        Unesi broj: <input type="number" name="n"><br>
        <input type="submit" value="Pronađi djelitelje">
    </form>

    <?php
    if (isset($_POST['n'])) {
        $n = $_POST['n'];
        $i = 1;
        do {
            if ($n % $i == 0) echo "$i ";
            $i++;
        } while ($i <= $n);
    }
    ?>
</body>

</html>

<br>
<br>

<!DOCTYPE html>
<html>
<p>Zad6</p>

<body>
    <form method="post">
        Unesi broj: <input type="number" name="n"><br>
        <input type="submit" value="Provjeri prost broj">
    </form>

    <?php
    if (isset($_POST['n'])) {
        $n = $_POST['n'];
        $prost = true;

        if ($n < 2) $prost = false;
        else {
            for ($i = 2; $i <= $n / 2; $i++) {
                if ($n % $i == 0) {
                    $prost = false;
                    break;
                }
            }
        }

        echo $prost ? "Broj $n je prost." : "Broj $n nije prost.";
    }
    ?>
</body>

</html>