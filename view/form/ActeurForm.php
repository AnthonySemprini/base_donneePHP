<?php
ob_start();
?>


<form method="POST" action="index.php?action=formActeur" >
    <p>Nom</p>
    <input type="text" name="nomActeur">
    <br>
    <p>Prenom</p>
    <input type="text" name="prenomActeur">
    <br>
    <p>Sexe</p>
    <select name="sexe" id="sexeSelect">
        <option value="">Selectionner...</option>
        <option value="Homme">Homme</option>
        <option value="Femme">Femme</option>
    </select>
    <P>Date de naissance</P>
    <input type="date" name="dateAnnivActeur">
    <br>
    <br>
    <input type="submit" name="submit">
</form>

<?php
$titre = "Form Acteur";
$titre_secondaire = "Form Acteur";
$content = ob_get_clean();
require "view/template.php";
?>
 