<?php
session_start();

require_once ("business/leerkrachtservice.php");

if(isset($_SESSION["aangemeld"]) && $_SESSION["aangemeld"]){
    if(isset($_SESSION["rechten"]) && $_SESSION["rechten"] == "admin_level"){
        
        include("presentation/leerkrachttoeveogenpresentation.php"); 
        //lol
    }
}else{
    header("location: home.php");
}