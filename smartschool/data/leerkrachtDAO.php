<?php
require_once 'entities/leerkracht.php';
require_once 'DBconfig.php';

class leerkrachtDAO{
    public function addLeeracht($emailadres,$wachtwoord,$voornaam,$familienaam,$geboortedatum,$foto,$klasid,$admin){
        $sql = "insert into leerkracht(emailadres,wachtwoord,voornaam,familienaam,geboortedatum,foto,klasid,admin)
        values ('".$emailadres."','".$wachtwoord."','".$voornaam."','".$familienaam."','".$geboortedatum."','".$foto."',
        '".$klasid."','".$admin."')";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $leerkracht = $dbh->exec($sql);
        $leerkrachtid = $dbh->lastInsertId();
        $dbh = null;
    }
    
    public function getByEmailadres($emailadres){
        $sql = "select leerkrachtid,emailadres,wachtwoord,voornaam,familienaam,geboortedatum,foto,klasid,admin from leerkracht where emailadres ='".$emailadres."' ";
        $dbh = new PDO(DBconfig::$DB_CONNSTRING, DBconfig::$DB_USERNAME, DBconfig::$DB_PASSWORD);
        $resultset = $dbh->query($sql);
        $rij = $resultset->fetch();
        $leerkracht = leerkracht::create($rij["leerkrachtid"],$rij["emailadres"],$rij["wachtwoord"],$rij["voornaam"],$rij["familienaam"],$rij["geboortedatum"],$rij["foto"],$rij["klasid"],$rij["admin"]);
        $dbh = null;
        return $leerkracht;
    }
    
    public function  leerkrachtlijst(){
        $lijst = array();
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select leerkrachtid,emailadres,wachtwoord,voornaam,familienaam,geboortedatum,foto,klasid,admin from leerkracht where admin=false";
        $resultset = $dbh->query($sql);
        foreach ($resultset as $rij){
            $leerkracht = leerkracht::create($rij["leerkrachtid"],$rij["emailadres"],$rij["wachtwoord"],$rij["voornaam"],$rij["familienaam"],$rij["geboortedatum"],$rij["foto"],$rij["klasid"],$rij["admin"]);
            array_push($lijst, $leerkracht);
        }
        $dbh = null;
        return $lijst;
    }

        public function getByGebruiker($emailadres,$wachtwoord){
        $sql = "select leerkrachtid,emailadres,wachtwoord,voornaam,familienaam,geboortedatum,foto,klasid,admin from leerkracht where emailadres ='$emailadres' and wachtwoord='$wachtwoord' ";
        $dbh = new PDO(DBconfig::$DB_CONNSTRING, DBconfig::$DB_USERNAME, DBconfig::$DB_PASSWORD);
        $resultset = $dbh->query($sql);
        $rij = $resultset->fetch();
        $leerkracht = leerkracht::create($rij["leerkrachtid"],$rij["emailadres"],$rij["wachtwoord"],$rij["voornaam"],$rij["familienaam"],$rij["geboortedatum"],$rij["foto"],$rij["klasid"],$rij["admin"]);
        $dbh = null;
        if($leerkracht->getLeerkrachtid()==0){
            return false;
        }else{
            return $leerkracht;
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
}