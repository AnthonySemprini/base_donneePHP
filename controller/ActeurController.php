<?php

namespace Controller;
use Model\Connect;


class ActeurController{

 // ACTEUR

    public function listActeurs(){

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("SELECT a.id_acteur, CONCAT(p.prenom,' ' ,p.nom) AS nom, p.DateNaissance AS Date_de_naissance
            FROM acteur a
            INNER JOIN personne p ON a.id_personne = p.id_personne
            ORDER BY p.nom, p.prenom
        ");

        require "view/list/ActeursList.php";
    }

    public function detailActeur($id){
        $pdo = Connect:: seConnecter();
        $requeteActeur = $pdo->prepare("SELECT p.prenom, p.nom, ROUND(DATEDIFF( NOW(), p.DateNaissance)/365) AS age, p.sexe
        FROM acteur a 
        INNER JOIN personne p ON a.id_personne = p.id_personne 
        WHERE id_acteur = :id
        ");
        $requeteActeur->execute(["id"=>$id]);

        $requeteFilmo = $pdo->prepare("SELECT f.titre, f.anneeSortie, f.id_film
        FROM film f
        INNER JOIN casting c ON f.id_film = c.id_film
        WHERE id_acteur = :id");

        $requeteFilmo->execute(["id"=>$id]);
        require "view/detail/ActeurDetail.php";
    }

     public function formAjoutActeur(){
        $pdo = Connect:: seConnecter();
      
        if(isset($_POST["submit"])){//verifie si champ et remplie
            $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);//verifie si il n'y a pas de caracthére spe
            $sexe = filter_input(INPUT_POST,"sexe",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $DateNaissance = filter_input(INPUT_POST,"DateNaissance",FILTER_SANITIZE_NUMBER_INT);
                //var_dump("ok");die;
            
            if($nom && $prenom && $sexe && $DateNaissance){
                $requetAjouterPersonne = $pdo->prepare("INSERT INTO Personne ('nom','prenom','sexe','DateNaissance' ) VALUES(:nom, :prenom, :sexe, :DateNaissance)");//ajoute le Personne saisie dans le form
                $requetAjouterPersonne->execute([
                    "nom"=> $nom,
                    "prenom"=> $prenom,
                    "sexe"=> $sexe,
                    "Datenaissance"=> $DateNaissance
                ]);
                $idActeur = $pdo->prepare(" INSERT INTO Acteur (id_acteur)");
                $idActeur->execute();
                $id = $pdo->lastInsertId();
                
                header('Location:index.php?action=listActeur');
            
            }else{
                echo " Veuillez remplir le champs";
            }
        }

        require "view/form/ActeurForm.php";
    }   
    };
    
