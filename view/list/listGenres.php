<?php
ob_start();
?>

    <p>Il y a <?= $requete->rowCount() ?> genres</p>
    

    
    <table>
        <thead>
            <tr>
                <th>Genre</th>
            </tr>
        </thead>

        <?php
        foreach ( $requete->fetchAll() as $genre) {
            ?>
            <tbody>
                <tr>
                    <td><a href='detail.php?id=<?= $genre['id_genre']; ?>'><?= $genre['nomGenre']; ?></a></td>
                </tr>
            </tbody>
        <?php
        }
        ?>
    </table>


    <?php
$titre = "Listes des genres";
$titre_secondaire = "Liste des genres";
$content = ob_get_clean();
require "view/template.php";
?>