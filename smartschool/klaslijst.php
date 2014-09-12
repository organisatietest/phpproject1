<?php
session_start();

require_once ("business/leerlingservice.php");
require_once ("entities/leerkracht.php");

if(isset($_SESSION["aangemeld"]) && $_SESSION["aangemeld"]){
    if(isset($_SESSION["rechten"]) && $_SESSION["rechten"] == "leerkracht_level"){
        
        $leerkacht=  unserialize($_SESSION["gebruiker"]);
        $leerlingsvc = new leerlingservice();
        $klasid=$leerkacht->getKlasid();//haalt klasid op om toegang tot andere klassen te vermijden
        $klaslijst=$leerlingsvc->klasLijst($klasid);//hier kun je het klasid invullen om te kiezen welke lijst je wil laden
        include("presentation/klaslijstpresentation.php"); 
    }
}else{
    header("location: home.php");
}