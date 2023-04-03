<?php
ob_start();
?>

    <p>Il y a <?= $requete->rowCount() ?> roles</p>
    

    
    <table>
        <thead>
            <tr>
                <th>Role</th>
            </tr>
        </thead>

        <?php
        foreach ( $requete->fetchAll() as $role) {
            ?>
            <tbody>
                <tr>
                    <td><a href='detail.php?id=<?= $role['id_role']; ?>'><?= $role['nomRole']; ?></a></td>
                </tr>
            </tbody>
        <?php
        }
        ?>
    </table>


    <?php
$titre = "Listes des roles";
$titre_secondaire = "Liste des roles";
$content = ob_get_clean();
require "view/template.php";
?>