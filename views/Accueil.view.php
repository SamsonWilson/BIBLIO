<?php 
ob_start()
?>

ici ma page d'Accueil

<?php
$content = ob_get_clean();
$titre = " Bibliotheque MGA ";
require "template.php";
?>