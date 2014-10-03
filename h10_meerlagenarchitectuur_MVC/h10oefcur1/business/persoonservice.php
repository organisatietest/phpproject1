<?php

require_once("data/persoonDAO.php");

class PersoonService {

    public function getPersonenOverzicht() {
        $pDAO = new PersoonDAO();
        $personen = $pDAO->getAll();
        return $personen;
    }

}
