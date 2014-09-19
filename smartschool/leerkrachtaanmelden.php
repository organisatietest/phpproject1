<?php
session_start();

require_once ("business/leerkrachtservice.php");

if(isset($_GET["log"]) && $_GET["log"] == "logout" && isset($_SESSION["aangemeld"]) && $_SESSION["aangemeld"] &&
        isset($_SESSION["rechten"]) && $_SESSION["rechten"] == "admin_level"){
    session_destroy();
}

if(isset($_SESSION["aangemeld"]) && $_SESSION["aangemeld"] && isset($_SESSION["rechten"]) &&
        $_SESSION["rechten"] == "admin_level" && !isset($_GET["log"])){
        if(isset($_GET["action"]) && $_GET["action"] == "process"){
            //leerkrachtservice
            $leerkrachtsvc = new leerkrachtservice();
            
            //de variabels die naar db gaan
            $emailadres = $_POST["emailadres"];         
            $voornaam = $_POST["voornaam"];
            $familienaam = $_POST["familienaam"];
            
            $geboortedatum = $_POST["geboortedatum"];
            $datetime = new DateTime($geboortedatum);
            $geboortedatum = $datetime->format('Y,m,d');
            
            $klasid = $_POST["klas"];
            
            $foto = "";
            $admin = false;
            
            $wachtwoord = $leerkrachtsvc->generate($emailadres);
            
            $leerkacht = $leerkrachtsvc->leerkrachttoevoegen($emailadres, $wachtwoord, $voornaam, $familienaam, $geboortedatum, $foto, $klasid, $admin);
            
            header("location: leerkrachtlijst.php");
        }else{
            include("presentation/leerkrachttoeveogenpresentation.php");
        }
}else{
    header("location: home.php");
}