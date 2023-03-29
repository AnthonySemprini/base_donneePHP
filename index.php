<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    
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
$listeFilms = $mysqlConnection->prepare('SELECT * FROM film');
$listeFilms->execute();
$films = $listeFilms->fetchAll();



?>
<table>
    <thead>
        <tr>
            <th>Titre</th>
            <th>Durée</th>
            <th>Réalisateur</th>
            <th>Année de sortie</th>
        </tr>
    </thead>

    <?php
    foreach ($films as $film) {
    ?>
        <tbody>
            <tr>
                <td><?= $film['titre']; ?></td>
                <td><?= $film['dureeMinutes']; ?></td>
                <td><?= $film['id_realisateur']; ?></td>
                <td><?= $film['anneeSortie']; ?></td>
            </tr>
        </tbody>
</table>

<?php
    }
?>

</body>
</html>