<?php

require_once ("data/afwezigheidDAO.php");

class afwezigheidservice {
    public function voegNieuwAfwezigheidToe($leerlingid,$datum){
        $afwezigheidDAO= new afwezigheidDAO();
        return $afwezigheidDAO->create("",$leerlingid,$datum);
    }
}
