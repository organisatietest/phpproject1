<?php
require_once 'data/leerkrachtDAO.php';

class leerkrachtservice{
    public function leerkrachttoevoegen($emailadres,$wachtwoord,$voornaam,$familienaam,$geboortedatum,$foto,$klasid,$admin){
        $leerkrachtDAO = new leerkrachtDAO();
        $leerkrachtDAO->addLeeracht($emailadres, $wachtwoord, $voornaam, $familienaam, $geboortedatum, $foto, $klasid, $admin);
    }
    
    public function logincheck($emailadres,$wachtwoord){
        
    }
}