<?php
class NegatieveStortingException extends Exception {
}
class RekeningVolException extends Exception {
}
class TeGrootBedragException extends Exception{
}
class Rekening {
private $saldo;
public function __construct() {
$this->saldo = 0;
}
public function storten($bedrag) {
if ($bedrag < 0) throw new NegatieveStortingException();
if ($this->saldo + $bedrag > 1000) throw new RekeningVolException();
if ($bedrag > 500) throw new TeGrootBedragException();
$this->saldo += $bedrag;
}
public function getSaldo() {
return $this->saldo;
}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset=utf-8>
<title>Test exception</title>
</head>
<body>
<?php
$rek = new Rekening();
try {
print("<p>Saldo: " . $rek->getSaldo() . " &euro;</p>");
$rek->storten(200);
$rek->storten(100);
$rek->storten(501);
print("<p>Saldo: " . $rek->getSaldo() . " &euro;</p>");
} catch (NegatieveStortingException $ex) {
print("<p>Een negatief bedrag storten is niet mogelijk!</p>");
} catch (RekeningVolException $ex) {
print("<p>Dit bedrag kan niet gestort worden, de limiet
van de rekening is 1000 &euro;!</p>");
} catch (TeGrootBedragException $ex) {
print("<p>dit bedrag kan niet gestort worden, de limiet van het bedrag is 500 euro");   
}
?>
</body>
</html>