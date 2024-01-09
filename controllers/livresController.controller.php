<?php
require_once "models/livremanager.class.php";

class LivresController{
    private $livreManager;



    public function __construct(){
       
        $this->livreManager = new livremanager;
        $this->livreManager->chargementLivre();
    }

    public function AffficherLivres(){
        $livres= $this->livreManager->getlivre();
        require "views/livre.view.php";
    }
}



?>