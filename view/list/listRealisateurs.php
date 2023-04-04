<?php
ob_start();
?>
   
   <p><p>Il y a <?= $requete->rowCount() ?> réaliteurs</p></p>
    
   
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de naissance</th>
            </tr>
        </thead>

        <?php
        foreach ($requete->fetchAll() as $realisateur) {
        ?>
            <tbody>
                <tr>
                    <td><a href='index.php?action=detailRealisateur&id=<?= $realisateur['id_realisateur'];?>'><?= $realisateur['Nom'];?></a></td>
                    <td><a href='index.php?action=detailRealisateur&id=<?= $realisateur['id_realisateur'];?>'><?= $realisateur['Prenom'];?></a></td>
                    <td><?= $realisateur['Date_de_naissance']; ?></td>
            </tbody>
        <?php
        }
        ?>
    </table>


    <?php
$content = ob_get_clean();
$titre ="Realisateurs";
$titre_secondaire = "Liste des realisateurs";
require "view/template.php";
?>