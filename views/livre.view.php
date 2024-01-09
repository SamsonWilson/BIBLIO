<?php ob_start()?>


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
        <td class="align-middle"><?= $livres[$i]->gettitre()?> </td>
        <td class="align-middle"><?= $livres[$i]->getnbPage()?></td>
        <td class="align-middle"><a href="" class="btn btn-warning">Modifier</a></td>
        <td class="align-middle"> <a href="" class="btn btn-danger">Sup rimer</a></td>
    </tr>

    <?php endfor ?>
</table>

<a href="" class="btn btn-success d-block"> Ajouter</a>

<?php
$content = ob_get_clean();
$titre = " les lives de la Bibliothéque" ;
require "template.php";
?>