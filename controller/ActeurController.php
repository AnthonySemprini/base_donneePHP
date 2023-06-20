<?php

namespace Controller;
use Model\Connect;


class ActeurController{

 // ACTEUR

    public function listActeurs(){

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("SELECT a.id_acteur, CONCAT(p.prenom,' ' ,p.nom) AS nom, p.DateNaissance AS Date_de_naissance
            FROM acteur a
            INNER JOIN personne p ON a.id_personne = p.id_personne
            ORDER BY p.nom, p.prenom
        ");

        require "view/list/listActeurs.php";
    }

    public function detailActeur($id){
        $pdo = Connect:: seConnecter();
        $requeteActeur = $pdo->prepare("SELECT p.prenom, p.nom, ROUND(DATEDIFF( NOW(), p.DateNaissance)/365) AS age, p.sexe
        FROM acteur a 
        INNER JOIN personne p ON a.id_personne = p.id_personne 
        WHERE id_acteur = :id
        ");
        $requeteActeur->execute(["id"=>$id]);

        $requeteFilmo = $pdo->prepare("SELECT f.titre, f.anneeSortie, f.id_film
        FROM film f
        INNER JOIN casting c ON f.id_film = c.id_film
        WHERE id_acteur = :id");

        $requeteFilmo->execute(["id"=>$id]);
        require "view/detail/ActeurDetail.php";
    }
    };
    
