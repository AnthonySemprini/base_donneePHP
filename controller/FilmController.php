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
       // var_dump($_POST);die;
        
      // var_dump($_POST);die;

        
        $pdo = Connect:: seConnecter();
        
        $requetRealisateur = $pdo->prepare("SELECT r.id_realisateur, CONCAT(p.prenom,' ', p.nom) as affiche_nom
        FROM  realisateur r 
        INNER JOIN personne p ON r.id_personne = p.id_personne");//ok
        $requetRealisateur->execute();

        $requetGenre = $pdo->prepare("SELECT g.nomGenre, g.id_genre
        FROM genre g");//ok
        $requetGenre->execute();

        $genres = $pdo->prepare("SELECT g.id_genre
        FROM genre g");
        $genres->execute();
           // var_dump($genres->fetchAll());die;
        
        
        if(isset($_POST["submit"])){//verifie qu'il y est qq chose dans le champ
            
            $titre = filter_input(INPUT_POST,"titre",FILTER_SANITIZE_SPECIAL_CHARS);//empeche de rentre autre chose que des int
            $note = filter_input(INPUT_POST,"note",FILTER_SANITIZE_NUMBER_INT);
            $anneeSortie = filter_input(INPUT_POST,"anneeSortie",FILTER_SANITIZE_NUMBER_INT);
            $affiche = filter_input(INPUT_POST,"affiche",FILTER_SANITIZE_SPECIAL_CHARS);
            $synopsis = filter_input(INPUT_POST,"synopsis",FILTER_SANITIZE_SPECIAL_CHARS);
            $duree = filter_input(INPUT_POST,"duree",FILTER_SANITIZE_NUMBER_INT);
            $realisateur = filter_input(INPUT_POST,"realisateur",FILTER_SANITIZE_SPECIAL_CHARS);
            $genres = filter_input(INPUT_POST,'genres',FILTER_DEFAULT,FILTER_REQUIRE_ARRAY);
            
            $fileName = "";
            // Image pas obligatoire
            if(isset($_FILES['file'])){
                // Initialisation var:
                $tmpName = $_FILES['file']['tmp_name'];
                $name = $_FILES['file']['name'];
                $size = $_FILES['file']['size'];
                $error = $_FILES['file']['error'];

                // Récupération de l'extension du fichier:
                $tabExtension = explode('.', $name);
                $extension = strtolower(end($tabExtension));
                // Extensions autorisées :
                $extensions = ['jpg', 'png', 'jpeg', "PNG", "JPG"];
                // Max size: 40Mb 
                $maxSize = 400000;

                if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
                    $uniqueName = uniqid($name, true);
                    $fileName = $uniqueName.".".$extension;
                    // Upload:
                    move_uploaded_file($tmpName, './public/uploads/'.$fileName);
                }
            }
            
            if($titre && $note && $anneeSortie && $affiche && $synopsis  && $duree && $realisateur && $genres ){
                
                
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
                // var_dump($affiche);die;
                $id_film= $pdo->lastInsertId();

                
                foreach ($genres as $genre){
                    
                    $requetAjoutClasser = $pdo->prepare("INSERT INTO classer (id_film, id_genre)
                VALUES (:id_film, :id_genre)
                ");
                $requetAjoutClasser->execute([
                    "id_film"=> $id_film,
                    "id_genre"=> $genre
                ]);
            }

               
            }   

            header('Location:index.php?action=listFilms');

        }else{
            echo "Veuillez completer tout les champs";
        }
        
        require "view/form/FilmForm.php";
    }
}