<?php

namespace Controller;
use Model\Connect;


class CastingController{


public function formSelectCasting(){
    $pdo = Connect:: seConnecter();

    $requetActeur = $pdo->prepare("SELECT a.id_acteur, p.prenom, p.nom
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
    if(isset)
}

}