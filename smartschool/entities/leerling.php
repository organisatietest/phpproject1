<?php

class leerling {

    private static $idMap = array();
    private $leerlingid;
    private $voornaam;
    private $familienaam;
    private $geboortedatum;
    private $straat;
    private $huisnr;
    private $bus;
    private $postcode;
    private $telefoonnr;
    private $klasid;
    private $voornaamouder1;
    private $familienaamouder1;
    private $voornaamouder2;
    private $familienaamouder2;
    private $woonplaats;


    private function __construct($id, $naam, $voornaam, $wachtwoord, $telefoonnummer, $emailadres
                                ,$woonplaats, $postcode, $straat, $nummer, $geblokkeerd) {
        $this->id = $id;
        $this->naam = $naam;
        $this->voornaam = $voornaam;
        $this->wachtwoord = $wachtwoord;
        $this->telefoonnummer = $telefoonnummer;
        $this->emailadres = $emailadres;
        $this->woonplaats = $woonplaats;
        $this->postcode = $postcode;
        $this->straat = $straat;
        $this->nummer = $nummer;
        $this->geblokkeerd = $geblokkeerd;
    }
    
    public static function create($id, $naam,$voornaam, $wachtwoord, $telefoonnummer, $emailadres
                                  , $woonplaats, $postcode, $straat, $nummer,$geblokkeerd) {
        if (!isset(self::$idMap[$id])) {
            self::$idMap[$id] = new gebruiker($id, $naam, $voornaam, $wachtwoord, $telefoonnummer
                                             ,$emailadres,$woonplaats,$postcode,$straat,$nummer,$geblokkeerd);
        }
        return self::$idMap[$id];
    }

    public function getId() {
        return $this->id;
    }

    public function getNaam() {
        return $this->naam;
    }
    
    public function getVoornaam(){
        return $this->voornaam;
    }

    public function getWachtwoord() {
        return $this->wachtwoord;
    }

    public function getTelefoonnummer() {
        return $this->telefoonnummer;
    }

    public function getEmailadres() {
        return $this->emailadres;
    }

    public function getWoonplaats(){
        return $this->woonplaats;
    }

    public function getPostcode(){
        return $this->postcode;
    }
    
    public function getStraat() {
        return $this->straat;
    }

    public function getNummer(){
        return $this->nummer;
    }
    
    public function getGeblokkeerd(){
        return $this->geblokkeerd;
    }

    public function setNaam($naam) {
        $this->naam = $naam;
    }
    
    public function setVoornaam($voornaam){
        $this->voornaam = $voornaam;
    }

    public function setWachtwoord($wachtwoord) {
        $this->wachtwoord = $wachtwoord;
    }

    public function setTelefoonnummer($telefoonnummer) {
        $this->telefoonnummer = $telefoonnummer;
    }

    public function setEmailadres($emailadres){
        $this->emailadres = $emailadres;
    }
    
    public function setWoonplaats($woonplaats){
        $this->woonplaats = $woonplaats;
    }
    
    public function setPostcode($postcode){
        $this->postcode = $postcode;
    }
    
    public function setStraat($straat){
        $this->straat = $straat;
    }
    
    public function setNummer($nummer){
        $this->nummer = $nummer;
    }
}
