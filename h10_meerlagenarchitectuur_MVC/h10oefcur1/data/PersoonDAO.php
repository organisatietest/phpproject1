<?php

require_once("entities/persoon.php");
require_once("dbconfig.php");

class PersoonDAO {

    public function getAll() {
        $lijst = array();
        $sql = "select familienaam, voornaam from personen";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        foreach ($resultSet as $rij) {
            $persoon = new Persoon($rij["familienaam"], $rij["voornaam"]);
            array_push($lijst, $persoon);
        }
        $dbh = null;
        return $lijst;
    }

}
