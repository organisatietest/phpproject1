<?php
class Persoon {
    private  $Familienaam;
    private  $Voornaam;
    
    public function __construct($familienaam,$voornaam) {
        $this->Familienaam=$familienaam;
        $this->Voornaam=$voornaam;
    }

    public function getVollNaam(){
        return ("$this->Familienaam, $this->Voornaam") ;
    }
}
class Cursist extends Persoon {
    private $aantalCursussen;
    
    public function __construct($familienaam,$voornaam,$aantalcursussen) {
        parent::__construct($familienaam,$voornaam);
        $this->aantalCursussen=$aantalcursussen;
    }
    
    public function getAantalCursussen() {
        return ($this->aantalCursussen);
    }
}
class Medewerker extends Persoon {
    private $aantalCursisten;
    
    public function __construct($familienaam,$voornaam,$aantalcursisten) {
        parent::__construct($familienaam,$voornaam);
        $this->aantalCursisten=$aantalcursisten;
    }
    
    public function getAantalCursisten(){
        return ($this->aantalCursisten);
    }
}
$cursist = new Cursist("Peeters", "Jan", 3);
$medewerker = new Medewerker("Janssens", "Tom", 8);
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset=utf-8>
<title>Cursisten en medewerkers</title>
</head>
<body>
<h1>Namen</h1>
<ul>
<li><?php print($cursist->getVollNaam() . " volgt " .
$cursist->getAantalCursussen() . " cursus(sen)");?></li>
<li><?php print($medewerker->getVollNaam() . " begeleidt " .
$medewerker->getAantalCursisten() .
" cursist(en)");?></li>
</ul>
</body>
</html>