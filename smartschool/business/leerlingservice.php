<?php

require_once ("data/leerlingDAO.php");

class leerlingservice {
    public function voegNieuwLeerlingToe($voornaam, $familienaam, $geboortedatum, $straat, $huisnr,$bus,$postcode, $telefoonnr
    , $klasid, $voornaamouder1, $familienaamouder1, $voornaamouder2, $familienaamouder2, $GSMouder1
    , $GSMouder2, $emailadres){
        $leerlingDao= new leerlingDAO();
        $wachtwoord= $leerlingDao->randomPassword($emailadres);
        return $leerlingDao->create($voornaam, $familienaam, $geboortedatum, $straat, $huisnr, $bus, $postcode, $telefoonnr, $klasid, $voornaamouder1, $familienaamouder1, $voornaamouder2, $familienaamouder2, $GSMouder1, $GSMouder2, $emailadres, $wachtwoord);
    }
    
    public function klasLijst($klasId){
        $leerlingDAO= new leerlingDAO();
        $klaslijst= $leerlingDAO->getByKlasId($klasId);
        return $klaslijst;
    }
    
    public function getleerlingbyid($id){
        $leerlingDAO = new leerlingDAO();
        $leerling = $leerlingDAO->getById($id);
        return $leerling;
    }

    public function logincheck($emailadres,$wachtwoord){
        $leerlingDAO = new leerlingDAO();
        $leerlingLogin = $leerlingDAO->getByGebruiker($emailadres, $wachtwoord);
        return $leerlingLogin;
    }
    
    public function klassize($klasid){
        $leerlingDAO = new leerlingDAO();
        $klaslijst = $leerlingDAO->getByKlasId($klasid);
        $klassize =0;
        foreach ($klaslijst as $leerling){
            $klassize = $klassize+1;
        }
        return $klassize;
    }
    
    public function deleteleerling($id){
        $leerlingDAO = new leerlingDAO();
        $leerlingDAO->delete($id);
    }

    public function verwijderGebruiker($id) {
        $GebruikerDAO = new gebruikerDAO();
        $gebruikerDAO->delete($id);
    }

    public function haalGebruikerOpId($id) {
        $gebruikerDAO = new gebruikerDAO();
        $gebruiker = $gebruikerDAO->getById($id);
        return $gebruiker;
    }
    
    public function haalGebruikerOpemailadres($emailadres) {
        $gebruikerDAO = new gebruikerDAO();
        $gebruiker = $gebruikerDAO->getByemailadres($emailadres);
        return $gebruiker;
    }
    
    public function updateLeerling($leerlingid,$voornaam, $familienaam, $geboortedatum, $straat, $huisnr,$bus,$postcode, $telefoonnr
    , $klasid, $voornaamouder1, $familienaamouder1, $voornaamouder2, $familienaamouder2, $GSMouder1
    , $GSMouder2, $emailadres,$wachtwoord){
        $leerlingDAO = new leerlingDAO();
        $leerling = self::getleerlingbyid($leerlingid);
        $leerling->setVoornaam($voornaam);
        $leerling->setFamilienaam($familienaam);
        $leerling->setGeboortedatum($geboortedatum);
        $leerling->setStraat($straat);
        $leerling->setHuisnr($huisnr);
        $leerling->setBus($bus);
        $leerling->setPostcode($postcode);
        $leerling->setTelefoonnr($telefoonnr);
        $leerling->setKlasid($klasid);
        $leerling->setVoornaamouder1($voornaamouder1);
        $leerling->setFamilienaamouder1($familienaamouder1);
        $leerling->setVoornaamouder2($voornaamouder2);
        $leerling->setFamilienaamouder2($familienaamouder2);
        $leerling->setGSMouder1($GSMouder1);
        $leerling->setGSMouder2($GSMouder2);
        $leerling->setWachtwoord($wachtwoord);
        print_r($leerling);
        $leerlingDAO->update($leerling);
    }

    
    public function updateGebruiker($naam, $voornaam, $telefoonnummer,$emailadres
                                ,$woonplaats, $postcode, $straat, $nummer) {
        $gebruikerDAO = new gebruikerDAO();
        $gebruiker1 = self::haalGebruikerOpemailadres($emailadres);
        $gebruiker1->setNaam($naam);
        $gebruiker1->setVoornaam($voornaam);
        $gebruiker1->setTelefoonnummer($telefoonnummer);
        $gebruiker1->setWoonplaats($woonplaats);
        $gebruiker1->setPostcode($postcode);
        $gebruiker1->setStraat($straat);
        $gebruiker1->setNummer($nummer);
        $gebruikerDAO->update($gebruiker1);
    }
    
    public function updateWachtwoord($emailadres,$pass1){
        $gebruikerDAO = new gebruikerDAO();
        $gebruiker1 = self::haalGebruikerOpemailadres($emailadres);
        $gebruiker1->setWachtwoord($pass1);
        $gebruikerDAO->update($gebruiker1);
    }

    public function loggebruikerin($emailadres,$wachtwoord){
        $gebruikerDAO = new gebruikerDAO();
        //$gebruikerDAO->checkbrute($gebruikerid);
        $gelukt=$gebruikerDAO->login($emailadres, $wachtwoord);
        return $gelukt;
    }

    /*public function logincheck(){
        $gebruikerDAO = new gebruikerDAO();
        $gelukt=$gebruikerDAO->login_check();
        return $gelukt;
    }*/
    
    public function logout(){
        session_start();
        unset($_SESSION['gebruikerid']);
        unset($_SESSION['emailadres']);
        unset($_SESSION['wachtwoord']);
        session_destroy();
    }
}