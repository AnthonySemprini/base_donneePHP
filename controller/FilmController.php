<?php

namespace Controller;
use Model\Connect;


class FilmController{

    public function listFilms(){

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("SELECT id_film, titre, anneeSortie
            FROM film
            ORDER BY anneeSortie DESC
        ");

        require "view/list/FilmsList.php";
    }

    public function detailFilm($id){
        $pdo = Connect :: seConnecter();
        $requeteFilm = $pdo->prepare("SELECT *, CONCAT(p.prenom,' ',p.nom) AS nomReal
        FROM film f 
        INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur
        INNER JOIN personne p ON r.id_personne = p.id_personne
        LEFT JOIN classer c ON f.id_film = c.id_film
        LEFT JOIN genre g ON c.id_genre = g.id_genre
        WHERE f.id_film = :id");
        $requeteFilm->execute(["id"=>$id]);

        $requeteCasting = $pdo->prepare("SELECT *,CONCAT(p.prenom,' ',p.nom) AS nom
        FROM casting c
        INNER JOIN role r ON c.id_role = r.id_role
        INNER JOIN acteur a ON c.id_acteur = a.id_acteur 
        INNER JOIN personne p ON a.id_personne = p.id_personne
        WHERE id_film = :id");
        $requeteCasting->execute(["id"=>$id]);
        

        require "view/detail/FilmDetail.php";
    }

}