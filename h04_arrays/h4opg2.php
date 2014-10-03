<?php
class GetalArrayGenerator {
public function getArray() {
$tab = array();
for ($i=0; $i<50; $i++) {
$Getal=$Getal+$i;
$tab[$i] = $Getal;
}
return $tab;
}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset=utf-8>
<title>array generator</title>
</head>
<body>
<pre>
<?php
$arrGen= new GetalArrayGenerator();
print_r($arrGen->getArray());
?>
</pre>
</body>
</html>