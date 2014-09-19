<?php
session_start();

require_once ("business/leerkrachtservice.php");
require_once ("business/leerlingservice.php");

if(isset($_GET["log"]) && $_GET["log"] == "logout" && isset($_SESSION["aangemeld"]) && $_SESSION["aangemeld"] &&
        isset($_SESSION["rechten"]) && $_SESSION["rechten"] == "leerkracht_level"){
    session_destroy();
}

if(isset($_SESSION["aangemeld"]) && $_SESSION["aangemeld"] && isset($_SESSION["rechten"]) &&
        $_SESSION["rechten"] == "leerkracht_level" && !isset($_GET["log"])){
    $leerkacht=  unserialize($_SESSION["gebruiker"]);
    $leerlingsvc = new leerlingservice();
    $klasid=$leerkacht->getKlasid();//haalt klasid op om toegang tot andere klassen te vermijden
    
    if(isset($_GET["del"]) && $_GET["del"]=="yes" && isset($_GET["id"])){
        $todeleteid = $_GET["id"];
        $leerlingsvc->deleteleerling($todeleteid);
        header("location: klaslijst.php");
    }else{
        
    }
    $klaslijst=$leerlingsvc->klasLijst($klasid);//hier kun je het klasid invullen om te kiezen welke lijst je wil laden
    include("presentation/klaslijstpresentation.php"); 
}else{
    header("location: home.php");
}