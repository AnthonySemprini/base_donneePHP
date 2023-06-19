<?php

use Controller\CinemaController;
include "controller/CinemaController.php";
spl_autoload_register(function($class_name){
    include $class_name .'.php';
    echo $class_name;

});
$id = (isset($_GET["id"])) ? $_GET["id"] : null;

$ctrlCinema = new CinemaController();
if(isset($_GET['action'])){
    switch ($_GET['action']){
        case "listFilms": $ctrlCinema->listFilms();
            break;

        case "listActeurs": $ctrlCinema->listActeurs();
            break;

        case "listRealisateurs": $ctrlCinema->listRealisateurs();
            break;

        case "listGenres": $ctrlCinema->listGenres();
            break;

        case "listRoles": $ctrlCinema->listRoles();
            break;

        case "detailFilm": $ctrlCinema->detailFilm($id);    
            break;

        case "detailActeur": $ctrlCinema->detailActeur($id); 
            break;

        case "detailRealisateur": $ctrlCinema->detailRealisateur($id); 
            break;

        case "detailGenre": $ctrlCinema->detailGenre($id); 
            break;

        case "detailRole": $ctrlCinema->detailRole($id); 
            break;
            
        case "formGenre": $ctrlCinema->formGenre();
            break;
    

    }       
}

else{
    $ctrlCinema->listFilms();
}