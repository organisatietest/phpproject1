<?php

require_once("business/genreservice.php");
require_once("business/boekservice.php");
require_once("exceptions/titelbestaatexception.php");
if ($_GET["action"] == "process") {
    try {
        boekService::voegNieuwBoekToe($_POST["txtTitel"], $_POST["selGenre"]);
        header("location: toonalleboeken.php");
        exit(0);
    } catch (TitelBestaatException $tbe) {
        header("location: voegboektoe.php?error=titleexists");
        exit(0);
    }
} else {
    $genreSvc = new GenreService();
    $genreLijst = $genreSvc->getGenresOverzicht();
    $error = $_GET["error"];
    include("presentation/nieuwboekform.php");
}