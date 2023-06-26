<?php
ob_start();
?>


<form method="POST" action="index.php?action=formCasting" >
    
    <select name="casting" id="sexeSelect">
        <option value="">Selectionner...</option>
       
        <option value="Femme">Femme</option>
    </select>
   
    <input type="submit" name="submit">
</form>

<?php
$titre = "Form Casting";
$titre_secondaire = "Form Casting";
$content = ob_get_clean();
require "view/template.php";
?>
 