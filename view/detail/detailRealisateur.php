<?php
ob_start();
?>

<?php

$realisateurs = $requeteRealisateur->fetchAll();
    foreach($realisateurs as $realisateur){
        ?>
        <p> <?=$realisateur["prenom"]." ".$realisateur["nom"]?> est une <?=$realisateur["sexe"]?> de <?=$realisateur['age']?>ans </p>


   <?php }

    $filmRealisateurs = $requeteFilmoReal->fetchAll();
echo "Filmographie :<br>";
    foreach($filmRealisateurs as $filmRealisateur){
        ?>

         
         <a href='index.php?action=detailFilm&id=<?= $filmRealisateur['id_film']; ?>'><?= $filmRealisateur['titre']; ?></a><br>
    
    
    <?php }

$content = ob_get_clean();
$titre = "Detail realisateur";
$titre_secondaire = "Detail realisateur";
require "view/template.php";
?>