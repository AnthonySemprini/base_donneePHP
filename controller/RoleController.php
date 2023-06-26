<?php

namespace Controller;
use Model\Connect;


class RoleController{

// ROLE

    public function listRoles(){

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT ro.id_role, ro.nomRole
            FROM role ro
            ORDER BY ro.nomRole
        ");

        require "view/list/RolesList.php";
    }

    public function detailRole($id){
        $pdo = Connect:: seConnecter();

         $role = $pdo->prepare("SELECT *
        FROM role r
        WHERE r.id_role = :id
        ");

        $role->execute(["id" => $id]);

        $requeteRole = $pdo->prepare("SELECT *, CONCAT(p.prenom,' ' ,p.nom) AS nom
        FROM role r
        INNER JOIN casting c ON r.id_role = c.id_role
        INNER JOIN acteur a ON c.id_acteur = a.id_acteur
        INNER JOIN personne p ON a.id_personne = p.id_personne
        INNER JOIN film f ON c.id_film = f.id_film
        WHERE r.id_role = :id
        ");
        
        $requeteRole->execute(["id"=>$id]);

        require "view/detail/RoleDetail.php";
    }

      public function formAjoutRole(){
        $pdo = Connect:: seConnecter();
      
        if(isset($_POST["submit"])){//verifie si champ et remplie
            $nomRole = filter_input(INPUT_POST, "nomRole", FILTER_SANITIZE_FULL_SPECIAL_CHARS);//verifie si il n'y a pas de caracthére spe
            
            if($nomRole) {
                // var_dump("ok");die;
                $requetAjouterRole = $pdo->prepare("INSERT INTO Role (nomRole) VALUES(:nomRole)");//ajoute le Role saisie dans le form
                $requetAjouterRole->execute(["nomRole"=> $nomRole]);
                header('Location:index.php?action=listRoles');
            
            }else{
                echo " Veuillez remplir le champs";
            }
        }

        require "view/form/RoleForm.php";
    }  
}