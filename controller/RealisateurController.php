<?php

namespace Controller;
use Model\Connect;


class RealisateurController{

 // REALISATEUR

    public function listRealisateurs(){

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("SELECT r.id_realisateur,CONCAT(p.prenom,' ' ,p.nom) AS nom, p.DateNaissance AS Date_de_naissance
            FROM realisateur r
            INNER JOIN personne p ON r.id_personne = p.id_personne
            ORDER BY p.nom, p.prenom
        ");

        require "view/list/listRealisateurs.php";
    }

    public function detailrealisateur($id){
        $pdo = Connect:: seConnecter();
        $requeteRealisateur = $pdo->prepare("SELECT p.prenom, p.nom, ROUND(DATEDIFF( NOW(), p.DateNaissance)/365) AS age, p.sexe
        FROM realisateur r
        
        INNER JOIN personne p ON r.id_personne = p.id_personne 
        WHERE r.id_realisateur = :id
        ");
        $requeteRealisateur->execute(["id"=>$id]);

        $requeteFilmoReal = $pdo->prepare("SELECT *
        FROM film f
        WHERE id_realisateur = :id");
        $requeteFilmoReal->execute(["id"=>$id]);

        require "view/detail/detailrealisateur.php";
    }
}