<?php
ob_start();
?>

<?php
$film = $requeteFilm->fetch();
    echo $film['titre']."<br>";

$casting = $requeteCasting->fetchAll();
    foreach($casting as $cast){
        echo " ".$cast["nom"]." ".$cast["prenom"]." dans le role de ".$cast["nomRole"];
    }
?>


<?php
$content = ob_get_clean();
$titre = "Detail film";
$titre_secondaire = "Detail film";
require "view/template.php";
?>
