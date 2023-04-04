<?php
ob_start();
?>

<?php

$realisateurs = $requeteRealisateur->fetchAll();
    foreach($realisateurs as $realisateur){
        echo " ".$realisateur["prenom"]." ".$realisateur["nom"]." est une ".$realisateur["sexe"]." de ".$realisateur['age']." ans ";
    }
?>


<?php
$content = ob_get_clean();
$titre = "Detail realisateur";
$titre_secondaire = "Detail realisateur";
require "view/template.php";
?>