<?php
ob_start();
?>

<?php
$films = $requeteFilm->fetchAll();
    foreach($films as $film){
        ?>

        <p> Note : <?= $film['note'] ?> /5 </p>
        <p>Annee sortie : <?= $film['anneeSortie'] ?></p>
        <p>Durée : <?= $film['dureeMinutes'] ?></p>
        <img src="<?=$film['affiche'] ?>" alt="affiche">
        <p><?= $film['synopsis'] ?></p>
        <p> <a href='index.php?action=detailRealisateur&id=<?= $film['id_realisateur'];?>'><?= $film['nomReal'];?></a> </p>
        

    <?php ;} ?>

<?php
$casting = $requeteCasting->fetchAll();
?>

<p>Casting : </p>

<?php
    foreach($casting as $cast){
        ?>

        <p><?= $cast['prenom']?>  <a href='index.php?action=detailActeur&id=<?= $cast['id_acteur'];?>'><?= $cast['nom'];?></a> dans le role de 
        <a href='index.php?action=detailRole&id=<?= $cast['id_role'];?>'><?= $cast['nomRole'];?></a></p>
        

    <?php ;} ?>



<?php
$content = ob_get_clean();
$titre = $film['titre'];
$titre_secondaire = $film['titre'];
require "view/template.php";
?>
