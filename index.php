<?php

use Controller\ActeurController;
use Controller\FilmController;
use Controller\GenreController;
use Controller\RealisateurController;
use Controller\RoleController;
use Controller\CastingController;


spl_autoload_register(function ($_className) {
    require str_replace("\\","/",$_className).".php";
});

$id = (isset($_GET["id"])) ? $_GET["id"] : null;

$ActeurCtrl = new ActeurController();
$FilmCtrl = new FilmController();
$RealisateurCtrl = new RealisateurController();
$GenreCtrl = new GenreController();
$RoleCtrl = new RoleController();
$CastingCtrl=new CastingController();


if(isset($_GET['action'])){
    switch ($_GET['action']){

    //FILM
        case "listFilms": $FilmCtrl->listFilms();
            break;

        case "detailFilm": $FilmCtrl->detailFilm($id);    
            break;

            
            // case "ajoutFilm": $FilmCtrl->formSelectFilm();
            // break;

            case "ajoutFilm": $FilmCtrl->ajoutFilm();
                break;

    // CASTING
        case "formCasting": $CastingCtrl->formSelectCasting();
            break;
        
        case "ajoutCasting": $CastingCtrl->ajoutCasting($role, $film, $acteur);
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