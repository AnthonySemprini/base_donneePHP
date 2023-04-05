<?php
ob_start();
?>

<?php
$films = $requeteFilm->fetchAll();
    foreach($films as $film){
        ?>

        <h2><?= $film['titre'] ?></h2><p> Note : <?= $film['note'] ?> /5 </p>
        <p>Annee sortie : <?= $film['anneeSortie'] ?></p>
        <p>Durée : <?= $film['dureeMinutes'] ?></p>
        <img src="<?=$film['affiche'] ?>" alt="affiche">
        <p><?= $film['synopsis'] ?></p>
        <p><?= $film['prenom'] ?> <a href='index.php?action=detailActeur&id=<?= $film['id_realisateur'];?>'><?= $film['nom'];?></a> </p>
        

    <?php ;} ?>

<?php
$casting = $requeteCasting->fetchAll();
?>

<p>Casting : </p>

<?php
    foreach($casting as $cast){
        ?>

        <p><?= $cast['prenom']?>  <a href='index.php?action=detailActeur&id=<?= $cast['id_acteur'];?>'><?= $cast['nom'];?></a> dans le role de <?= $cast["nomRole"] ?></p>
        

    <?php ;} ?>



<?php
$content = ob_get_clean();
$titre = "Detail film";
$titre_secondaire = "Detail film";
require "view/template.php";
?>
