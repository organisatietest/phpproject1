<?php
require_once 'data/leerkrachtDAO.php';

class leerkrachtservice{
    public function leerkrachttoevoegen($emailadres,$wachtwoord,$voornaam,$familienaam,$geboortedatum,$foto,$klasid,$admin){
        $leerkrachtDAO = new leerkrachtDAO();
        $leerkrachtDAO->addLeeracht($emailadres, $wachtwoord, $voornaam, $familienaam, $geboortedatum, $foto, $klasid, $admin);
    }
    
    public function logincheck($emailadres,$wachtwoord){
        $leerkrachtDAO = new leerkrachtDAO();
        $leerkrachtLogin = $leerkrachtDAO->getByGebruiker($emailadres, $wachtwoord);
        return $leerkrachtLogin;
    }
    
    public function generate($emailadres){
        $leerkrachtDAO = new leerkrachtDAO();
        $wachtwoord = $leerkrachtDAO->randomPassword($emailadres);
        
        return $wachtwoord;
    }
    
    public function leerkrachtlijst(){
        $leerkrachtDAO = new leerkrachtDAO();
        $lijst = $leerkrachtDAO->leerkrachtlijst();
        return $lijst;
    }
}