<?php
session_start();

require_once ("business/leerkrachtservice.php");

if(isset($_SESSION["aangemeld"]) && $_SESSION["aangemeld"] && isset($_SESSION["rechten"]) && $_SESSION["rechten"] == "admin_level"){
        include("presentation/leerkrachttoeveogenpresentation.php"); 
}else{
    header("location: home.php");
}