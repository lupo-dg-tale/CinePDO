<?php

class ActeurController
{
    public function findAll()
    {
        $dao = new DAO();
        $sql = "SELECT id_acteur, nom_acteur, prenom_acteur FROM acteur ";
        $acteurs = $dao->executerRequete($sql);

        require "View/acteur/listActeurs.php";
    }

    public function findOneById($id) 
    {
        $dao = new DAO();
        $sql = 'SELECT prenom_acteur, nom_acteur, sexe, date_naissance
        FROM acteur a
        WHERE a.id_acteur = :id';

        $detailActeurs = $dao->executerRequete($sql,[":id" => $id]);
        $filmographies = $this->getFilmographie($id);

         require "View/acteur/detailActeurs.php";
        
    }

    public function getFilmographie($id) 
    {
        $dao = new DAO();
        $sql = 'SELECT a.id_acteur, titre, nom_role
        FROM film f, casting c, acteur a, role r
        WHERE f.id_film = c.id_film
        AND a.id_acteur = c.id_acteur
        AND c.id_role = r.id_role
        AND a.id_acteur = :id';
        
        $filmographies = $dao->executerRequete($sql, [":id" => $id]); 
        
        return $filmographies;
    }
}
