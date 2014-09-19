<?php

require_once("data/dbconfig.php");
require_once("entities/afwezigheid.php");

class afwezigheidDAO {
    public function create($id,$leerlingid,$datum) {
        $sql = "insert into afwezigheden (afwezigheidid,leerlingid,datum)
                values('".$id."','".$leerlingid."','".$datum."')";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $test = $dbh->exec($sql);
        return $test;
    }
}
