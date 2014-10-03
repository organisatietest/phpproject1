<?php
class GetallenGenerator {

    public function getGetallen() {
        $getallen = array();
        for ($i = 0; $i < 100; $i++) {
            $getallen[$i] = rand(1, 40);
        }
        return $getallen;
    }

}

class arrayaanvullen {

    public function getArraygevuld($array1) {
        $array = array();
        $BOol=FALSE;
//        for ($j = 0; ($j < 40) && (array1[$j]<1); $j++)
        for ($j = 0; ($j < 41) ; $j++) {
            if(($BOol=array_key_exists($j, $array1))){
              $array[$j] = 0;  
            }
        }
        for ($k = 0; ($k < 41); $k++) {
            if( array_key_exists($k, $array1)){
                $array[$k] = $array1[$k];
            }
        }
        return $array;
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
            $get = new GetallenGenerator();
            $randomgetallen = $get->getGetallen();
            $tabel1 = array_count_values($randomgetallen);
            $get1 = new arrayaanvullen();
            $tabel= $get1->getArraygevuld($tabel1);
            foreach ($tabel as $sleutel => $waarde) {
                print("<li>");
                print("Getal ");
                print($sleutel);
                print(" werd ");
                print($waarde);
                print(" keer gegenereerd.");
                print("</li>");
            }
            ?>
        </ul>
    </body>