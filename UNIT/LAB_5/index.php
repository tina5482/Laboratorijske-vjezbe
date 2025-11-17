<p>ZAD1</p>
<?php
$niz = [];
for ($i = 0; $i < 20; $i++) {
    $niz[$i] = $i * 5;
}

echo "Suma: " . array_sum($niz) . "<br>";
echo "Broj elemenata: " . count($niz) . "<br>";


unset($niz[9]);

echo "Broj elemenata nakon unset: " . count($niz) . "<br>";


$niz[] = 999;

// ispis 
foreach ($niz as $element) {
    echo $element . "<br>";
}
?>

<br></br>
<p>ZAD2</p>
<?php
$niz = [3, 15, 24, 8, 64, 44];

$prosjek = array_sum($niz) / count($niz);
$min = min($niz);
$max = max($niz);

echo "Prosjek: $prosjek<br>";
echo "Min: $min<br>";
echo "Max: $max<br>";
?>

<br></br>
<p>ZAD3</p>
<?php
$drzave = [
    "Hrvatska" => "Zagreb",
    "Slovenija" => "Ljubljana",
    "Italija" => "Rim",
    "Njemačka" => "Berlin",
    "Austrija" => "Beč"
];

$drzave["Španjolska"] = "Madrid";

foreach ($drzave as $drzava => $grad) {
    echo "$drzava – $grad<br>";
}
?>

<br></br>
<p>ZAD4</p>
<?php
$drzave = [
    "Hrvatska" => "Zagreb",
    "Slovenija" => "Ljubljana",
    "Italija" => "Rim",
    "Njemačka" => "Berlin",
    "Austrija" => "Beč"
];

$keys = array_keys($drzave);
$values = array_values($drzave);

print_r($keys);
echo "<br>";
print_r($values);
?>

<br></br>
<p>ZAD5</p>
<?php
$prvi = ["jabuka", "kruška", "ananas", "kivi", "jagoda"];
$drugi = ["jagoda", "šljiva", "malina"];
$treci = ["jagoda", "jabuka", "kupina", "mango"];

// unija 
$unija = array_unique(array_merge($prvi, $drugi));

// razlika 
$razl = array_diff($prvi, $drugi, $treci);

// presjek 
$pres = array_intersect($prvi, $drugi);

print_r($unija);
echo "<br>";
print_r($razl);
echo "<br>";
print_r($pres);
?>