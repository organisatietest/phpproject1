<?php
session_start();
require_once 'business/leerkrachtservice.php';
//$addfirst= new leerkrachtservice();   werd gebruik om eens de invoeg functies te kunnen uit testen. pas is admin hashed
//$addfirst->leerkrachttoevoegen("admin", "d033e22ae348aeb5660fc2140aec35850c4da997", "admin", "unknown", "1111-11-11", "", 1, true);

if(isset($_GET["submited"]) && $_GET["submited"]){
    $emailadres=$_POST["gebruikersnaam"];
    $wachtwoord=$_POST["wachtwoord"];
    
    
}

if(isset($_SESSION["aangemeld"])){//controle ingelogd of niet met bij ingelogd contlore op gebruikers niveau
    if(isset($_SESSION["aangemeld"]) && isset($_SESSION["rechten"]) && $_SESSION["rechten"]=="admin_level"){
        header("location: leerkrachtaanmelden.php");
    }elseif(isset ($_SESSION["aangemeld"]) && isset($_SESSION["rechten"]) && $_SESSION["rechten"]=="leerkracht_level"){
        header("location: klaslijst.php");
    }elseif(isset ($_SESSION["aangemeld"]) && isset($_SESSION["rechten"]) && $_SESSION["rechten"]=="ouders_level"){
        //header("location: leerlingaanmelden.php");    //deze staat in comentaat nog geen pagina
        echo 'welkom ouder';//deze regel zal vervangen worden door de nodige pagina
    }else{
        header("location: home.php");
    }
}else{
    include'presentation/homepresentation.php';
}



