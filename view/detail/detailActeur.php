<?php
ob_start();
?>

<?php

$acteurs = $requeteActeur->fetchAll();
    foreach($acteurs as $acteur){
        echo " ".$acteur["prenom"]." ".$acteur["nom"]." est une ".$acteur["sexe"]." de ".$acteur['age']." ans ";
    }
?>


<?php
$content = ob_get_clean();
$titre = "Detail acteur";
$titre_secondaire = "Detail acteur";
require "view/template.php";
?>