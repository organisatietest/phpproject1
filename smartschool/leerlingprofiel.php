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
    
    if(isset($_GET["action"]) && isset($_GET["update"]) && $_GET["action"] == "process" && $_GET["update"] == "yes"){
        $leerlingid= $_GET["leerlingid"];
        $voornaam=$_POST["voornaam"];
        $familienaam=$_POST["familienaam"];
        $geboortedatum=$_POST["geboortedatum"];
        
        $datetime = new DateTime($geboortedatum);
        $geboortedatum = $datetime->format('Y,m,d');
        
        $straat=$_POST["straat"];
        $huisnr=$_POST["huisnr"];
        $bus=$_POST["bus"];
        $postcode=$_POST["postcode"];
        $telefoonnr=$_POST["telefoonnr"];
        $klasid=$leerkacht->getKlasid();
        $voornaamouder1=$_POST["voornaamouder1"];
        $familienaamouder1=$_POST["familienaamouder1"];
        $voornaamouder2=$_POST["voornaamouder2"];
        $familienaamouder2=$_POST["familienaamouder2"];
        $GSMouder1=$_POST["GSMouder1"];
        $GSMouder2=$_POST["GSMouder2"];
        $emailadres=$_POST["emailadres"];
        //$wachtwoord=$_POST["wachtwoord"];
        
        $wachtwoord= sha1($wachtwoord);
        
        $leerlingsvc->updateLeerling($leerlingid,$voornaam, $familienaam, $geboortedatum, $straat, $huisnr,$bus,$postcode, $telefoonnr
        , $klasid, $voornaamouder1, $familienaamouder1, $voornaamouder2, $familienaamouder2, $GSMouder1
        , $GSMouder2, $emailadres,$wachtwoord);
        header("location: klaslijst.php");
    
        
    }else{
        
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
        
    }
}else{
    header("location: home.php");
}

