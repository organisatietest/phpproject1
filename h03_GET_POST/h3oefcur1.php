<!DOCTYPE HTML>
<html>
<head>
<meta charset=utf-8>
<title>Gebruikersinvoer</title>
</head>
<body>
<h1>
Goeiemorgen,
<?php
print($_POST["naam"]);
?>
. Het is vandaag
<?php
print($_POST["dag"]);
?>
</h1>
</body>
</html>