<?php
session_start();

require_once ("business/leerkrachtservice.php");

if(isset($_GET["log"]) && $_GET["log"] == "logout" && isset($_SESSION["aangemeld"]) && $_SESSION["aangemeld"] &&
        isset($_SESSION["rechten"]) && $_SESSION["rechten"] == "admin_level"){
    session_destroy();
}

if(isset($_SESSION["aangemeld"]) && $_SESSION["aangemeld"] && isset($_SESSION["rechten"]) &&
        $_SESSION["rechten"] == "admin_level" && !isset($_GET["log"])){
        include("presentation/leerkrachttoeveogenpresentation.php"); 
}else{
    header("location: home.php");
}