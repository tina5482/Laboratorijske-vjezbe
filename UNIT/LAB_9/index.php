<?php

class artikl
{
    public $naziv;
    public $proizvodac;

    function __construct($proizvodac)
    {
        $this->proizvodac = $proizvodac;
    }

    function __destruct()
    {
        echo "Uništavam objekt... <br>";
    }
}

// dva objekta
$a1 = new artikl("Sony");
$a1->naziv = "TV";

$a2 = new artikl("LG");
$a2->naziv = "Monitor";

// ispis
echo $a1->naziv . " - " . $a1->proizvodac . "<br>";
echo $a2->naziv . " - " . $a2->proizvodac . "<br>";
?>
<br><br>
<?php

class pijetao
{
    public $ime;
    protected $boja = "crveno-smeđa";
    private $glavni = "ne";

    public function pjevaj()
    {
        echo "kukurikuuuu<br>";
    }
}

class pilic extends pijetao
{
    public $ZnakHoroskopa = "Bik";
    protected $boja = "žuta"; // pregazi boju

    public function pjevaj()
    { // pregazi funkciju
        echo "pijuuuuuu<br>";
    }
}

// objekti
$p1 = new pijetao();
$p1->ime = "Riki";

$p2 = new pilic();
$p2->ime = "Mali";

// ispis
echo $p1->ime . "<br>";
echo $p2->ime . "<br>";

// greške:
# echo $p1->boja;       // GREŠKA - boja je protected
# echo $p1->glavni;     // GREŠKA - glavni je private
# echo $p2->glavni;     // GREŠKA - private se ne nasljeđuje

echo $p2->ZnakHoroskopa . "<br>";

$p1->pjevaj(); // kukurikuuuu
$p2->pjevaj(); // pijuuuuuu
?>

<br><br>

<?php

class artikll
{
    public $naziv;
    public $kolicina;
    public $cijena;

    public function RacunajVrijednost()
    {
        return $this->cijena * $this->kolicina;
    }

    public function AzurirajKolicinu($kol)
    {
        $this->kolicina += $kol;
        echo "Nova količina: " . $this->kolicina . "<br>";
    }
}

// objekt
$a = new artikll();
$a->naziv = "Laptop";
$a->kolicina = 10;
$a->cijena = 800;

// ispis vrijednosti
echo "Vrijednost artikla: " . $a->RacunajVrijednost() . "<br>";

// forma
if (isset($_POST["kol"])) {
    $a->AzurirajKolicinu($_POST["kol"]);
}
?>

<form method="post">
    Promjena količine: <input type="number" name="kol">
    <button>Pošalji</button>
</form>
?>

<br><br>

<?php

class artiklll
{
    public $naziv;
    public $kolicina;
    public $cijena;

    private $popust; // dodan privatni član

    // magic set
    public function __set($name, $value)
    {
        if ($name == "popust") {
            if ($value > 50) {
                echo "Popust prevelik! Postavljam na 0.<br>";
                $this->popust = 0;
            } else {
                $this->popust = $value;
            }
        }
    }

    // magic get
    public function __get($name)
    {
        if ($name == "popust") {
            return $this->popust;
        }
    }

    public function VrijednostBezPopusta()
    {
        return $this->cijena * $this->kolicina;
    }

    public function VrijednostSPopustom()
    {
        return $this->VrijednostBezPopusta() * (1 - $this->popust / 100);
    }
}

// objekt
$a = new artiklll();
$a->naziv = "Tipkovnica";
$a->kolicina = 5;
$a->cijena = 100;

// korisnički unos
if (isset($_POST["popust"])) {
    $a->popust = $_POST["popust"];

    echo "Bez popusta: " . $a->VrijednostBezPopusta() . "<br>";
    echo "S popustom: " . $a->VrijednostSPopustom() . "<br>";
}
?>

<form method="post">
    Popust (%): <input type="number" name="popust">
    <button>Pošalji</button>
</form>