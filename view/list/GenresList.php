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
                    <td><a href='index.php?action=detailGenre&id=<?= $genre['id_genre']; ?>'><?= $genre['nomGenre']; ?></a></td>
                </tr>
            </tbody>
        <?php
        }
        ?>
       
    </table>
    <button><a href="index.php?action=formGenre">Ajouter genre</a></button>

    

    <?php
$titre = "Listes des genres";
$titre_secondaire = "Liste des genres";
$content = ob_get_clean();
require "view/template.php";
?>