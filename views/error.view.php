<?php 
ob_start()
?>

<?php $msg;?>

<?php
$content = ob_get_clean();
$titre = " erreur !!! ";
require "template.php";
?>