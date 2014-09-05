<?php

require_once ("business/leerlingservice.php");
$leerlingsvc = new leerlingservice;
require_once ("exceptions/EmailadresBestaatException.php");
if (!isset($_GET["action"])) {
    $action = null;
} else
    $action = $_GET["action"];
if ($action == "process") {
    try {
        $leerlingsvc->voegNieuwLeerlingToe($_POST["voornaam"], $_POST["familienaam"]
                , $_POST["geboortedatum"], $_POST["straat"], $_POST["huisnr"]
                , $_POST["bus"], $_POST["postcode"],$_POST["telefoonnr"],$_POST["klas"], $_POST["voornaamouder1"]
                , $_POST["familienaamouder1"], $_POST["voornaamouder2"], $_POST["familienaamouder2"]
                , $_POST["GSMouder1"], $_POST["GSMouder2"], $_POST["emailadres"]);
        //header("location:leerlingaanmelden.php");
        //exit(0);
    } catch (EmailadresBestaatException $ebe) {
        header("location:aanmelden.php?error=emailexists");
        exit(0);
    }
} else {
    if (!isset($_GET["error"])) {
        $error = null;
    } else
        $error = $_GET["error"];
    include("presentation/leerlingtoevoegenpresentation.php");
}
