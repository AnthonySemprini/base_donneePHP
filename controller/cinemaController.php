<?php

namespace Controller;
use Model\Connect;
include "model/model.php";

class CinemaController{

    // fonction lister films+acteurs+realisateur+genres+roles

    public function listFilms(){

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT id_film, titre, anneeSortie
            FROM film
        ");

        require "view/listFilms.php";
    }

    public function listActeurs(){

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT a.id_acteur, p.nom AS Nom, p.prenom AS Prenom, p.DateNaissance AS Date_de_naissance
            FROM acteur a
            INNER JOIN personne p ON a.id_personne = p.id_personne
        ");

        require "view/listActeurs.php";
    }

    public function listRealisateurs(){

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT r.id_realisateur, p.nom AS Nom, p.prenom AS Prenom, p.DateNaissance AS Date_de_naissance
            FROM realisateur r
            INNER JOIN personne p ON r.id_personne = p.id_personne
        ");

        require "view/listRealisateurs.php";
    }
}