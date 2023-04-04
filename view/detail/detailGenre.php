<?php
ob_start();
?>

<?php

$genres = $requeteGenre->fetchAll();
    foreach($genres as $genre){
        echo $genre["nomGenre"]." ".$genre["titre"]."<br>";
    }
?>


<?php
$content = ob_get_clean();
$titre = "Detail genre";
$titre_secondaire = "Detail genre";
require "view/template.php";
?>