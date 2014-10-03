<?php
class Film {
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
    
    public function settitel($titel) {
        $this->titel = $titel;
    }
    
    public function setduurtijd($duurtijd){
        $this->duurtijd = $duurtijd;
    }
}

