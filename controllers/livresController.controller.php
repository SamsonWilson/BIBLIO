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

    public function AffficherLivre($id){  
        $livre = $this->livreManager->getlivreByid($id);
       require "views/afficherLivre.view.php"; 
    }
    public function AjouterLivre(){
        require "views/AjouterLIvre.view.php";
    }

    public function ajoutLivreValidation(){
        $file = $_FILES['image'];
      $repertoie = "public/image/";
      $nomImageAjoute = $this->ajoutImage($file,$repertoie);
      $this->livreManager->ajoutLivreBd($_POST["titre"],$_POST["nbpage"],$nomImageAjoute);

      $_SESSION["alert"] = [
        'type' => 'suces',
        'msg' => 'Ajout de livre'
      ];
      header('location: '. URL . "livres");
}


    public function supprimerLivre($id){
         $nomImage = $this->livreManager->getlivreByid($id)->getimage();
         unlink("public/image/". $nomImage);
         $this->livreManager->suppressionLivreBD($id);

         $_SESSION["alert"] = [
            'type' => 'suces',
            'msg' => 'la suppression a été realiser'
          ];

         header('location: '. URL . "livres");

    }
    public function modificationLivres($id){

        $livre = $this->livreManager->getlivreByid($id);
        require "views/modifierLivre.view.php";
    
    }
    public function modificationLivreValidation(){
        $imageActuelle = $this->livreManager->getlivreByid($_POST["identifiant"])->getimage();
        $file = $_FILES['image'];
    
        if($file['size'] > 0){

            unlink("public/image/".$imageActuelle);
            $repertoie = "public/image/";
            $nomImageToAdd = $this->ajoutImage($file,$repertoie);
        }else{
            $nomImageToAdd = $imageActuelle;
        }
        $this->livreManager->modificationLivreBD($_POST['identifiant'],$_POST['titre'], $_POST['nbpage'],$nomImageToAdd);

        $_SESSION["alert"] = [
            'type' => 'suces',
            'msg' => 'modification realisée'
          ];

        header('location: '. URL . "livres");
    }

private function ajoutImage($file, $dir){
    if(!isset($file['name']) || empty($file['name']))
        throw new Exception("Vous devez indiquer une image");

    if(!file_exists($dir)) mkdir($dir,0777);

    $extension = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
    $random = rand(0,99999);
    $target_file = $dir.$random."_".$file['name'];
    
    if(!getimagesize($file["tmp_name"]))
        throw new Exception("Le fichier n'est pas une image");
    if($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif")
        throw new Exception("L'extension du fichier n'est pas reconnu");
    if(file_exists($target_file))
        throw new Exception("Le fichier existe déjà");
    if($file['size'] > 500000)
        throw new Exception("Le fichier est trop gros");
    if(!move_uploaded_file($file['tmp_name'], $target_file))
        throw new Exception("l'ajout de l'image n'a pas fonctionné");
    else return ($random."_".$file['name']);
}



}



?>