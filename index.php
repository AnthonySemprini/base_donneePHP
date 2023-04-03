<?php

use Controller\cinemaController;

spl_autoload_register(function($class_name){
    include $class_name .'.php';
});

$ctrlCinema = new cinemaController();

if(isset($_GET['action'])){
    switch ($_GET['action']){
        case "ListFilms": $ctrlCinema->ListFilms(); break;
        case "ListActeur": $ctrlCinema->ListActeurs();break;
    }
}