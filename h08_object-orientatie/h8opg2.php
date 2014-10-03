<?php
class Thermometer {
    private $aantalGraden;
    
    public function __construct() {
        $this->aantalGraden=25;
    }

        public function setTemp($aantal){
        $this->aantalGraden = $aantal;
    }
    
    public function verhoogTemp($aantalgraden) {
        $this->setTemp($this->aantalGraden+$aantalgraden);
        return $this->aantalGraden; 
    }
    
    public function verlaagTemp($aantalgraden){
        $this->setTemp($this->aantalGraden-$aantalgraden);
        return $this->aantalGraden;
    }
}
$thermobinnen = new Thermometer();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset=utf-8>
        <title>oefening 8.1</title>
    </head>
    <body>
        begintemperatuur = 25°:
        <?php print($thermobinnen->verhoogTemp(0));?>° 
        <br>
        verhoog temperatuur met 5°:
        <?php print($thermobinnen->verhoogTemp(5));?>° 
        <br>
        verlaag temperatuur met 7°:
        <?php print($thermobinnen->verlaagTemp(7));?>°
    </body>
</html>