<?php

ob_start();

?>
<h2>Nombre de films : <?= $films->rowCount(); ?></h2>
<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">Titre du film</th>
            <th scope="col">Note</th>
            <th scope="col">Année</th>
            <th scope="col">Durée</th>
            <th scope="col" id="action">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($film = $films->fetch()) {
            echo '<tr><td><a href="index.php?action=detailFilms&id=' . $film["id_film"] . '">' . $film['titre'] . '</a></td>';
            $star = str_repeat("&#9733;", $film["note"]).str_repeat("&#9734", 5 - $film["note"]);
            echo '<td>' . $star . '</td>';
            echo '<td>' . $film['annee'] . '</td>';
            echo '<td>' . $film['duree'] . '</td>';
            echo '<td><a href="index.php?action=supprimerFilm&id=' . $film["id_film"] . '"><button class="bDelete">Supprimer</button></a> <a href="index.php?action=modifierFilmFormulaire&id=' . $film["id_film"] . '"><button class="bMod">Modifier</button></a></tr>';
        }
        ?>
    </tbody>
</table>

<div class="ajouter"><button class="add"><a href="index.php?action=ajouterFilmFormulaire">Ajouter un film</a></button></div>
<?php
// $films->closeCursor();

$titre = "Liste des films";
$contenu = ob_get_clean();
require "View/template.php";

$prout = "u";
$prout .= "p";