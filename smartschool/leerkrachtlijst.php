<?php
session_start();

require_once ("business/leerkrachtservice.php");
require_once ("business/leerlingservice.php");

if(isset($_GET["log"]) && $_GET["log"] == "logout" && isset($_SESSION["aangemeld"]) && $_SESSION["aangemeld"] &&
        isset($_SESSION["rechten"]) && $_SESSION["rechten"] == "admin_level"){
    session_destroy();
}

if(isset($_SESSION["aangemeld"]) && $_SESSION["aangemeld"] && isset($_SESSION["rechten"]) &&
        $_SESSION["rechten"] == "admin_level" && !isset($_GET["log"])){
    $leerkacht=  unserialize($_SESSION["gebruiker"]);
    $leerkrachtsvc = new leerkrachtservice();
    $leerkrachtlijst=$leerkrachtsvc->leerkrachtlijst();//hier kun je het klasid invullen om te kiezen welke lijst je wil laden
    include("presentation/leerkrachtlijstpresentation.php"); 
}else{
    header("location: home.php");
}

