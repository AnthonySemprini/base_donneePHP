<?php
ob_start();
?>


<?php
$titre = "Form genre";
$titre_secondaire = "Form Genre";
$content = ob_get_clean();
require "view/template.php";
?>