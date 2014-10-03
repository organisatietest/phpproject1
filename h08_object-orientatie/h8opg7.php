<?php
abstract class Rekening {
    private $rekeningNummer;
    protected $saldo;


    public function __construct($rekeningnummer) {
        $this->rekeningNummer=$rekeningnummer;
        $this->saldo=0;
    }
    
    public function stort($bedrag){
        $this->saldo=  $this->saldo+$bedrag;
    }
    
    abstract public function voerIntrestDoor();
     
    public function getSaldo(){
        return( $this->saldo);
    }
}
class Zichtrekening extends Rekening{
    private static $intrest=0.025;
    public function voerIntrestDoor() {
        $this->saldo=  $this->saldo + ($this->saldo * self::$intrest);
    }
}
class Spaarrekening extends Rekening{
    private static $intrest=0.03;
    public function voerIntrestDoor() {
        $this->saldo=  $this->saldo + ($this->saldo * self::$intrest);
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset=utf-8>
<title>Rekeningnummers</title>
</head>
<body>
<h1>
<?php
$spaarrek = new Spaarrekening("091-0122401-16");
print("Het saldo is: " .$spaarrek->getSaldo() . "<br>");
$spaarrek->stort(200);
print("Het saldo is: " .$spaarrek->getSaldo() . "<br>");
$spaarrek->voerIntrestDoor();
print("Het saldo is: " .$spaarrek->getSaldo() . "<br>");
$zichtrek = new Zichtrekening("091-0122401-18");
print("Het saldo is: " .$zichtrek->getSaldo() . "<br>");
$zichtrek->stort(200);
print("Het saldo is: " .$zichtrek->getSaldo() . "<br>");
$zichtrek->voerIntrestDoor();
print("Het saldo is: " .$zichtrek->getSaldo() . "<br>");
?>
</h1>
</body>
</html>