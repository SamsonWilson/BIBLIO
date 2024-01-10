<?php
define("URL",str_replace("index.php","",(isset($_SERVER['HTTPS'])? "https" : "http")."://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));
require_once "controllers/livresController.controller.php";
$livreController = new LivresController;
try {
if (empty($_GET['page'])) {
    require "views/Accueil.view.php";
}else{
    $url = explode("/",filter_var($_GET['page']), FILTER_SANITIZE_URL);
    switch($url[0]){
        case 'accueil': require "views/Accueil.view.php";
        break;
        case "livres" :
            if (empty($url[1])){
                $livreController->AffficherLivres();
            } else if ($url[1]   === "l"){
                //echo " affichage d'un livre ";
               $livreController->AffficherLivre($url[2]);
            }
            else if ($url[1]=== "a"){
                //Ajoutrer un livre
                $livreController->AjouterLivre();
            }
            else if ($url[1]=== "av"){
                //Ajoutrer un livre
                $livreController->ajoutLivreValidation();
            }
            else if ($url[1]=== "s"){
                //supprimer un livre
                //echo $url[2];
                $livreController->supprimerLivre($url[2]);
            }
            else if ($url[1]=== "m"){
                //Modification d'un livre modificationLivres
                $livreController->modificationLivres($url[2]);
               
            }
            else if ($url[1]=== "mv"){
                //Modification d'un livre modificationLivres
                $livreController->modificationLivreValidation();
               
            }
            else{
                throw new Exception("la page n'existe pages ");
            }
        break; 
        default: throw new Exception("la page n'existe pages ");  
        
    }
}
}catch(Exception $e){
echo $e->getMessage();
}
?>