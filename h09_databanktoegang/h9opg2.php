<?php

class filmLijst {

    public function getLijst() {
        $lijst = array();
        $dbh = new PDO("mysql:host=localhost;dbname=cursusphp", "cursusgebruiker", "cursuspwd");
        $resultSet = $dbh->query("select titel, duurtijd
        from films");
        foreach ($resultSet as $rij) {
            $naam = $rij["titel"] . " (" . $rij["duurtijd"] . ")";
            array_push($lijst, $naam);
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

}

$filmlijst = new FilmLijst();
if (isset($_GET["new"]) && $_GET["new"] == "true") {
    $filmlijst->filmtoevoegen($_POST["filmnaam"], $_POST["tijd"]);
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
            foreach ($tab as $naam) {
                print("<li>" . $naam . "</li>");
            }
            ?>
        </ul>
        <h1>Film toevoegen</h1>
        <form action="h9opg2.php?new=true" method="post">
            titel :
            <input type="text" name="filmnaam"><br>
            duurtijd:
            <input type="text" name="tijd">minuten<br>
            <input type="submit" value="toevoegen">
        </form>
    </body>
</html>