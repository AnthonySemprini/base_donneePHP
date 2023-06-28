<?php
ob_start();
?>


<form method="POST" action="index.php?action=ajoutFilm" >

                    <!--Titre-->

    <p>Titre</p>
    <input type="text" name="titre">
    <br>

                    <!--Note-->

    <p>Note</p>
    <input type="text" name="note">
    <br>

                    <!--Date-->

    <p>Date</p>
    <input type="date">
    <br>
    <br>

                    <!--Upload img-->
    <p>Affiche</p>
    <input type="file" name="img" id="img">
    <br>
                    <!--Synopsis-->

    <p>Synopsis</p>
    <input type="textarea" name="description">
    <br>

                    <!--Genre-->

    <p>Genre</p>
    <input type="checkbox" id="checkboxGenre">
    <label for="checkboxGenre">sf</label>
    <br>

                    <!--Durée-->

    <p>Durée</p>
    <input type="text" name="duree">
    <br>
    <br>

                    <!--Realisateur-->

    <select name="FilmRealisateur" id="FilmRealisateur">
        <option value="">Selectionner un Realisateur...</option>
        <?php
        foreach($requetRealisateur as $Realisateur){
        ?>
            <option value="<?= $Realisateur['id_Realisateur']?>"><?= $Realisateur['affiche_nom'] ?></option>
            <?php
            }
        ?>
    </select>
    <br>

                    <!--Acteur-->

    <select name="FilmActeur" id="FilmActeur">
        <option value="">Selectionner un Acteur...</option>
        <?php
        foreach($requetActeur as $acteur){
        ?>
            <option value="<?= $acteur['id_acteur']?>"><?= $acteur['titre']?></option>

            <?php
            }
        ?>
    </select>
    <br>

                    <!--role-->

    <select name="FilmRole" id="FilmRole">
        <option value="">Selectionner un role...</option>
        <?php
        foreach($requetRole as $role){
        ?>
            <option value="<?= $role['id_role']?>"><?= $role['nomRole'] ?></option>
            <?php
            }
        ?>
    </select>
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
