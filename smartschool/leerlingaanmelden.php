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
    print("1");
    if (empty($_POST["voornaam"])) {
        $voornaamerror = "missing";
        $doorgaan = false;
    } else {
        $voornaam = strip_tags(trim($_POST["voornaam"]));
        if (empty($voornaam)) {
            $doorgaan = false;
            $voornaamerror = "missing";
        }
    }
    if (empty($_POST["familienaam"])) {
        $familienaamerror = "missing";
        $doorgaan = false;
    } else {
        $familienaam = strip_tags(trim($_POST["familienaam"]));
        if (empty($familienaam)) {
            $familienaamerror = "missing";
            $doorgaan = false;
        }
    }
    if (empty($_POST["geboortedatum"])) {
        $geboortedaumerror = "missing";
        $doorgaan = false;
    } else {
        $geboortedatum = strip_tags(trim($_POST["geboortedatum"]));
        if (empty($geboortedatum)) {
            $geboortedaumerror = "missing";
            $doorgaan = false;
        }
    }
    if (empty($_POST["emailadres"])) {
        $emailadreserror = "missing";
        $doorgaan = false;
    } else {
        if (preg_match("/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/", $_POST["emailadres"])) {
            $emailadres = strip_tags(trim($_POST["emailadres"]));
            if (empty($emailadres)) {
                $emailadreserror = "missing";
                $doorgaan = false;
            }
        } else {
            $doorgaan = false;
        }
    }
    if ($doorgaan == true) {
        $straat = strip_tags(trim($_POST["straat"]));
        $huisnr = strip_tags(trim($_POST["huisnr"]));
        $bus = strip_tags(trim($_POST["bus"]));
        $postcode = strip_tags(trim($_POST["postcode"]));
        $telefoonnr = strip_tags(trim($_POST["telefoonnr"]));
        $voornaamouder1 = strip_tags(trim($_POST["voornaamouder1"]));
        $voornaamouder2 = strip_tags(trim($_POST["voornaamouder2"]));
        $familienaamouder1 = strip_tags(trim($_POST["familienaamouder1"]));
        $familienaamouder2 = strip_tags(trim($_POST["familienaamouder2"]));
        $GSMouder1 = strip_tags(trim($_POST["GSMouder1"]));
        $GSMouder2 = strip_tags(trim($_POST["GSMouder2"]));
        try {
            $datetime = new DateTime($geboortedatum);
            $leerlingsvc->voegNieuwLeerlingToe($voornaam, $familienaam
                    , $datetime->format('Y,m,d'), $straat, $huisnr
                    , $bus, $postcode, $telefoonnr, 0 , $voornaamouder1
                    , $familienaamouder1, $voornaamouder2, $familienaamouder2
                    , $GSMouder1, $GSMouder2, $emailadres);
            header("location:leerlingaanmelden.php");
            exit(0);
        } catch (EmailadresBestaatException $ebe) {
            header("location:aanmelden.php?error=emailexists");
            exit(0);
        }
    } else {
        print("oke");
    }
} else {
    if (!isset($_GET["error"])) {
        $error = null;
    } else
        $error = $_GET["error"];
    include("presentation/leerlingtoevoegenpresentation.php");
}
