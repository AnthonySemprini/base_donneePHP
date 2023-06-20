<?php

namespace Controller;
use Model\Connect;


class GenreController{

// GENRE

    public function listGenres(){

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("SELECT g.id_genre, g.nomGenre
            FROM genre g
            ORDER BY g.nomGenre
        ");

        require "view/list/GenresList.php";
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

        require "view/detail/GenreDetail.php";
    }
    public function formGenre(){
        require "view/form/GenreForm.php";
     }

    public function formAjoutGenre($nomGenre){
        $pdo = Connect:: seConnecter();
        $requetAjouterGenre = $pdo->prepare("INSERT INTO Genre (nomgenre)
        VALUES(:nomGenre)");
        $nomGenre->execute( ["nomGenre"=> $nomGenre] );
    }
}   


