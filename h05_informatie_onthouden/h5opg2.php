<?php
session_start();

class GetallenGenerator {
   
    public function getGetal() {
        if (!isset($_SESSION["randomgetal"])) {
            $_SESSION["randomgetal"] = rand(1, 100);
            $getal = $_SESSION["randomgetal"];
            $_SESSION["i"]=0;
        }
        if (isset($_SESSION["randomgetal"])) {
            $getal = $_SESSION["randomgetal"];
            $_SESSION["i"]=$_SESSION["i"]+1;
        }
        if ($_SESSION["i"]===10){
            unset($_SESSION["randomgetal"]);
            $_SESSION["i"]=0;
        }
        return $getal;
    }
}
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset=utf-8>
        <title>Hello world</title>
    </head>
    <body>
        <h1>
            het getal is
            <?php
            $neem = new GetallenGenerator();
            $getal = $neem->getGetal();
            print($getal);
            ?>
        </h1>
    </body>