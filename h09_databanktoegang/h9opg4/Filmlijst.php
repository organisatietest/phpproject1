<?php

require_once("Film.php");

class filmLijst {

    public function getLijst() {
        $lijst = array();
        $dbh = new PDO("mysql:host=localhost;dbname=cursusphp", "cursusgebruiker", "cursuspwd");
        $resultSet = $dbh->query("select id, titel, duurtijd
        from films");
        foreach ($resultSet as $rij) {
            $film = new film($rij["id"], $rij["titel"], $rij["id"]);
            array_push($lijst, $film);
        }
        $dbh = null;
        return $lijst;
    }

    public function filmtoevoegen($titel, $minuten) {
        if (is_numeric($minuten) && $minuten > 0 && !empty($titel)) {
            $dbh = new PDO("mysql:host=localhost;dbname=cursusphp", "cursusgebruiker", "cursuspwd");
            $sql = "insert into films (titel, duurtijd) values ('" .
                    $titel . "', " . $minuten . ")";
            $dbh->exec($sql);
            $dbh = null;
        } else {
            print("foute invoer bij titel of duurtijd");
        }
    }

    public function filmverwijderen($id) {
        $dbh = new PDO("mysql:host=localhost;dbname=cursusphp", "cursusgebruiker", "cursuspwd");
        $sql = "delete from films where id = " . $id;
        $dbh->exec($sql);
        $dbh = null;
    }

    public function getFilmById($id) {
        $sql = "select titel, duurtijd from films where id = " . $id;
        $dbh = new PDO("mysql:host=localhost;dbname=cursusphp", "cursusgebruiker", "cursuspwd");
        $resultSet = $dbh->query($sql);
        if ($resultSet) {
            $rij = $resultSet->fetch();
            if ($rij) {
                $film = new Film($id, $rij["titel"], $rij["duurtijd"]);
                $dbh = null;
                return $film;
            } else
                return false;
        } else
            return false;
    }

    public function updateFilms($film) {
        $sql = "update films set titel = '" .
        $film->gettitel() . "', duurtijd = " .
        $film->getduurtijd() . " where id = " .
        $film->getID();
        $dbh = new PDO("mysql:host=localhost;dbname=cursusphp", "cursusgebruiker", "cursuspwd");
        $dbh->exec($sql);
        $dbh = null;
    }

}

$filmLijst = new FilmLijst();
if (isset($_GET["new"]) && $_GET["new"] == "true") {
    $filmLijst->filmtoevoegen($_POST["filmnaam"], $_POST["tijd"]);
}
if (isset($_GET["action"]) && $_GET["action"] == "verwijder") {
    $filmLijst->filmverwijderen($_GET["id"]);
}
if (isset($_GET["action"]) && $_GET["action"] == "verwerk") {
    $film = new film($_GET["id"], $_POST["titel"], $_POST["duurtijd"]);
    $filmLijst->updateFilms($film);
    $updated = true;
}


