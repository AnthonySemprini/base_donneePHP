<?php

namespace Controller;
use Model\Connect;


class RealisateurController{

 // REALISATEUR

    public function listRealisateurs(){

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("SELECT r.id_realisateur,CONCAT(p.prenom,' ' ,p.nom) AS nom, p.DateNaissance AS Date_de_naissance
            FROM realisateur r
            INNER JOIN personne p ON r.id_personne = p.id_personne
            ORDER BY p.nom, p.prenom
        ");

        require "view/list/RealisateursList.php";
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

        require "view/detail/RealisateurDetail.php";
    }
    public function formAjoutRealisateur(){
        $pdo = Connect:: seConnecter();
      
        if(isset($_POST["submit"])){//verifie si champ et remplie
            $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);//verifie si il n'y a pas de caracthére spe
            $sexe = filter_input(INPUT_POST,"sexe",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $dateNaissance = filter_input(INPUT_POST,"DateNaissance",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            if($nom && $prenom && $sexe && $dateNaissance){
                $requetAjouterPersonne = $pdo->prepare("INSERT INTO personne (nom,prenom,sexe,DateNaissance ) 
                VALUES(:nom, :prenom, :sexe, :DateNaissance)");//ajoute le Personne saisie dans le form
               
                $requetAjouterPersonne->execute([
                    "nom"=> $nom,
                    "prenom"=> $prenom,
                    "sexe"=> $sexe,
                    "DateNaissance"=> $dateNaissance
                ]);
                //  var_dump($dateNaissance);die;
               
                $requetIdRealisateurPerso = $pdo->prepare("INSERT INTO realisateur (id_personne) VALUES(:id_personne)");
                $requetIdRealisateurPerso->execute(["id_personne"=> $pdo->lastInsertId()]);
                // var_dump($requetIdRealisateurPerso);die;
                //var_dump($id);die;
                
                header('Location:index.php?action=listRealisateurs');
            
            }else{
                echo " Veuillez remplir le champs";
            }
        }

        require "view/form/RealisateurForm.php";
    }   
};