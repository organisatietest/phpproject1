<?php
require_once("business/boekservice.php");
$boekSvc = new BoekService();
$boekenLijst = $boekSvc->getBoekenOverzicht();
include("presentation/boekenlijst.php");
?>