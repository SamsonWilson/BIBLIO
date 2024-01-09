<?php
require_once "controllers/livresController.controller.php";
$livreController = new LivresController;

if (empty($_GET['page'])) {
    require "views/Accueil.view.php";
}else{
    switch($_GET['page']){
        case 'accueil': require "views/Accueil.view.php";
        break;
        case "livres" : $livreController->AffficherLivres();
        break; 
        
    }
}
?>