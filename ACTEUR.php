<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Acteur</title>
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
    $listeActeurs = $mysqlConnection->prepare('SELECT p.nom, p.prenom, ROUND(DATEDIFF( NOW(), p.dateNaissance)/365) AS age, p.sexe
FROM acteur a 
INNER JOIN personne p ON a.id_personne = p.id_personne
');
    $listeActeurs->execute();
    $acteurs = $listeActeurs->fetchAll();



    ?>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Age</th>
                <th>Sexe</th>
            </tr>
        </thead>

        <?php
        foreach ($acteurs as $acteur) {
        ?>
            <tbody>
                <tr>
                    <td><?= $acteur['nom']; ?></td>
                    <td><?= $acteur["prenom"]; ?></td>
                    <td><?= $acteur['age']; ?></td>
                    <td><?= $acteur['sexe']; ?></td>
                </tr>
            </tbody>
        <?php
        }
        ?>
    </table>


</body>

</html>