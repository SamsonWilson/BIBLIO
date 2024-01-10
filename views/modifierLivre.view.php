<?php 
ob_start()
?>

<form method="POST" action="<?= URL ?>livres/mv" enctype="multipart/form-data">
  <div class="form-group">
    <label for="Titre">Titre</label>
    <input type="text" class="form-control" id="titre" name="titre" value="  <?= $livre->gettitre(); ?> ">
  </div>
  <div class="form-group">
    <label for="nbpage">Nombre de page </label>
    <input type="text" class="form-control" id="nbpage" name="nbpage" value="  <?= $livre->getnbPage(); ?> ">
  </div>
  <h3>Image :</h3>
  <img src="<?= URL ?>public/image/<?=$livre->getimage()?>" alt="">
  <div class="form-group">
    <label for="eimage"> changer l'images  </label>
    <input type="file" class="form-control-file" id="image" name="image">
  </div>
  <input type="hidden" name="identifiant" id="" value="<?= $livre->getId();?>">
  <button type="submit" class="btn btn-primary"> Valider </button>
</form>

<?php
$content = ob_get_clean();
$titre = " modification du Livre : ".$livre->getId();
require "template.php";
?>