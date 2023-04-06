<?php
ob_start();
?>

<?php
$film = $requeteFilm->fetchAll();
        ?>

        <p> Note : <?= $film[0]['note'] ?> /5 </p>
        <p>Annee sortie : <?= $film[0]['anneeSortie'] ?></p>
        <p>Durée : <?= $film[0]['dureeMinutes'] ?></p>
        <img src="<?=$film[0]['affiche'] ?>" alt="affiche">
        <p><?= $film[0]['synopsis'] ?></p>
        <p> <a href='index.php?action=detailRealisateur&id=<?= $film[0]['id_realisateur'];?>'><?= $film[0]['nomReal'];?></a> </p>


<?php 


foreach ($film as $genre){  ?>

        <a href="index.php?action=detailGenre&id=<?= $genre["id_genre"] ?>"> <?= $genre["nomGenre"] ?><br> </a>

<?php } ?>

<?php
$casting = $requeteCasting->fetchAll();
?>

<p>Casting : </p>

<?php
    foreach($casting as $cast){
        ?>

        <p><a href='index.php?action=detailActeur&id=<?= $cast['id_acteur'];?>'><?= $cast['nom'];?></a> dans le role de 
        <a href='index.php?action=detailRole&id=<?= $cast['id_role'];?>'><?= $cast['nomRole'];?></a></p>
        

    <?php } ?>



<?php
$content = ob_get_clean();
$titre = $film[0]['titre'];
$titre_secondaire = $film[0]['titre'];
require "view/template.php";
?>
