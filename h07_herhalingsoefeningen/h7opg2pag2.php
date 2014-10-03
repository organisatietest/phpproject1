<!DOCTYPE HTML>
<?php 
if (!empty($_COOKIE("testcookie"))) {
setcookie("testcookie", time() + 120);
} else {
$grondtal1 = $_COOKIE["grondtal"];
}
?>
<html>
<head>
<meta charset=utf-8>
<title>Cookies</title>
</head>
<body>
    <?php print_r($grondtal1); ?>
    <a href="h7opg2pag1.php">terug naar selectiemenu</a>
</body>
</html>