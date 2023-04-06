<?php
ob_start();
?>

<?php

$acteurs = $requeteActeur->fetchAll();
    foreach($acteurs as $acteur){
        ?>

       <p> est une <?= $acteur["sexe"] ?> de <?= $acteur['age']?> ans</p>

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
$titre = $acteur['prenom']." ".$acteur['nom'];
$titre_secondaire = $acteur['prenom']." ".$acteur['nom'];
require "view/template.php";
?>
