<?php
class Thermometer {
    private $aantalGraden;
    
        public function setTemp($aantal){
        $this->aantalGraden = $aantal;
    }
    
    public function verhoogTemp($aantalgraden) {
        $this->setTemp($this->aantalGraden+$aantalgraden);
        if ($this->aantalGraden<100 and $this->aantalGraden>-50) {
            return $this->aantalGraden; 
        }
        else{
            $this->setTemp($this->aantalGraden-$aantalgraden);
            print("error de temperatuur ligt niet meer tuseen -50° en 100°");
        }
    }
    
    public function verlaagTemp($aantalgraden){
        $this->setTemp($this->aantalGraden-$aantalgraden);
        if ($this->aantalGraden<100 and $this->aantalGraden>-50) {
            return $this->aantalGraden; 
        }
        else{
            $this->setTemp($this->aantalGraden+$aantalgraden);
            print("error de temperatuur ligt niet meer tuseen -50° en 100°");
        }
    }
}
$thermobinnen = new Thermometer();
$thermobinnen->setTemp(-49);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset=utf-8>
        <title>oefening 8.3</title>
    </head>
    <body>
        begintemperatuur :
        <?php print($thermobinnen->verhoogTemp(0));?>° 
        <br>
        verhoog temperatuur met 5°:
        <?php print($thermobinnen->verhoogTemp(5));?>° 
        <br>
        verlaag temperatuur met 7°:
        <?php print($thermobinnen->verlaagTemp(7));?>°
    </body>
</html>