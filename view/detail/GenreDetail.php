<?php
ob_start();
?>

<?php

$genres = $requeteGenre->fetchAll(); 
    foreach($genres as $genre){
        ?>

      
      <a href='index.php?action=detailFilm&id=<?= $genre['id_film']; ?>'><?= $genre['titre']; ?></a><br>

   <?php  }

$content = ob_get_clean();
$titre = $genre['nomGenre'];
$titre_secondaire = "Les films de genre : ".$genre['nomGenre'];
require "view/template.php";
?>