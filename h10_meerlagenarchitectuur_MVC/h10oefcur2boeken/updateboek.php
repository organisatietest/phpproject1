<?php

require_once("business/genreservice.php");
require_once("business/boekservice.php");
require_once("exceptions/titelbestaatexception.php");
if ($_GET["action"] == "process") {
    try {
        $boekSvc = new BoekService();
        $boekSvc->updateBoek($_GET["id"], $_POST["txtTitel"], $_POST["selGenre"]);
        header("location: toonalleboeken.php");
        exit(0);
    } catch (TitelBestaatException $tbe) {
        header("location: updateboek.php?id=" . $_GET["id"] . "&error=titleexists");
        exit(0);
    }
} else {
    $genreSvc = new GenreService();
    $boekSvc = new BoekService();
    $genreLijst = $genreSvc->getGenresOverzicht();
    $boek = $boekSvc->haalBoekOp($_GET["id"]);
    $error = $_GET["error"];
    include("presentation/updateboekform.php");
}