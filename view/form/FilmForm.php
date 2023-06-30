<?php
ob_start();
?>


<form method="POST" action="index.php?action=ajoutFilm" >

                    <!--Titre-->

    <p>Titre</p>
    <input type="text" name="titre" id="titre">
    <br>

                    <!--Note-->

    <p>Note</p>
    <input type="text" name="note" id="note">
    <br>

                    <!--annee sortie-->

    <p>Annee de sortie</p>
    <input type="text" name="anneeSortie" id="anneesortie">
    <br>

                    <!--Upload img-->
    <p>Affiche</p>
    <label for="file"></label>
    <input type="file" name="affiche" id="affiche">
    <br>
                    <!--Synopsis-->

    <p>Synopsis</p>
    <input type="textarea" name="synopsis" id="synopsis">
    <br>

 
    <br>

                    <!--Durée-->

    <p>Durée</p>
    <input type="text" name="duree" id="duree">
    <br>
    <br>
        <!--Genre-->

        <p>Genre</p>
                    <?php
    foreach( $requetGenre as $genre){
        ?>
        <input type="checkbox" name="genres[]" value="<?= $genre['id_genre'] ?>"><label ><?= $genre['nomGenre']?></label>
        <?php
       //var_dump($genre);die;
    }
    ?>


                    <!--Realisateur-->

                    <p>Réalisteur</p>
    <select name="realisateur" id="realisateur" >
        <option value="">Selectionner un Realisateur...</option>
        <?php
        foreach($requetRealisateur as $Realisateur){
            //var_dump($requetRealisateur);die;
            ?>
            <option value="<?= $Realisateur['id_realisateur']?>"><?= $Realisateur['affiche_nom'] ?></option>
            <?php
            }
        ?>
    </select>
    <br>
    <br>
    
                    <!--Boutton envoyer-->

    <input type="submit" name="submit">
</form>

<?php
$titre = "Form Film";
$titre_secondaire = "Form Film";
$content = ob_get_clean();
require "view/template.php";
?>
