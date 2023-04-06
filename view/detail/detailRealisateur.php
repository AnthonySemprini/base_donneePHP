<?php
ob_start();
?>

<?php

$realisateur = $requeteRealisateur->fetchAll();
    ?>
        <p>est une <?=$realisateur[0]["sexe"]?> de <?=$realisateur[0]['age']?>ans </p>


   <?php 

    $filmRealisateurs = $requeteFilmoReal->fetchAll();
echo "Filmographie :<br>";
    foreach($filmRealisateurs as $filmRealisateur){
        ?>

         
         <a href='index.php?action=detailFilm&id=<?= $filmRealisateur['id_film']; ?>'><?= $filmRealisateur['titre']; ?></a><br>
    
    
    <?php }

$content = ob_get_clean();
$titre = $realisateur[0]["prenom"]." ".$realisateur[0]["nom"];
$titre_secondaire = $realisateur[0]["prenom"]." ".$realisateur[0]["nom"];
require "view/template.php";
?>