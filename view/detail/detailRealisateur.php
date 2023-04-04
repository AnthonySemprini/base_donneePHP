<?php
ob_start();
?>

<?php

$realisateurs = $requeteRealisateur->fetchAll();
    foreach($realisateurs as $realisateur){
        echo " ".$realisateur["prenom"]." ".$realisateur["nom"]." est une ".$realisateur["sexe"]." de ".$realisateur['age']." ans ";
    }

    $filmRealisateurs = $requeteFilmoReal->fetchAll();
echo " qui a réalisé :<br>";
    foreach($filmRealisateurs as $filmRealisateur){
        echo $filmRealisateur["titre"]."<br>";
    }
?>


<?php
$content = ob_get_clean();
$titre = "Detail realisateur";
$titre_secondaire = "Detail realisateur";
require "view/template.php";
?>