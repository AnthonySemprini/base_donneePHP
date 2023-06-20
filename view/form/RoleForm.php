<?php
ob_start();
?>


<form method="POST" action="index.php?action=formRole" >
    <input type="text" name="nomRole">
    <br>
    <input type="submit" name="submit">
</form>

<?php
$titre = "Form Role";
$titre_secondaire = "Form Role";
$content = ob_get_clean();
require "view/template.php";
?>