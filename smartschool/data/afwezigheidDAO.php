<?php

require_once("data/dbconfig.php");
require_once("entities/afwezigheid.php");

class afwezigheidDAO {

    public function create($id, $leerlingid, $datum) {
        $sql = "insert into afwezigheden (afwezigheidid,leerlingid,datum)
                values('" . $id . "','" . $leerlingid . "','" . $datum . "')";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $test = $dbh->exec($sql);
        return $test;
    }

    public function getaanwezigheidvoorm($date1, $date2) {
        $lijst = array();
        $sql = "select afwezigheidid as id,leerlingid,datum from afwezigheden where datum > '" . $date1 . "' and datum < '" . $date2 . "'";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        foreach ($resultSet as $rij) {
            print_r($rij);
            $afwezigheid = afwezigheid::create($rij["id"], $rij["leerlingid"], $rij["datum"]);
            array_push($lijst, $afwezigheid);
        }
        $dbh = null;
        return print_r($lijst);
    }

    public function getaanwezigheidnam($date1, $date2) {
        $lijst = array();
        $sql = "select afwezigheidid as id,leerlingid,datum from afwezigheden where datum > '" . $date1 . "' and datum < '" . $date2 . "'";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        
        foreach ($resultSet as $rij) {
            $afwezigheid = afwezigheid::create($rij["id"], $rij["leerlingid"], $rij["datum"]);
            array_push($lijst, $afwezigheid);
        }
        $dbh = null;
        return ($lijst);
    }

}
