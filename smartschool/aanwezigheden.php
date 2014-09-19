<?php

session_start();

require_once ("business/leerlingservice.php");
require_once ("business/leerkrachtservice.php");
require_once ("business/afwezigheidservice.php");
$leerkacht = unserialize($_SESSION["gebruiker"]);
$leerlingsvc = new leerlingservice();
$klasid = $leerkacht->getKlasid(); //haalt klasid op om toegang tot andere klassen te vermijden
$klaslijst = $leerlingsvc->klasLijst($klasid); //hier kun je het klasid invullen om te kiezen welke lijst je wil laden
$afwezigheidservice = new afwezigheidservice();
$i = 0;
$k = 0;
$maxaantalleerlingen = count($klaslijst)-1;
$afwezighedenlijst = array();
if (isset($_GET["log"]) && $_GET["log"] == "logout" && isset($_SESSION["aangemeld"]) && $_SESSION["aangemeld"] &&
        isset($_SESSION["rechten"]) && $_SESSION["rechten"] == "leerkracht_level") {
    session_destroy();
}

//logout
if (!isset($_GET["action"])) {
    $action = "";
} else {
    $action = $_GET["action"];
}

if (isset($_SESSION["aangemeld"]) && $_SESSION["aangemeld"] &&
        isset($_SESSION["rechten"]) && $_SESSION["rechten"] == "leerkracht_level" && !isset($_GET["log"])) {

    if ($action == "afw") {
        while($i <= $maxaantalleerlingen){
            if(isset($_POST["afwezig$i"])){
                $afwezig = $_POST["afwezig$i"];
                if ($afwezig == "on"){
                $afwezighedenlijst[$i]=1;
                }
            } else 
                $afwezighedenlijst[$i]=0;
            $i++;
        }
        while ($k <= $maxaantalleerlingen){
            if($afwezighedenlijst[$k]==1){
                $leerling = $klaslijst[$k];
                $datetime = new DateTime();
                $datum = $datetime->format('Y-m-d H');
                $leerlingid = $leerling->getLeerlingid();
                $afwezigheidservice->voegNieuwAfwezigheidToe($leerlingid, $datum);
            }
            $k++;
        }
        header("location:klaslijst.php");
        exit(0);
    } else {
        $j = 0;
        include("presentation/aanwezigheidslijstpresentation.php");
    }
} else {
    header("location: home.php");
}