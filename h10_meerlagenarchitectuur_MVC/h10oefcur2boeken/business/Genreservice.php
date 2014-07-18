<?php

require_once("data/genredao.php");

class Genreservice {

    public function getGenresOverzicht() {
        $genreDAO = new GenreDAO();
        $lijst = $genreDAO->getAll();
        return $lijst;
    }

}
