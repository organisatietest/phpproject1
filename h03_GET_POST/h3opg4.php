<?php
class product {
public function getproduct($getal1,$getal2) {
$mijnGetal1 = $getal1 * $getal2;
return $mijnGetal1;
}
}
class quocient {
public function getquocient($getal3,$getal4) {
$mijnGetal2 = $getal3 / $getal4;
return $mijnGetal2;
}
}
class som {
public function getsom($getal5,$getal6) {
$mijnGetal3 = $getal5 + $getal6;
return $mijnGetal3;
}
}
class verschil {
public function getverschil($getal7,$getal8) {
$mijnGetal4 = $getal7 - $getal8;
return $mijnGetal4;
}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset=utf-8>
<title>Gebruikersinvoer</title>
</head>
<body>
<h1>
    de bewerking van,
<?php
switch ($_GET["bewerking"]) {
case "1":
    ?> het product is
    <?php 
    $product = new product();
    print($product->getproduct($_GET["getal1"],$_GET["getal2"]));
    break;
case "2":
    ?> het quocient is
    <?php 
    $quocient = new quocient();
    print($quocient->getquocient($_GET["getal1"],$_GET["getal2"]));
    break;
case "3":
    ?> de som is
    <?php 
    $product = new som();
    print($som->getsom($_GET["getal1"],$_GET["getal2"]));
    break;
case "4":
    ?> het verschil is
    <?php 
    $verschil = new verschil();
    print($verschil->getverschil($_GET["getal1"],$_GET["getal2"]));
    break;
default:
    print("bewerking is niet in de range van 1-4");
break;}
?>
</h1>
</body>
</html>