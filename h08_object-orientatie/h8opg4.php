<?php
class Persoon {
    private  $Familienaam;
    private  $Voornaam;
    
    public function setFamilienaam($familienaam) {
        $this->Familienaam=$familienaam;
    }

    public function setVoornaam($voornaam){
        $this->Voornaam=$voornaam;
    }
    public function getVollNaam(){
        return ("$this->Familienaam, $this->Voornaam") ;
    }
}
class Cursist extends Persoon {
    private $aantalCursussen;
}
class Medewerker extends Persoon {
    private $aantalCursisten;
}
$cursist = new Cursist();
$medewerker = new Medewerker();
$cursist->setFamilienaam("Peeters");
$cursist->setVoornaam("Jan");
$medewerker->setFamilienaam("Janssens");
$medewerker->setVoornaam("Tom");
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Cursisten en medewerkers</title>
</head>
<body>
<h1>Namen</h1>
<ul>
<li><?php print($cursist->getVollNaam());?></li>
<li><?php print($medewerker->getVollNaam());?></li>
</ul>
</body>
</html>