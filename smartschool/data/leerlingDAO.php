<?php

require_once("data/dbconfig.php");
require_once("entities/leerling.php");
$bestaandleerling = null;

class leerlingDAO {

    public function getById($id){
        $dbh = new PDO(DBconfig::$DB_CONNSTRING, DBconfig::$DB_USERNAME, DBconfig::$DB_PASSWORD);
        $sql = "select leerlingid, voornaam, familienaam, geboortedatum, straat, huisnr,bus,postcode, telefoonnr
    , klasid, voornaamouder1, familienaamouder1, voornaamouder2, familienaamouder2, GSMouder1
    , GSMouder2, emailadres, wachtwoord from leerling where leerlingid ='$id'";
        $resultSet = $dbh->query($sql);
        $rij = $resultSet->fetch();
        $leerling = leerling::create($rij["leerlingid"], $rij["voornaam"], $rij["familienaam"], $rij["geboortedatum"]
                        , $rij["straat"], $rij["huisnr"], $rij["bus"], $rij["postcode"], $rij["telefoonnr"],$rij["klasid"]
                        , $rij["voornaamouder1"], $rij["voornaamouder2"], $rij["familienaamouder1"], $rij["familienaamouder2"]
                        ,$rij["GSMouder1"],$rij["GSMouder2"],$rij["emailadres"],$rij["wachtwoord"]);
        $dbh = null;
        return $leerling;
    }

        public function getByKlasId($klasid){
        $klaslijst = array();
        $dbh = new PDO(DBconfig::$DB_CONNSTRING, DBconfig::$DB_USERNAME, DBconfig::$DB_PASSWORD);
        $sql = "select leerlingid, voornaam, familienaam, geboortedatum, straat, huisnr,bus,postcode, telefoonnr
    , klasid, voornaamouder1, familienaamouder1, voornaamouder2, familienaamouder2, GSMouder1
    , GSMouder2, emailadres, wachtwoord from leerling where klasid ='$klasid'";
        $resultSet = $dbh->query($sql);
        foreach ($resultSet as $rij){
            $leerling = leerling::create($rij["leerlingid"], $rij["voornaam"], $rij["familienaam"], $rij["geboortedatum"]
                        , $rij["straat"], $rij["huisnr"], $rij["bus"], $rij["postcode"], $rij["telefoonnr"],$rij["klasid"]
                        , $rij["voornaamouder1"], $rij["voornaamouder2"], $rij["familienaamouder1"], $rij["familienaamouder2"]
                        ,$rij["GSMouder1"],$rij["GSMouder2"],$rij["emailadres"],$rij["wachtwoord"]);
        array_push($klaslijst, $leerling);
        }
        $dbh = null;
        return $klaslijst;
    }
    //deze functie dient om de inlog te zien.
    public function getByGebruiker($emailadres,$wachtwoord){
        $sql = "select leerlingid, voornaam, familienaam, geboortedatum, straat, huisnr,bus,postcode, telefoonnr
        , klasid, voornaamouder1, familienaamouder1, voornaamouder2, familienaamouder2, GSMouder1
        , GSMouder2, emailadres, wachtwoord from leerling where emailadres ='".$emailadres."' and wachtwoord ='".$wachtwoord."' ";
        $dbh = new PDO(DBconfig::$DB_CONNSTRING, DBconfig::$DB_USERNAME, DBconfig::$DB_PASSWORD);
        $resultset = $dbh->query($sql);
        $rij = $resultset->fetch();
        $leerling = leerling::create($rij["leerlingid"], $rij["voornaam"], $rij["familienaam"], $rij["geboortedatum"]
                        , $rij["straat"], $rij["huisnr"], $rij["bus"], $rij["postcode"], $rij["telefoonnr"],$rij["klasid"]
                        , $rij["voornaamouder1"], $rij["voornaamouder2"], $rij["familienaamouder1"], $rij["familienaamouder2"]
                        ,$rij["GSMouder1"],$rij["GSMouder2"],$rij["emailadres"],$rij["wachtwoord"]);
        $dbh = null;
        if($leerling->getLeerlingid()==0){
            return false;
        }else{
            return $leerling;
        } 
    }

    public function getByemailadresNaam($emailadres,$voornaam,$familienaam) {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select leerlingid, voornaam, familienaam, geboortedatum, straat, huisnr,bus,postcode, telefoonnr
    , klasid, voornaamouder1, familienaamouder1, voornaamouder2, familienaamouder2, GSMouder1
    , GSMouder2, emailadres, wachtwoord from leerling where emailadres ='$emailadres' and voornaam ='$voornaam' and familienaam ='$familienaam'limit 1";
        $resultSet = $dbh->query($sql);
        $rij = $resultSet->fetch();
        $dbh->exec($sql);
        $dbh = null;
        $gebruiker = leerling::create($rij["leerlingid"], $rij["voornaam"], $rij["familienaam"], $rij["geboortedatum"]
                        , $rij["straat"], $rij["huisnr"], $rij["bus"], $rij["postcode"], $rij["telefoonnr"],$rij["klasid"]
                        , $rij["voornaamouder1"], $rij["voornaamouder2"], $rij["familienaamouder1"], $rij["familienaamouder2"]
                        ,$rij["GSMouder1"],$rij["GSMouder2"],$emailadres,$rij["wachtwoord"]);
        return $gebruiker;
    }

