<?php
ob_start();
?>

<?php

$roles = $requeteRole->fetchAll();
    foreach($roles as $role){
        echo $role["nomRole"]." est joué par ".$role["prenom"]." ".$role["nom"]." dans ".$role['titre']."<br>";
    }
?>


<?php
$content = ob_get_clean();
$titre = "Detail role";
$titre_secondaire = "Detail role";
require "view/template.php";
?>