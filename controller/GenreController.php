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
        
        $genre = $pdo->prepare("SELECT *
        FROM genre g
        WHERE g.id_genre = :id
        ");

        $genre->execute(["id" => $id]);

        $requeteGenre = $pdo->prepare("SELECT *
        FROM genre g
        INNER JOIN classer c ON g.id_genre = c.id_genre
        INNER JOIN film f ON c.id_film = f.id_film
        WHERE g.id_genre = :id
       ");

        $requeteGenre->execute(["id"=>$id]);
       
        require "view/detail/GenreDetail.php";
    }
   
   

    public function formAjoutGenre(){
        $pdo = Connect:: seConnecter();
      
        if(isset($_POST["submit"])){//verifie si champ et remplie
            $nomGenre = filter_input(INPUT_POST, "nomGenre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);//verifie si il n'y a pas de caracthére spe
            
            if($nomGenre) {
                // var_dump("ok");die;
                $requetAjouterGenre = $pdo->prepare("INSERT INTO Genre (nomGenre) VALUES(:nomGenre)");//ajoute le genre saisie dans le form
                $requetAjouterGenre->execute(["nomGenre"=> $nomGenre]);
                header('Location:index.php?action=listGenres');
            
            }else{
                echo " Veuillez remplir le champs";
            }
        }

        require "view/form/GenreForm.php";
    }   
}   


