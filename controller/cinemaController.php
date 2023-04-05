<?php

namespace Controller;
use Model\Connect;
include "model/model.php";

class CinemaController{


    
    // FILM

    public function listFilms(){

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("SELECT id_film, titre, anneeSortie
            FROM film
            ORDER BY anneeSortie DESC
        ");

        require "view/list/listFilms.php";
    }

    public function detailFilm($id){
        $pdo = Connect :: seConnecter();
        $requeteFilm = $pdo->prepare("SELECT *, p.nom, p.prenom
        FROM film f 
        INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur
        INNER JOIN personne p ON r.id_personne = p.id_personne
        WHERE id_film = :id");
        $requeteFilm->execute(["id"=>$id]);

        $requeteCasting = $pdo->prepare("SELECT *
        FROM casting c
        INNER JOIN role r ON c.id_role = r.id_role
        INNER JOIN acteur a ON c.id_acteur = a.id_acteur 

        INNER JOIN personne p ON a.id_personne = p.id_personne
        WHERE id_film = :id");
        $requeteCasting->execute(["id"=>$id]);
               
        require "view/detail/detailFilm.php";
    }



    // ACTEUR

    public function listActeurs(){

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("SELECT a.id_acteur, p.nom AS Nom, p.prenom AS Prenom, p.DateNaissance AS Date_de_naissance
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
        require "view/detail/detailActeur.php";
    }



    // REALISATEUR

    public function listRealisateurs(){

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("SELECT r.id_realisateur, p.nom AS Nom, p.prenom AS Prenom, p.DateNaissance AS Date_de_naissance
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



    // GENRE

    public function listGenres(){

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("SELECT g.id_genre, g.nomGenre
            FROM genre g
            ORDER BY g.nomGenre
        ");

        require "view/list/listGenres.php";
    }

    public function detailGenre($id){
        $pdo = Connect:: seConnecter();
        $requeteGenre = $pdo->prepare("SELECT *
        FROM genre g
        INNER JOIN classer c ON g.id_genre = c.id_genre
        INNER JOIN film f ON c.id_film = f.id_film
        WHERE g.id_genre = :id
       
        ");
        $requeteGenre->execute(["id"=>$id]);

        require "view/detail/detailGenre.php";
    }



    // ROLE

    public function listRoles(){

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT ro.id_role, ro.nomRole
            FROM role ro
            ORDER BY ro.nomRole
        ");

        require "view/list/listRoles.php";
    }

    public function detailRole($id){
        $pdo = Connect:: seConnecter();
        $requeteRole = $pdo->prepare("SELECT *
        FROM role r
        INNER JOIN casting c ON r.id_role = c.id_role
        INNER JOIN acteur a ON c.id_acteur = a.id_acteur
        INNER JOIN personne p ON a.id_personne = p.id_personne
        INNER JOIN film f ON c.id_film = f.id_film


        WHERE r.id_role = :id
       
        ");
        $requeteRole->execute(["id"=>$id]);

        require "view/detail/detailRole.php";
    }
}