    public function create($voornaam, $familienaam, $geboortedatum, $straat, $huisnr, $bus, $postcode, $telefoonnr
    , $klasid, $voornaamouder1, $familienaamouder1, $voornaamouder2, $familienaamouder2, $GSMouder1
    , $GSMouder2, $emailadres, $wachtwoord) {
        $bestaandleerling = $this->getByemailadresNaam($emailadres,$voornaam,$familienaam);
        if ($bestaandleerling->getLeerlingid() == 0) {
            $sql = "insert into leerling (voornaam, familienaam, geboortedatum, straat, huisnr,bus,postcode, telefoonnr
    , klasid, voornaamouder1, familienaamouder1, voornaamouder2, familienaamouder2, GSMouder1
    , GSMouder2, emailadres, wachtwoord)
                values ('" . $voornaam . "', '" . $familienaam . "','" . $geboortedatum . "','" . $straat . "','"
                    . $huisnr . "','" . $bus . "','" . $postcode . "','" . $telefoonnr . "','" . $klasid . "','"
                    . $voornaamouder1 . "', '" .$familienaamouder1."', '" .$voornaamouder2."', '" .$familienaamouder2."', '"
                    .$GSMouder1."', '" .$GSMouder2."', '" .$emailadres."', '" .$wachtwoord."')";
            $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $test = $dbh->exec($sql);
            $leerlingid = $dbh->lastInsertId();
            $dbh = null;
            $leerling = leerling::create($leerlingid, $voornaam, $familienaam, $geboortedatum, $straat, $huisnr, $bus
                            , $postcode, $telefoonnr, $klasid, $voornaamouder1, $familienaamouder1, $voornaamouder2, $familienaamouder2
                            , $GSMouder1, $GSMouder2, $emailadres, $wachtwoord);
            return $leerling;
        } else {
            throw new EmailadresBestaatException();
        }
    }
    
    public function randomPassword($emailadres) {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        $password = implode($pass);
        $to = "$emailadres";
        $subject = "wachtwoord nieuw account smartschool";
        $body = "uw wachtwoord voor smartschool is:" . $password . "je kan je wachtwoord aanpassen in je profiel ";
        $headers = "From: root@localhost.com";
        if (mail($to, $subject, $body, $headers)) {
            return sha1($password); //turn the array into a string
        } else
            throw new mailmisluktException();
    }
    
    public function delete($id){
        $dbh = new PDO(DBconfig::$DB_CONNSTRING,  DBconfig::$DB_USERNAME,  DBconfig::$DB_PASSWORD);
        $sql = "delete from leerling where leerlingid = ".$id;
        $dbh->exec($sql);
        $dbh = null;
    }

    public function update($gebruiker1) {
        $sql = "update gebruiker set naam='" . $gebruiker1->getNaam() .
                "', voornaam='" . $gebruiker1->getVoornaam() .
                "', wachtwoord='" . $gebruiker1->getWachtwoord() .
                "', telefoonnummer='" . $gebruiker1->getTelefoonnummer() .
                "', woonplaats='" . $gebruiker1->getWoonplaats() .
                "', postcode='" . $gebruiker1->getPostcode() .
                "', straat='" . $gebruiker1->getStraat() .
                "', nummer='" . $gebruiker1->getNummer() .
                "' where emailadres = '" . $gebruiker1->getEmailadres() . "'";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbh->exec($sql);
        $dbh = null;
    }

    public function login($emailadres, $password) {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select gebruikersid, wachtwoord as db_password, geblokkeerd from gebruiker where emailadres = '$emailadres' LIMIT 1";
        $resultSet = $dbh->query($sql);
        $rij = $resultSet->fetch();
        $dbh->exec($sql);    // Execute the prepared query.
        $dbh = NULL;
        $gebruikerid = $rij["gebruikersid"];
        $db_password = $rij["db_password"];
        $geblokkeerd = $rij["geblokkeerd"];
        // hash the password
        $password = sha1($password);

        // If the user exists we check if the account is locked
        // from too many login attempts 
        if ($geblokkeerd == true) {
            // Account is locked 
            // Send an email to user saying their account is locked
            return false;
        } else {
            // Check if the password in the database matches
            // the password the user submitted.
            if ($db_password == $password) {
                // Password is correct!
                session_start();
                $_SESSION['gebruikerid'] = $gebruikerid;
                $_SESSION['emailadres'] = $emailadres;
                $_SESSION['wachtwoord'] = $password;
                // Login successful.
                return true;
            } else {
                return false;
            }
        }
    }

    public function login_check() {
        // Check if all session variables are set 
        if (isset($_SESSION['gebruikerid'], $_SESSION['emailadres'], $_SESSION['wachtwoord'])) {
            $gebruikerid = $_SESSION['gebruikerid'];
            $emailadres = $_SESSION['emailadres'];
            $wachtwoord = $_SESSION['wachtwoord'];

            $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $sql = "SELECT emailadres, wachtwoord FROM gebruiker WHERE gebruikersid = '$gebruikerid' LIMIT 1";
            $resultSet = $dbh->query($sql);
            $rij = $resultSet->fetch();
            $dbh->exec($sql);   // Execute the prepared query.
            $db_emailadres = $rij["emailadres"];
            $db_wachtwoord = $rij["wachtwoord"];
            if ($db_emailadres == $emailadres and $db_wachtwoord = $wachtwoord) {
                // Logged In!!!! 
                $error = "loggedin";
                return $error;
            } else {
                $error = "mailandw8woordnietcorrect";
                return $error;
            }
        } else {
            // Not logged in
            $error = "notloggedin";
            return $error;
        }
    }

}
