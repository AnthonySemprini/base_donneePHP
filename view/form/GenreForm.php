<?php
ob_start();
?>


<form method="POST" action="">
    <input type="text" name="nomGenre">
    <br>
    <input type="submit">
</form>

<?php
$titre = "Form genre";
$titre_secondaire = "Form Genre";
$content = ob_get_clean();
require "view/template.php";
?>