<?php
ob_start();
?>
   
   <p>Il y a <?= $requete->rowCount() ?> acteurs</p>
    
   
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Date de naissance</th>
            </tr>
        </thead>

        <?php
        foreach ($requete->fetchAll() as $acteur) {
        ?>
            <tbody>
                <tr>
                    <td><a href='index.php?action=detailActeur&id=<?= $acteur['id_acteur'];?>'><?= $acteur['nom'];?></a></td>
                    
                    <td><?= $acteur['Date_de_naissance']; ?></td>
            </tbody>
        <?php
        }
        ?>
    </table>
    <button><a href="index.php?action=formActeur">Ajouter Acteur</a></button>



    <?php
$content = ob_get_clean();
$titre ="Acteur";
$titre_secondaire = "Liste des acteurs";
require "view/template.php";
?>