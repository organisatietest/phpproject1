<?php

require_once ("business/leerlingservice.php");
$leerlingsvc = new leerlingservice;
require_once ("exceptions/EmailadresBestaatException.php");
if (!isset($_GET["action"])) {
    $action = null;
} else
    $action = $_GET["action"];
$doorgaan = true;
if ($action == "process") {
    if (!isset($_POST["voornaam"])) {
        $voornaamerror = "missing";
        $doorgaan = false;
    }
    else {
        $voornaam = strip_tags( trim($_POST["voornaam"]));
        if (empty($voornaam)){
            $doorgaan = false;
        }
    }
    if (!isset($_POST["familienaam"])) {
        $familienaamerror = "missing";
        $doorgaan = false;
    }
    else {
        $familienaam = strip_tags( trim($_POST["familienaam"]));
        if(empty($familienaam)){
            $doorgaan = false;
        }
    }
    if (!isset($_POST["geboortedatum"])) {
        $geboortedaumerror = "missing";
        $doorgaan = false;
    }
    else {
        $geboortedatum = strip_tags( trim($_POST["geboortedatum"]));
        if(empty($geboortedatum)){
            $doorgaan = false;
        }
    }
    if (!isset($_POST["emailadres"])) {
        $emailadreserror = "missing";
        $doorgaan = false;
    }
    else {
        if(preg_match("/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/", $_POST[ "emailadres" ] )){
            $emailadres = strip_tags( trim($_POST["emailadres"]));
            if(empty($emailadres)){
                $doorgaan=false;
            }
        } else{$doorgaan=false;}
    }
    if ($doorgaan == false) {
        try {
            $datetime = new DateTime($_POST["geboortedatum"]);
            $leerlingsvc->voegNieuwLeerlingToe($_POST["voornaam"], $_POST["familienaam"]
                    , $datetime->format('Y,m,d'), $_POST["straat"], $_POST["huisnr"]
                    , $_POST["bus"], $_POST["postcode"], $_POST["telefoonnr"], $_POST["klas"], $_POST["voornaamouder1"]
                    , $_POST["familienaamouder1"], $_POST["voornaamouder2"], $_POST["familienaamouder2"]
                    , $_POST["GSMouder1"], $_POST["GSMouder2"], $_POST["emailadres"]);
            //header("location:leerlingaanmelden.php");
            //exit(0);
        } catch (EmailadresBestaatException $ebe) {
            header("location:aanmelden.php?error=emailexists");
            exit(0);
        }
    }
    else{
        print("gelukt");
    }
} else {
    if (!isset($_GET["error"])) {
        $error = null;
    } else
        $error = $_GET["error"];
    include("presentation/leerlingtoevoegenpresentation.php");
}
