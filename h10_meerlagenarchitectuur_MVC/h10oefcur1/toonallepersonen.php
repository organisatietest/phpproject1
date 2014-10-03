<?php

require_once("business/persoonservice.php");
$pService = new PersoonService();
$personen = $pService->getPersonenOverzicht();
include("presentation/personenlijst.php");
