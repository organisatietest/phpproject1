<?php
class film {
    private $id;
    private $titel;
    private $duurtijd;
    
    public function __construct($id,$titel,$duurtijd) {
        $this->id=$id;
        $this->titel=$titel;
        $this->duurtijd=$duurtijd;
    }
    
    public function getID() {
        return $this->id;
    }
    
    public function gettitel() {
        return $this->titel;
    }
    
    public function getduurtijd(){
        return $this->duurtijd;
    }
}
class filmLijst {

    public function getLijst() {
        $lijst = array();
        $dbh = new PDO("mysql:host=localhost;dbname=cursusphp", "cursusgebruiker", "cursuspwd");
        $resultSet = $dbh->query("select id, titel, duurtijd
        from films");
        foreach ($resultSet as $rij) {
            $film = new film($rij["id"],$rij["titel"],$rij["id"]);
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
            $sql = "delete from films where id = ". $id;
            $dbh->exec($sql);
            $dbh = null;
    }

}

$filmlijst = new FilmLijst();
if (isset($_GET["new"]) && $_GET["new"] == "true") {
    $filmlijst->filmtoevoegen($_POST["filmnaam"], $_POST["tijd"]);
}
if (isset($_GET["action"]) && $_GET["action"] == "verwijder") {
$filmlijst->filmverwijderen($_GET["id"]);
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset=utf-8>
        <title>films</title>
    </head>
    <body>
        <h1>alle films</h1>
        <?php
        $tab = $filmlijst->getLijst();
        ?>
        <ul>
            <?php
            foreach ($tab as $film) {
                $filmNaam= $film->gettitel();
                $filmID= $film->getID();
                print("<li>" . $filmNaam . "   (<a href=\"h9opg3.php?action=verwijder&id="
                        . $filmID . "\">verwijderen</a>) </li>");
            }
            ?>
        </ul>
        <h1>Film toevoegen</h1>
        <form action="h9opg3.php?new=true" method="post">
            titel :
            <input type="text" name="filmnaam"><br>
            duurtijd:
            <input type="text" name="tijd">minuten<br>
            <input type="submit" value="toevoegen">
        </form>
    </body>
</html>