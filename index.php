<?php

// à faire : rajouter des sanitize partout (y compris sur les array)

require_once "controller/FilmController.php";
require_once "controller/ActeurController.php";
require_once "controller/RealisateurController.php";
require_once "controller/RoleController.php";
require_once "controller/GenreController.php";
require_once "controller/AccueilController.php";

$ctrlFilm = new FilmController();
$ctrlActeur = new ActeurController();
$ctrlRealisateur = new RealisateurController();
$ctrlRole = new RoleController();
$ctrlGenre = new GenreController();
$ctrlAccueil = new AccueilController();


if(isset($_GET['action'])){
    
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING); // car possible d'injecter dans l'URL
$rolePrecis = filter_input(INPUT_GET, "roleId", FILTER_SANITIZE_STRING);
$idActeur = filter_input(INPUT_GET, "idActeur", FILTER_SANITIZE_STRING); 

    switch($_GET['action']){
        
        case "listActeurs" : $ctrlActeur->findAll(); break;
        case "detailActeurs" : $ctrlActeur->findOneById($id); break;
        case "listFilms" : $ctrlFilm->findAll(); break;
        case "detailFilms" : $ctrlFilm->findOneById($id); break;
        case "ajouterFilmFormulaire" : $ctrlFilm->addFilmFormulaire(); break;
        case "ajouterFilm" :  $ctrlFilm->addFilm($_POST); break;
        case "supprimerFilm" : $ctrlFilm->deleteFilm($id); break;
        case "modifierFilmFormulaire" : $ctrlFilm->editFilmFormulaire($id); break;
        case "modifierFilm" : $ctrlFilm->editFilm($id, $_POST); break;
        case "listRealisateurs" : $ctrlRealisateur->findAll(); break;
        case "detailRealisateurs" : $ctrlRealisateur->findOneById($id); break;
        case "listGenres" : $ctrlGenre->findAll(); break;
        case "listRoles" : $ctrlRole->findAll(); break;
        case "accueil" : $ctrlAccueil->pageAccueil(); break;
        
      
    }
}else{
    $ctrlAccueil->pageAccueil();
}