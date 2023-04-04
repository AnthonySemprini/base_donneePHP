<?php
ob_start();
?>
   
   <p>Il y a <?= $requete->rowCount() ?> acteurs</p>
    
   
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de naissance</th>
            </tr>
        </thead>

        <?php
        foreach ($requete->fetchAll() as $acteur) {
        ?>
            <tbody>
                <tr>
                    <td><a href='index.php?action=detailActeur&id=<?= $acteur['id_acteur'];?>'><?= $acteur['Nom'];?></a></td>
                    <td><a href='index.php?action=detailActeur&id=<?= $acteur['id_acteur'];?>'><?= $acteur['Prenom'];?></a></td>
                    <td><?= $acteur['Date_de_naissance']; ?></td>
            </tbody>
        <?php
        }
        ?>
    </table>


    <?php
$content = ob_get_clean();
$titre ="Acteur";
$titre_secondaire = "Liste des acteurs";
require "view/template.php";
?>