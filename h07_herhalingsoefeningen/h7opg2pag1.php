<!DOCTYPE HTML>
<html>
<head>
<meta charset=utf-8>
<title>Cookies</title>
</head>
<body>
    <form action="h7opg2pag2.php" method="post">
geef een grondtal: <input type="getal" name="grondtal"
value="<?php $grondtal;?>">
<?php setcookie("testcookie", $grondtal,time() + 120); ?>
<input type="submit" value="Versturen">
</form>
<br>
<a href="h5oefcur2.php">Vernieuw de pagina</a>
</body>
</html>