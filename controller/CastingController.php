<?php

namespace Controller;
use Model\Connect;


class CastingController{


    public function formSelectCasting(){
        $pdo = Connect:: seConnecter();
        
        $requetActeur = $pdo->prepare("SELECT a.id_acteur, CONCAT(p.prenom,' ', p.nom) as affiche_nom
        FROM  acteur a 
        INNER JOIN personne p ON p.id_personne = a.id_personne");
        $requetActeur->execute();

        $requetFilm = $pdo->prepare("SELECT id_film, titre
        FROM film f");
        $requetFilm->execute();
        
        $requetRole = $pdo->prepare("SELECT id_role, nomRole
        FROM role r") ;
        $requetRole->execute();
        
        //var_dump($requetRole);die;
        //var_dump($requetFilm->fetchAll());die;
        
        require "view/form/CastingForm.php";     

    }
    
    
    public function ajoutCasting($role, $film, $acteur){
        $pdo = Connect:: seConnecter();
        
        if(isset($_POST["submit"])){//verifie qu'il y est qq chose dans le champ
            
                $role = filter_input(INPUT_POST,"castingRole",FILTER_SANITIZE_NUMBER_INT);//empeche de rentre autre chose que des int
                $film = filter_input(INPUT_POST,"castingFilm",FILTER_SANITIZE_NUMBER_INT);
                $acteur = filter_input(INPUT_POST,"castingActeur",FILTER_SANITIZE_NUMBER_INT);
                //var_dump($role);die;
                if($role && $film && $acteur){
                $requetAjoutCast = $pdo->prepare("INSERT INTO casting (id_role,id_film,id_acteur) 
                VALUES(:castingRole, :castingFilm, :castingActeur)");
                //var_dump($requetAjoutCast->fetchAll());die;
                $requetAjoutCast->execute([
                    "castingRole" => $role,
                    "castingFilm" => $film,
                    "castingActeur" =>$acteur
                ]);
                //var_dump($role);die;
                header('Location:index.php?action=listFilms');
            }
        }else{  
            echo  "Veuillez selectionner ";        
        }
        require "view/form/CastingForm.php";

    }

}
