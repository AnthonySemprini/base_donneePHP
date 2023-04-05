<?php
ob_start();
?>

<?php

$acteurs = $requeteActeur->fetchAll();
    foreach($acteurs as $acteur){
        ?>

       <p> <?= $acteur["prenom"]." ".$acteur["nom"] ?> est une <?= $acteur["sexe"] ?> de <?= $acteur['age']?> ans</p>

<?php ;} 


$filmActeurs = $requeteFilmo->fetchAll();
        ?>

        <p>Filmographie :</p>

<?php
    foreach($filmActeurs as $filmActeur){
        ?>

        
        <a href='index.php?action=detailFilm&id=<?= $filmActeur['id_film']; ?>'><?= $filmActeur['titre']; ?></a><br>

    <?php ;}

$content = ob_get_clean();
$titre = "Detail acteur";
$titre_secondaire = "Detail acteur";
require "view/template.php";
?>
