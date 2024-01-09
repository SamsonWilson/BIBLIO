<?php
require_once "model.class.php";
require_once "livre.class.php";

 class livremanager extends model{

    private $livres;

    public function ajoutLivre($livre){
        $this->livres[]= $livre;
    }

    public function getlivre(){
        return $this->livres;
    }

    public function chargementLivre(){
        $req = $this->getBdd()->prepare("SELECT * FROM livres");
        $req->execute();
        $meslivres=$req->fetchall(PDO::FETCH_ASSOC);
        $req->closeCursor();


        foreach ($meslivres as $livre){
            $l = new livre($livre["id"],$livre["titre"],$livre["nbPage"],$livre["image"]);
            $this->ajoutLivre($l);
            # code...
        }
     }
    }
    



?>