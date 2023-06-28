<?php
ob_start();
?>


<form method="POST" action="index.php?action=ajoutCasting" >
    
    
    <select name="castingActeur" id="castingActeur">
        <option value="">Selectionner un acteur...</option>
        <?php
        foreach($requetActeur as $acteur){
        ?>
            <option value="<?= $acteur['id_acteur']?>"><?= $acteur['affiche_nom'] ?></option>
            <?php
            }
        ?>
    </select>
    <select name="castingFilm" id="castingFilm">
        <option value="">Selectionner un film...</option>
        <?php
        foreach($requetFilm as $film){
        ?>
            <option value="<?= $film['id_film']?>"><?= $film['titre']?></option>

            <?php
            }
        ?>
    </select>
    <select name="castingRole" id="castingRole">
        <option value="">Selectionner un role...</option>
        <?php
        foreach($requetRole as $role){
        ?>
            <option value="<?= $role['id_role']?>"><?= $role['nomRole'] ?></option>
            <?php
            }
        ?>
    </select>
    
   
    <input type="submit" name="submit">
</form>

<?php
$titre = "Form Casting";
$titre_secondaire = "Form Casting";
$content = ob_get_clean();
require "view/template.php";
?>
