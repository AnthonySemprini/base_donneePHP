<?php
ob_start();
        $requeteRole= $requeteRole->fetchAll();

$role = $role->fetch()['nomRole'];
if(!empty($requeteRole)){
     
  $roles = $requeteRole; //var_dump($Roles);

      foreach($roles as $film){
          ?>
      <a href='index.php?action=detailFilm&id=<?= $film['id_film']; ?>'><?= $film['titre']; ?></a><br>
    <?php 
   }
    
    }else{
   echo "Le Role n'a aucun film attribué.";
   }

$content = ob_get_clean();
$titre = $role;
$titre_secondaire = "Les films attribué au de Role : ".$role;
require "view/template.php";
?>