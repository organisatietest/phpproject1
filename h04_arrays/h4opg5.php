<?php

class GetallenGenerator {

    public function getGetallen() {
        $j=0;
        $getallen = array();
        for ($i = 0; ($i < 200) and ($j<80); $i++) {
            $getallen[$i] =$j= rand(1, 100);
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