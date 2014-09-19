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
    if(isset($_GET["leerlingid"]) && !isset($_GET["update"])){
        $id = $_GET["leerlingid"];
        $leerling = $leerlingsvc->getleerlingbyid($id);
        include("presentation/leerlingprofielpresentation.php");
    }else{
        if(isset($_GET["update"]) && $_GET["update"] == "yes" && isset($_GET["leerlingid"])){
            $id = $_GET["leerlingid"];
            $leerling = $leerlingsvc->getleerlingbyid($id);
            include("presentation/updateleerlingpresentation.php");
        }else{
            header("location: klaslijst.php");
        }
    }
}else{
    header("location: home.php");
}

