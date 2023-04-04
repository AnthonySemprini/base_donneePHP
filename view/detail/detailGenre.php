<?php
ob_start();
?>

<?php

$genres = $requeteGenre->fetchAll(); 
    foreach($genres as $genre){
        echo $genre["titre"]."<br>";
    }
?>


<?php
$content = ob_get_clean();
$titre = $genre['nomGenre'];
$titre_secondaire = "Les films de genre : ".$genre['nomGenre'];
require "view/template.php";
?>