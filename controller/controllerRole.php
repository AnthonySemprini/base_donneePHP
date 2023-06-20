 <?php

namespace Controller;
use Model\Connect;
include "model/model.php";

class CinemaController{

// ROLE

    public function listRoles(){

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT ro.id_role, ro.nomRole
            FROM role ro
            ORDER BY ro.nomRole
        ");

        require "view/list/listRoles.php";
    }

    public function detailRole($id){
        $pdo = Connect:: seConnecter();
        $requeteRole = $pdo->prepare("SELECT *, CONCAT(p.prenom,' ' ,p.nom) AS nom
        FROM role r
        INNER JOIN casting c ON r.id_role = c.id_role
        INNER JOIN acteur a ON c.id_acteur = a.id_acteur
        INNER JOIN personne p ON a.id_personne = p.id_personne
        INNER JOIN film f ON c.id_film = f.id_film


        WHERE r.id_role = :id
       
        ");
        $requeteRole->execute(["id"=>$id]);

        require "view/detail/detailRole.php";
    }
}