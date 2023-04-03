<?php
ob_start();
?>

    <p>Il y a <?= $requete->rowCount() ?> films</p>
    

    
    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Année de sortie</th>
            </tr>
        </thead>

        <?php
        foreach ( $requete->fetchAll() as $film) {
            ?>
            <tbody>
                <tr>
                    <td><a href='detail.php?id=<?= $film['id_film']; ?>'><?= $film['titre']; ?></a></td>
                    <td><?= $film['anneeSortie']; ?></td>
                </tr>
            </tbody>
        <?php
        }
        ?>
    </table>


    <?php
$titre = "Listes des films";
$titre_secondaire = "Liste des films";
$content = ob_get_clean();
require "template.php";
?>