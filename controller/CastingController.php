<?php

namespace Controller;
use Model\Connect;


class ActeurController{


public function formSelectCasting(){
 $pdo = Connect:: seConnecter();

 if(isset($_POST["submit"])){//verifie si champ et remplie
            $acteur = filter_input(INPUT_POST, "acteur", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $film = filter_input(INPUT_POST, "film", FILTER_SANITIZE_FULL_SPECIAL_CHARS);//verifie si il n'y a pas de caracthére spe
            $role = filter_input(INPUT_POST,"role",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    if($acteur && $film && $role){
        $requeteSelectCasting =$pdo->prepare("INSERT INTO casting (acteur, film, role) 
        VALUES (:acteur,:film,:role)");

    $requeteSelectCasting->execute([
        "acteur" => $acteur,
        "film"=>$film,
        "role"=> $role
    ]);

    header('Location:index.php?action=listFilms');


    
    }else{
    echo "Veuillez remplir les champs";
    }    
 }      
}
};