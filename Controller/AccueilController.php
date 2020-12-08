<?php

require_once "BDD/DAO.php";

Class AccueilController {

    public function pageAccueil(){
        $dao = new DAO();
        require "View/accueil/accueil.php";
    }
    
}