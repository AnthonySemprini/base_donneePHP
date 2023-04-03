<?php
session_start();
ob_start();
?>

<?php
    try {
        // on se connecte à MySql
        $mysqlConnection = new PDO('mysql:host=localhost;dbname=cinema_anthony;charset=utf8', 'root', 'root');
    } catch (exception $e) {
        // En cas d'erreur, on affiche un message et on arréete tout
        die('Erreur :' . $e->getMessage());
    }

    // Si tout va bien on peut continuer

    // On recupere tt le contenue de la table film
    $listeFilms = $mysqlConnection->prepare("SELECT f.id_film, f.titre AS titre, DATE_FORMAT( SEC_TO_TIME(f.dureeMinutes*60) , '%H:%i') AS dureeHeureMinutes,f.affiche, p.nom, f.anneeSortie
FROM film f 
INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur 
INNER JOIN personne p ON r.id_personne = p.id_personne
WHERE id_film = :id");

$listeFilms->execute(['id'=>$_GET['id']]);
    $films = $listeFilms->fetchAll();

   
?>

<h1><?=$films[0]['titre'];?></h1>
<p><?=$films[0]['anneeSortie'];?></p>
<img src="<?=$films[0]['affiche'];?>">
<p><?=$films[0]['nom'];?></p>

<?php
$content = ob_get_clean();
$titre = "Detail";
require "template.php";
?>
