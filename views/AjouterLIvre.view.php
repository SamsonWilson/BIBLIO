<?php 
ob_start()
?>

<form method="POST" action="<?= URL ?>livres/av" enctype="multipart/form-data">
  <div class="form-group">
    <label for="Titre">Titre</label>
    <input type="text" class="form-control" id="titre" name="titre">
  </div>
  <div class="form-group">
    <label for="nbpage">Nombre de page </label>
    <input type="text" class="form-control" id="nbpage" name="nbpage">
  </div>
  
  <div class="form-group">
    <label for="eimage"> Images </label>
    <input type="file" class="form-control-file" id="image" name="image">
  </div>


  <button type="submit" class="btn btn-primary"> Valider </button>
</form>

<?php
$content = ob_get_clean();
$titre = " Ajout d'un livre ";
require "template.php";
?> 