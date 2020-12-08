<?php

class DAO
{ // DAO : DATA ACCESS OBJECT. Une classe réutilisable qui permet la connexion à une BDD avec un ensemble de méthodes particulières 
    private $bdd;

    public function __construct()
    {
        $this->bdd = new PDO('mysql:host=localhost;dbname=cinema;charset=utf8', 'root', ''); 
        //méthode qui permet de créer un nouvelle instance de l'objet PDO
    }

    function getBDD()
    {  //méthode qui renvoit le contenu de la BDD
        return $this->bdd;
    }

    public function executerRequete($sql, $params = NULL)//méthode qui permet d'executer une requête sans ou avec paramètres
    {
        if ($params == NULL) { //si paramètres NULL -> execution immédiate de la requête
            $resultat = $this->bdd->query($sql);
        } else {
            $resultat = $this->bdd->prepare($sql); // sinon execution de la requête avec les paramètres 
            //bindParam
            $resultat->execute($params);
        }
        return $resultat;
    }
}

// $this->executerRequete("SELECT * FROM acteur WHERE id_acteur = :id", [":id" => $id]);