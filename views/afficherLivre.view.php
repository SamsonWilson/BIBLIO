<?php 
ob_start()
?>


<div class="row">
    <div class="col-6">
        <img src="<?= URL ?>public/image/<?= $livre->getimage();?>">
    </div>
<div class="col-6">
    <p>Titre : <?= $livre->gettitre(); ?> </p>
    <p>Nombre de pages : <?= $livre->getnbPage(); ?> </p>
</div>
</div>

<?php
$content = ob_get_clean();
$titre = $livre->gettitre();
require "template.php";
?>