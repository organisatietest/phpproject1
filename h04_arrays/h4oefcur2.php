<?php

class GetallenGenerator {

    public function getGetallen() {
        $getallen = array();
        for ($i = 0; $i < 20; $i++) {
            $getallen[$i] = rand(1, 100);
        }
        return $getallen;
    }

}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset=utf-8>
        <title>Hello world</title>
    </head>
    <body>
        <ul>
            <?php
            $gg = new GetallenGenerator();
            $tabel = $gg->getGetallen();
            $tabelgrootte = count($tabel);
            for ($k = 0; $k < $tabelgrootte; $k++) {
                print("<li>" . $tabel[$k] . "</li>");
            }
            ?>
        </ul>
    </body>
</html>