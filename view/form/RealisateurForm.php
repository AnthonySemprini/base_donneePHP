<?php
ob_start();
?>


<form method="POST" action="index.php?action=formRealisateur" >
    <p>Nom</p>
    <input type="text" name="nom">
    <br>
    <p>Prenom</p>
    <input type="text" name="prenom">
    <br>
    <p>Sexe</p>
    <select name="sexe" id="sexeSelect">
        <option value="">Selectionner...</option>
        <option value="Homme">Homme</option>
        <option value="Femme">Femme</option>
    </select>
    <P>Date de naissance</P>
    <input type="date" name="DateNaissance">
    <br>
    <br>
    <input type="submit" name="submit">
</form>

<?php
$titre = "Form Realisateur";
$titre_secondaire = "Form Realisateur";
$content = ob_get_clean();
require "view/template.php";
?>
 