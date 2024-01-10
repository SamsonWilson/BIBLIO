<?php ob_start();

if(!empty($_SESSION['alert'])) :
?>
<div class="alert alert-<?=$_SESSION['alert']['type']?>" role="alert">
<?= $_SESSION['alert']['msg'] ?>
</div>

<?php
unset($_SESSION['alert']);
?>

<?php endif; ?>



<table class="table text-center  table-light">
    <tr class="table-dark">
        <th> image </th>
        <th> Titre </th>
        <th> Nombre de page </th>
        <th colspan="2"> Actions </th>

    </tr>

    <?php  
     for ( $i=0 ;$i < count($livres);$i++):
     ?>
    <tr>
        <td class="align-middle"> <img src="public/image/<?= $livres[$i]->getimage()?>" width="60px" alt=""></td>
        <td class="align-middle"><a href="<?= URL ?>livres/l/<?= $livres[$i]->getid()?>"><?= $livres[$i]->gettitre()?> </a> </td>
        <td class="align-middle"><?= $livres[$i]->getnbPage()?></td>
        <td class="align-middle"><a href="<?= URL ?>livres/m/<?=$livres[$i]->getId(); ?>" class="btn btn-warning">Modifier</a></td>
        <td class="align-middle"> 
            <form method="POST" action="<?= URL ?>livres/s/<?=$livres[$i]->getId(); ?>" onsubmit="return confirm('voulez-vous vraiment suprimer le livre ?');">
            <button class="btn btn-danger" type="submit"> Supprimer </button> 
        </form>

        </td>
    </tr>

    <?php endfor ?>
</table>

<a href="<?= URL ?>livres/a" class="btn btn-success d-block"> Ajouter</a>

<?php
$content = ob_get_clean();
$titre = " les lives de la Bibliothéque" ;
require "template.php";
?>