<?php
session_start();

class Casino {

    public function getGokResultaat($mijnGok) {
// De inhoud van gokresultaat is 0 als het getal
// gevonden is, 1 als de gok te groot was, en -1 als de
// gok te klein was.
        if (!isset($_SESSION["teRadenGetal"])) {
            $_SESSION["teRadenGetal"] = rand(1, 100);
        }
        if ($mijnGok == $_SESSION["teRadenGetal"]) {
            $gokResultaat = 0;
            unset($_SESSION["teRadenGetal"]);
        } elseif ($mijnGok < $_SESSION["teRadenGetal"]) {
            $gokResultaat = -1;
        } else {
            $gokResultaat = 1;
        }
        return $gokResultaat;
    }

}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset=utf-8>
        <title>Juist gegokt?</title>
    </head>
    <body>
        <?php
        $gok = $_GET["gok"];
        $casino = new Casino();
        $resultaat = $casino->getGokResultaat($gok);
        if ($resultaat == 0) {
            print("Getal is geraden!");
        } elseif ($resultaat == -1) {
            print("Uw gok is te klein");
        } else {
            print("Uw gok is te groot");
        }
        ?>
        <br><br>
        <a href="getalradenform.php">Nog eens proberen</a>
    </body>
</html>