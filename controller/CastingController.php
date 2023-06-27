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
            
            $role = filter_input(INPUT_POST,"id_role",FILTER_SANITIZE_NUMBER_INT);
            $film = filter_input(INPUT_POST,"id_film",FILTER_SANITIZE_NUMBER_INT);
            $acteur = filter_input(INPUT_POST,"id_acteur",FILTER_SANITIZE_NUMBER_INT);
            
            if($role && $film && $acteur){
                $requetAjoutCast = $pdo->prepare("INSERT INTO casting  
                VALUES(:id_role, :id_film, :id_acteur");

$requetAjoutCast->execute([
    "id_role" => $role,
    "id_film" => $film,
    "id_acteur" =>$acteur
]);
                
            }
        }

         
    }

}