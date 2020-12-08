<?php

class FilmController
{
    public function findAll()
    {
        $dao = new DAO();
        $sql = "SELECT id_film, titre, note, annee, TIME_FORMAT(SEC_TO_TIME(duree*60), '%HH%i') AS duree FROM film ";
        $films = $dao->executerRequete($sql);

        require "View/film/listFilms.php";
    }

    public function findOneById($id)
    {
        $dao = new DAO();
        $sql = "SELECT titre, note, annee, TIME_FORMAT(SEC_TO_TIME(duree*60), '%HH%i') AS duree, CONCAT(prenom_realisateur,' ',nom_realisateur) AS realisateur, GROUP_CONCAT(nom_genre SEPARATOR ' / ') as nom_genre, synopsis, affiche
                FROM film f
                INNER JOIN realisateur r
                ON r.id_real = f.id_real
                INNER JOIN appartient a
                ON a.id_film = f.id_film
                INNER JOIN genre g
                ON g.id_genre = a.id_genre
                WHERE f.id_film = :id";

        $detailFilms = $dao->executerRequete($sql, [":id" => $id]);

        $sql2 = "SELECT CONCAT(prenom_acteur,' ',nom_acteur) AS acteur, nom_role
                FROM acteur a, casting c, role r
                WHERE a.id_acteur = c.id_acteur 
                AND c.id_role = r.id_role
                AND c.id_film = :id";

        $castingFilms = $dao->executerRequete($sql2, [":id" => $id]);

        require "View/film/detailFilms.php";
    }

    public function addFilmFormulaire()
    {
        $dao = new DAO();
        $sql = "SELECT DISTINCT id_real, (CONCAT(nom_realisateur,' ', prenom_realisateur)) AS realisateur
                FROM realisateur";
        $sql2 = "SELECT id_genre, nom_genre FROM genre";

        $listeRealisateurs = $dao->executerRequete($sql);
        $listeGenres = $dao->executerRequete($sql2);

        require "View/film/ajouterFilmFormulaire.php";
    }

    public function addFilm($array)
    {
        $dao = new DAO();
        $sql = "INSERT INTO film(titre, annee, duree, note, synopsis, affiche, id_real)
                    VALUES (:titre, :annee, :duree, :note, :synopsis, :affFilm, :idreal)";

        $titre = filter_var($array['titre_film'], FILTER_SANITIZE_STRING);
        $annee = filter_var($array['sortie_film'], FILTER_SANITIZE_NUMBER_INT);
        $duree = filter_var($array['duree_film'], FILTER_SANITIZE_NUMBER_INT);
        $note = filter_var($array['note_film'], FILTER_SANITIZE_STRING);
        $synopsis = filter_var($array['synopsis'], FILTER_SANITIZE_STRING);
        $id_real = filter_var($array['realisateur_film'], FILTER_SANITIZE_STRING);
        $affFilm = filter_var($array['affiche'], FILTER_SANITIZE_STRING);

        $ajout = $dao->executerRequete($sql, [':titre' => $titre, ':annee' => $annee, ':duree' => $duree, ':note' => $note, ':synopsis' => $synopsis, ':idreal' => $id_real, ':affFilm' => $affFilm]);
        $dernierID = $dao->getBDD()->lastInsertId();

        $sql2 = "INSERT INTO appartient(id_genre, id_film)
                    VALUES (:idGenre, :idFilm)";
        $appartient = filter_var_array($array['genre_film'], FILTER_SANITIZE_STRING);
        foreach ($appartient as $app) {
            $ajoutApp = $dao->executerRequete($sql2, [":idGenre" => $app, ":idFilm" => $dernierID]);
        }
        header("Location: index.php?action=listFilms");
    }

    public function deleteFilm($id)
    {
        $dao = new DAO();
        $sql = "DELETE FROM film WHERE id_film = :id";

        $supprimerDansAppartient = $this->deleteFromAppartient($id);
        $supprimerDansCasting = $this->deleteFromCasting($id);
        $supprimerFilm = $dao->executerRequete($sql, [":id" => $id]);

        header("Location: index.php?action=listFilms");
    }
    public function deleteFromAppartient($id)
    {
        $dao = new DAO();
        $sql = "DELETE FROM appartient WHERE id_film = :id";

        $supprimerDansAppartient = $dao->executerRequete($sql, [":id" => $id]);

        return $supprimerDansAppartient;
    }

    public function deleteFromCasting($id)
    {
        $dao = new DAO();
        $sql = "DELETE FROM casting WHERE id_film = :id";

        $supprimerDansCasting = $dao->executerRequete($sql, [":id" => $id]);

        return $supprimerDansCasting;
    }

    public function editFilmFormulaire($id)
    {
        $dao = new DAO();
        $sql = "SELECT f.id_film, titre, annee, duree, note, synopsis, affiche, id_real, GROUP_CONCAT(id_genre) AS genres
                FROM film f
                INNER JOIN appartient a
                ON f.id_film = a.id_film
                WHERE f.id_film = :id";
        $modifs = $dao->executerRequete($sql, [":id" => $id]);

        $sql2 = "SELECT id_genre, id_film FROM appartient WHERE id_film = :id";
        $modifs2 = $dao->executerRequete($sql2, [":id" => $id]);

        $sql3 = "SELECT id_genre, nom_genre FROM genre";
        $modifs3 = $dao->executerRequete($sql3);

        $sql4 = "SELECT DISTINCT id_real, (CONCAT(nom_realisateur,' ', prenom_realisateur)) AS realisateur
                    FROM realisateur";
        $modifs4 = $dao->executerRequete($sql4);

        require "View/film/modifierFilmFormulaire.php";
    }

    public function editFilm($id, $array)
    {

        $dao = new DAO();

        $titre = filter_var($array['titre_film'], FILTER_SANITIZE_STRING);
        $annee = filter_var($array['sortie_film'], FILTER_SANITIZE_NUMBER_INT);
        $duree = filter_var($array['duree_film'], FILTER_SANITIZE_NUMBER_INT);
        $note = filter_var($array['note_film'], FILTER_SANITIZE_STRING);
        $synopsis = filter_var($array['synopsis'], FILTER_SANITIZE_STRING);
        $id_real = filter_var($array['realisateur_film'], FILTER_SANITIZE_STRING);
        $affiche = filter_var($array['affiche'], FILTER_SANITIZE_STRING);
        $genre = filter_var_array($array['genre_film'], FILTER_SANITIZE_STRING);

        $sql = "UPDATE film 
                SET titre = :titre, 
                    annee = :annee, 
                    duree = :duree, 
                    note = :note, 
                    synopsis = :synopsis, 
                    affiche = :affiche, 
                    id_real = :id_real 
                WHERE id_film = :id";

        $sql2 = "DELETE FROM appartient
                    WHERE id_film = :id";


        $dao->executerRequete($sql, [
            ":titre" => $titre,
            ":annee" => $annee,
            ":duree" => $duree,
            ":note" => $note,
            ":synopsis" => $synopsis,
            ":affiche" => $affiche,
            ":id_real" => $id_real,
            ":id" => $id
        ]);

        $dao->executerRequete($sql2, [':id' => $id]);


        $sql3 = "INSERT INTO appartient (id_genre, id_film)
                    VALUES (:idGenre, :idFilm)";
        foreach ($genre as $genreActuel) {
            var_dump($genreActuel);
            // $genreActuel = filter_var($array['genre_film'], FILTER_SANITIZE_STRING);
            $dao->executerRequete($sql3, [':idGenre' => $genreActuel, ':idFilm' => $id]);
        }
        header("Location: index.php?action=listFilms");
    }
}
