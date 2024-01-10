<?php
require_once "model.class.php";
require_once "livre.class.php";

 class livremanager extends model{

    private $livres; //taleaux de livre 

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
            $l = new livre($livre["id"],$livre["titre"],$livre["nbPage"],$livre["images"]);
            $this->ajoutLivre($l);
            # code...
        }
     }

     public function getlivreByid($id){

        for ($i= 0; $i < count($this->livres); $i++){

            if($this->livres[$i]->getid() === $id){
                return $this->livres[$i];
            }

        }

     }
     public function ajoutLivreBd($titre,$nbpage,$image) {
        $req = " INSERT INTO livres (titre, nbPage, images) values(:titre, :nbpage,:images)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);
        $stmt->bindValue(":nbpage", $nbpage, PDO::PARAM_INT);
        $stmt->bindValue(":images", $image, PDO::PARAM_STR);
        $resultat =  $stmt->execute();
        $stmt->closeCursor();


        if($resultat > 0) {
            $livre = new livre($this->getBdd()->lastInsertId(),$titre, $nbpage, $image);
            $this->ajoutLivre($livre);
        }
     
      }

      public function suppressionLivreBD($id){
        $req = " DELETE FROM livres WHERE id = :idlivre";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idlivre", $id, PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) {
        $livre = $this->getlivreByid($id);
        unset($livre);
        }
         
      }
      public function modificationLivreBD($id,$titre,$nbpage,$image){
        $req = "UPDATE livres SET titre = :titre , nbPage = :nbpage, images = :images WHERE id= :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(":titre", $titre, PDO::PARAM_STMT);
        $stmt->bindValue(":nbpage", $nbpage, PDO::PARAM_INT);
        $stmt->bindValue(":images", $image, PDO::PARAM_STMT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if ($resultat > 0) {
            $this->getlivreByid($id)->settitre($titre);
            $this->getlivreByid($id)->settitre ($nbpage);
            $this->getlivreByid($id)->settitre($image);

        }

      }

    }
    



?>