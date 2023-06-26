<?php
ob_start();
        $requeteGenre= $requeteGenre->fetchAll();

$genre = $genre->fetch()['nomGenre'];
if(!empty($requeteGenre)){
     
  $genres = $requeteGenre; //var_dump($genres);

      foreach($genres as $film){
          ?>
      <a href='index.php?action=detailFilm&id=<?= $film['id_film']; ?>'><?= $film['titre']; ?></a><br>
    <?php 
   }
    
    }else{
   echo "Le Genre n'a aucun film attribué.";
   }

$content = ob_get_clean();
$titre = $genre;
$titre_secondaire = "Les films de genre : ".$genre;
require "view/template.php";
?>