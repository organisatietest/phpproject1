<?php
require_once ("business/leerlingservice.php");
$leerlingsvc = new leerlingservice();
$klaslijst=$leerlingsvc->klasLijst(1);//hier kun je het klasid invullen om te kiezen welke lijst je wil laden
include("presentation/klaslijstpresentation.php");