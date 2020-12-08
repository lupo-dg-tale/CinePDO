<?php

class RealisateurController
{
    public function findAll()
    {
        $dao = new DAO();
        $sql = "SELECT id_real, nom_realisateur, prenom_realisateur FROM realisateur ";
        $realisateurs = $dao->executerRequete($sql);

        require "View/realisateur/listRealisateurs.php";
    }

    public function findOneById($id) 
    {
        $dao = new DAO();
        $sql = 'SELECT nom_realisateur, prenom_realisateur, date_naissance
        FROM realisateur r
        WHERE r.id_real = :id';

        $detailRealisateurs = $dao->executerRequete($sql,[":id" => $id]);
        $filmoReals = $this->getFilmographie($id);
        
         require "View/realisateur/detailRealisateurs.php";
        
    }

    public function getFilmographie($id)
    {
        $dao = new DAO();
        $sql = 'SELECT f.id_real, titre, annee
                FROM film f
                WHERE f.id_real = :id';

        $filmoReals = $dao->executerRequete($sql,[":id" => $id]);

        return $filmoReals;
    }
}
