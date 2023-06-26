<?php

use Controller\ActeurController;
use Controller\FilmController;
use Controller\GenreController;
use Controller\RealisateurController;
use Controller\RoleController;

spl_autoload_register(function ($class_name) {
    require $class_name . '.php';
});

$id = (isset($_GET["id"])) ? $_GET["id"] : null;

$ActeurCtrl = new ActeurController();
$FilmCtrl = new FilmController();
$RealisateurCtrl = new RealisateurController();
$GenreCtrl = new GenreController();
$RoleCtrl = new RoleController();


if(isset($_GET['action'])){
    switch ($_GET['action']){

    //FILM
        case "listFilms": $FilmCtrl->listFilms();
            break;

        case "detailFilm": $FilmCtrl->detailFilm($id);    
            break;
            case "formCasting": $CastingCtrl->formAjoutCasting();
           break;

    //Acteur
        case "listActeurs": $ActeurCtrl->listActeurs();
            break;

        case "detailActeur": $ActeurCtrl->detailActeur($id); 
            break;

        case "formActeur": $ActeurCtrl->formAjoutActeur();
           break;

    //Realisateur
        case "listRealisateurs": $RealisateurCtrl->listRealisateurs();
            break;

        case "detailRealisateur": $RealisateurCtrl->detailRealisateur($id); 
            break;
        case "formRealisateur": $RealisateurCtrl->formAjoutRealisateur();
           break;

    //Genre
        case "listGenres":$GenreCtrl->listGenres();
            break;

        case "detailGenre":$GenreCtrl->detailGenre($id); 
            break;

        case "formGenre":$GenreCtrl->formAjoutGenre();
           break;
    
    //Role
        case "listRoles": $RoleCtrl->listRoles();
            break;

        case "detailRole": $RoleCtrl->detailRole($id); 
            break;

        case "formRole":$RoleCtrl->formAjoutRole();
           break;
    }   

}

else{
    $FilmCtrl->listFilms();
}