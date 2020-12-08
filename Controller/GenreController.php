<?php

class GenreController
{
    public function findAll()
    {
        $dao = new DAO();
        $sql = "SELECT nom_genre FROM genre ";
        $genres = $dao->executerRequete($sql);

        require "View/genre/listGenres.php";
    }
}
