<?php
ob_start();
?>


<form method="POST" action="index.php?action=formGenre" >
    <input type="text" name="nomGenre">
    <br>
    <input type="submit" name="submit">
</form>

<?php
$titre = "Form genre";
$titre_secondaire = "Form Genre";
$content = ob_get_clean();
require "view/template.php";
?>
 