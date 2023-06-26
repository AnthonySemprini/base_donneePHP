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

        //var_dump($requetRole->fetchAll());die;

        require "view/form/CastingForm.php";     
    }


    public function ajoutCasting(){
        $pdo = Connect:: seConnecter();
        if(isset($_POST["submit"])){
            var_dump();die;
            
            $role = filter_input(INPUT_POST,"nomRole",FILTER_SANITIZE_NUMBER_INT);
            $film = filter_input(INPUT_POST,"titre",FILTER_SANITIZE_NUMBER_INT);
            $acteur = filter_input(INPUT_POST,"affiche_nom",FILTER_SANITIZE_NUMBER_INT);
            
            if($role && $film && $acteur){
                $requetAjoutCast = $pdo->prepare("INSERT INTO casting (nomRole, titre, affiche_nom) 
                VALUES(:nomRole, :titre, :affiche_nom");

                $requetAjoutCast->execute([
                    "nomRole" => $role,
                    "titre" => $film,
                    "affiche_nom" =>$acteur
                ]);
                
            }
        }

         
    }

}