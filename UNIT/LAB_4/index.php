<html>

<body>
    <form method="post">
        Unesi prvi broj: <input type="text" name="a"><br>
        Unesi drugi broj: <input type="text" name="b"><br>
        <input type="submit" value="Zamijeni">
    </form>

    <?php
    function zamijeni(&$a, &$b)
    {  // verzija s referencom
        $temp = $a;
        $a = $b;
        $b = $temp;
    }

    if (!empty($_POST['a']) && !empty($_POST['b'])) {
        $a = $_POST['a'];
        $b = $_POST['b'];

        echo "Prije poziva funkcije: a = $a, b = $b<br>";

        zamijeni($a, $b);  // zamjena

        echo "Nakon poziva funkcije: a = $a, b = $b<br>";
    }
    ?>
</body>

</html>

<br>

<html>

<body>
    <form method="post">
        Brzina (m/s): <input type="text" name="brzina"><br>
        Vrijeme (s): <input type="text" name="vrijeme"><br>
        <input type="submit" value="Izračunaj put">
    </form>

    <?php
    function izracunajPut($vrijeme, $brzina = 344)
    {
        return $brzina * $vrijeme;
    }

    if (!empty($_POST['vrijeme'])) {
        $vrijeme = $_POST['vrijeme'];
        $brzina = $_POST['brzina'];

        if (empty($brzina))
            $put = izracunajPut($vrijeme);        // koristi default brzinu
        else
            $put = izracunajPut($vrijeme, $brzina); // koristi unesenu

        echo "Prijeđeni put zvuka je: $put metara";
    }
    ?>
</body>

</html>

<br>
<br>

<html>

<body>
    <form method="post">
        Unesi broj: <input type="text" name="broj"><br>
        <input type="submit" value="Izračunaj prosjek">
    </form>

    <?php
    function prosjek()
    {
        $zbroj = 0;
        for ($i = 0; $i < func_num_args(); $i++) {
            $zbroj += func_get_arg($i);
        }
        return $zbroj / func_num_args();
    }

    if (!empty($_POST['broj'])) {
        $n = $_POST['broj'];

        $p1 = prosjek(5, 14, 25, 67, 10, $n);
        $p2 = prosjek(50, 70, 90, $n);

        echo "Prosjek s brovjevima 5, 14, 25, 67, 10 i br: $p1<br>";
        echo "Prosjek s brojevima 50, 70, 90 i br: $p2<br>";
    }
    ?>
</body>

</html>

<br>

<html>

<body>
    <form method="post">
        Unesi prvi broj: <input type="text" name="a"><br>
        Unesi drugi broj: <input type="text" name="b"><br>
        <input type="submit" value="Izračunaj NajZajDjel">
    </form>

    <?php
    function nzd($a, $b)
    {
        $min = ($a < $b) ? $a : $b;
        for ($i = $min; $i >= 1; $i--) {
            if ($a % $i == 0 && $b % $i == 0)
                return $i;
        }
    }

    if (!empty($_POST['a']) && !empty($_POST['b'])) {
        $a = $_POST['a'];
        $b = $_POST['b'];
        $rezultat = nzd($a, $b);
        echo "Najveći zajednički djelitelj brojeva $a i $b je: $rezultat";
    }
    ?>
</body>

</html>