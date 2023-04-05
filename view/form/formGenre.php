<?php
ob_start();
?>

<?php





$content = ob_get_clean();
$titre = "Form genre";
$titre_secondaire = "Form Genre";
require "view/template.php";
?>