<?php

ob_start();

?>

<h2>Ajouter un Film</h2>

<form class="formfilm" action="index.php?action=ajouterFilm" method="post">
    <div class="form-group">
        <label for="titre_film">Titre du film :</label>
        <input id="titre_film" name="titre_film" type="text" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="sortie_film">Date de sortie (année) :</label>
        <input id="sortie-film" name="sortie_film" type="number" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="duree_film">Durée du film (en minutes) :</label>
        <input id="duree_film" name="duree_film" type="number" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="note_film">Note (sur 5) :</label>
        <input id="note_film" name="note_film" type="number" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="synopsis">Synopsis :</label>
        <textarea id="synopsis" name="synopsis" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="affiche">Affiche :</label>
        <input id="affiche" name="affiche" type="text" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="genre_film">Genre :</label>
        <select id="genre_film" name="genre_film[]" class="form-control" multiple required>
            <?php
            while ($nomGenre = $listeGenres->fetch()) {
                echo "<option value=" . $nomGenre['id_genre'] . ">" . $nomGenre['nom_genre'] . "</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="realisateur_film">Réalisateur</label>
        <select id="realisateur_film" name="realisateur_film" class="form-control">
            <?php
            while ($nomReal = $listeRealisateurs->fetch()) {
                echo "<option value=" . $nomReal['id_real'] . ">" . $nomReal['realisateur'] . "</option>";
            }
            ?>
        </select>
    </div>
    <input type="submit" value="VALIDER">
</form>

<?php
$titre = "Ajouter Film";
$contenu = ob_get_clean();
require "View/template.php";
