<?php
ob_start();
?>

<?php

$acteur = $requeteActeur->fetchAll();
    
        ?>

       <p> est une <?= $acteur[0]["sexe"] ?> de <?= $acteur[0]['age']?> ans</p>

 

<?php
$filmActeurs = $requeteFilmo->fetchAll();
        ?>

        <p>Filmographie :</p>

<?php
    foreach($filmActeurs as $filmActeur){
        ?>

        
        <a href='index.php?action=detailFilm&id=<?= $filmActeur['id_film']; ?>'><?= $filmActeur['titre']; ?></a><br>

    <?php ;}

$content = ob_get_clean();
$titre = $acteur[0]['prenom']." ".$acteur[0]['nom'];
$titre_secondaire = $acteur[0]['prenom']." ".$acteur[0]['nom'];
require "view/template.php";
?>
