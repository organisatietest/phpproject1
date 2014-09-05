<?php

require_once("data/dbconfig.php");
require_once("entities/gebruiker.php");
$bestaandgebruiker = null;

class leerlingDAO {

    public function getById($id) {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select gebruikersid, naam, voornaam, wachtwoord, telefoonnummer, emailadres, woonplaats, postcode
                , straat , nummer from gebruiker where gebruiker.id = " . $id;
        $resultSet = $dbh->query($sql);
        $rij = $resultSet->fetch();
        $gebruiker = gebruiker::create($rij["gebruikersid"], $rij["naam"], $rij["voornaam"], $rij["wachtwoord"]
                        , $rij["telefoonnummer"], $rij["emailadres"], $rij["woonplaats"], $rij["postcode"]
                        , $rij["straat"], $rij["nummer"], $rij["geblokkeerd"]);
        $dbh = null;
        return $gebruiker;
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

    public function delete($id) {
        $sql = "delete from gebruiker where id = " . $id;
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
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
