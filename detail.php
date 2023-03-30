<?php
session_start();
ob_start();
?>

<div class="ficheFilm">
    <div class="imgFilm">
        <img>
    </div>
    <div class="partiTexte">
        <div class="info">
            <h2>Titre film</h2>
            <span>Date sortie</span>
        </div>
        <p>Synopsis</p>
    </div>
</div>

<?php
$content = ob_get_clean();
require "template.php";
?>