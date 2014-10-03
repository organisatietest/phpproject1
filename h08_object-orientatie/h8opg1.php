<?php
class Thermometer {
    private $aantalGraden;
    
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
$thermobinnen->setTemp(20);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset=utf-8>
        <title>oefening 8.1</title>
    </head>
    <body>
        begintemperatuur = 20°
        <br>
        verhoog temperatuur met 5°:
        <?php 
        print($thermobinnen->verhoogTemp(5));?>° 
        <br>
        verlaag temperatuur met 7°:
        <?php print($thermobinnen->verlaagTemp(7));?>°
    </body>
</html>