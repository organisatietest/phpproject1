<?php
class Rekening {
    private static $intrest=0.03;
    private $rekeningNummer;
    private $saldo;
    
    public function __construct($rekeningnummer) {
        $this->rekeningNummer=$rekeningnummer;
        $this->saldo=0;
    }
    
    public function stort($bedrag){
        $this->saldo=  $this->saldo+$bedrag;
    }
    
    public function voerIntrestDoor() {
        $this->saldo=  $this->saldo + ($this->saldo * self::$intrest);
    }
    
    public function getSaldo(){
        return( $this->saldo);
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
$spaarrek = new Rekening("091-0122401-16");
print("Het saldo is: " .$spaarrek->getSaldo() . "<br>");
$spaarrek->stort(200);
print("Het saldo is: " .$spaarrek->getSaldo() . "<br>");
$spaarrek->voerIntrestDoor();
print("Het saldo is: " .$spaarrek->getSaldo() . "<br>");
?>
</h1>
</body>
</html>