<?php

class modulesophalen {

    public function getmodules() {
        $lijst = array();
        $dbh = new PDO("mysql:host=localhost;dbname=cursusphp", "cursusgebruiker", "cursuspwd");
        $dbh->query("set names utf8");
$sql = "select naam, prijs from modules where prijs >= " . $_GET["minimumprijs"] . 
					" and prijs <= " . $_GET["maximumprijs"] . " order by prijs";
        $resultSet = $dbh->query($sql);
        foreach ($resultSet as $rij) {
            $module = $rij["naam"] . " (" . $rij["prijs"] . "euro)";
            array_push($lijst, $module);
        }
        $dbh = null;
        return $lijst;
    }

}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset=utf-8>
        <title>modules</title>
    </head>
    <body>
        <h1>Zoekresultaat</h1><br>
        <?php
        $zoek = new modulesophalen();
        $tab = $zoek->getmodules();
        ?>
        <ul>
            <?php
            foreach ($tab as $module) {
                print("<li>" . $module . "</li>");
            }
            ?>
        </ul>

    </body>
</html>