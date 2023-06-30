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

    // public function formSelectFilm(){

    //     $pdo = Connect:: seConnecter();

    // }
    
    public function ajoutFilm(){
        
        
        
        $pdo = Connect:: seConnecter();
        
        $requetRealisateur = $pdo->prepare("SELECT r.id_realisateur, CONCAT(p.prenom,' ', p.nom) as affiche_nom
        FROM  realisateur r 
        INNER JOIN personne p ON r.id_personne = p.id_personne");//ok
        $requetRealisateur->execute();

        $requetGenre = $pdo->prepare("SELECT g.nomGenre
        FROM genre g");//ok
        $requetGenre->execute();
        
        // require "view/form/FilmForm.php"; 
        
        if(isset($_POST["submit"])){//verifie qu'il y est qq chose dans le champ
            
            $titre = filter_input(INPUT_POST,"titre",FILTER_SANITIZE_SPECIAL_CHARS);//empeche de rentre autre chose que des int
            $note = filter_input(INPUT_POST,"note",FILTER_SANITIZE_NUMBER_INT);
            $anneeSortie = filter_input(INPUT_POST,"anneeSortie",FILTER_SANITIZE_NUMBER_INT);
            $affiche = filter_input(INPUT_POST,"affiche",FILTER_SANITIZE_SPECIAL_CHARS);
            //$genres = filter_input(INPUT_POST, "genre", FILTER_DEFAULT,FILTER_REQUIRE_ARRAY);
            $synopsis = filter_input(INPUT_POST,"synopsis",FILTER_SANITIZE_SPECIAL_CHARS);
            $duree = filter_input(INPUT_POST,"duree",FILTER_SANITIZE_NUMBER_INT);
            $realisateur = filter_input(INPUT_POST,"realisateur",FILTER_SANITIZE_SPECIAL_CHARS);
            
            // var_dump($titre);die;
            
            
            if($titre && $note && $anneeSortie && $affiche && $synopsis  && $duree && $realisateur ){
                
                $requetAjoutFilm = $pdo->prepare("INSERT INTO film (titre, note, anneeSortie,affiche,synopsis,dureeMinutes,id_realisateur)
                VALUES (:titre, :note, :anneeSortie, :affiche, :synopsis, :duree, :realisateur )");
             
             

                $requetAjoutFilm->execute([
                    "titre" => $titre,
                    "note" => $note,
                    "anneeSortie" => $anneeSortie,
                    "affiche" => $affiche,
                    "synopsis" => $synopsis,
                    "duree" => $duree,
                    "realisateur" => $realisateur,
                    
                ]);
               
            }   
            // $requetIdFilm = $pdo->prepare("INSERT INTO film (id_film) VALUES(:id_film)");
            // $requetIdFilm->execute(["id_film"=> $pdo->lastInsertId()]);

            header('Location:index.php?action=listFilms');

        }else{
            echo "Veuillez completer tout les champs";
        }
        
        require "view/form/FilmForm.php";
    }
}