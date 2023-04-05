<?php
ob_start();
?>

<?php

$roles = $requeteRole->fetchAll();
?>
    <p>est joué par : </p>
<?php
    foreach($roles as $role){
        ?>

       <p><a href='index.php?action=detailActeur&id=<?= $role['id_acteur'];?>'><?= $role['nom'];?></a> dans 
       <a href='index.php?action=detailFilm&id=<?= $role['id_role']; ?>'><?= $role['titre']; ?></a></p><br>

  <?php  }

$content = ob_get_clean();
$titre = $role['nomRole'];
$titre_secondaire = $role['nomRole'];
require "view/template.php";
?>