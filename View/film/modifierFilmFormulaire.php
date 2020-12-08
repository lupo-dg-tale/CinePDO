<?php

ob_start();
$modif = $modifs->fetch();


?>

<h2>Modifier un Film</h2>

<form class="formfilm" action="index.php?action=modifierFilm&id=<?= $modif['id_film'] ?>" method="post">
    <div class="form-group">
        <label for="titre_film">Titre du film :</label>
        <input id="titre_film" name="titre_film" type="text" class="form-control" value="<?php echo $modif['titre'] ?>">
    </div>
    <div class="form-group">
        <label for="sortie_film">Date de sortie (année) :</label>
        <input id="sortie-film" name="sortie_film" type="number" class="form-control" value="<?php echo $modif['annee'] ?>">
    </div>
    <div class="form-group">
        <label for="duree_film">Durée du film (en minutes) :</label>
        <input id="duree_film" name="duree_film" type="number" class="form-control" value="<?php echo $modif['duree'] ?>">
    </div>
    <div class="form-group">
        <label for="note_film">Note (sur 5) :</label>
        <input id="note_film" name="note_film" type="number" class="form-control" value="<?php echo $modif['note'] ?>">
    </div>
    <div class="form-group">
        <label for="synopsis">Synopsis :</label>
        <textarea id="synopsis" name="synopsis" class="form-control"><?php echo $modif['synopsis'] ?></textarea>
    </div>
    <div class="form-group">
        <label for="affiche">Affiche :</label>
        <input id="affiche" name="affiche" type="text" class="form-control" value="<?php echo $modif['affiche'] ?>">
    </div>
    <div class="form-group">
        <label for="genre_film">Genre :</label>
        
        <select id="genre_film" name="genre_film[]" class="form-control" multiple>
            <?php
            $genres = str_split(str_replace(",", "",$modif['genres']));
            while ($modif3 = $modifs3->fetch()) {
                $selected = (in_array($modif3['id_genre'], $genres)) ? "selected" : "";
                echo "<option value=" . $modif3['id_genre'] . " $selected>" . $modif3['nom_genre'] . "</option>";
             
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="realisateur_film">Réalisateur</label>
        <select id="realisateur_film" name="realisateur_film" class="form-control">
            <?php
            while ($modif4 = $modifs4->fetch()) {
                $selected = ($modif4['id_real'] == $modif['id_real']) ? "selected" : "";
                echo "<option value=" . $modif4['id_real'] . " $selected>" . $modif4['realisateur'] . "</option>";
            }
            ?>
        </select>
    </div>
    <input type="submit" value="MODIFIER">
</form>


<?php
 
$titre = "Modifier Film";
$contenu = ob_get_clean();
require "View/template.php";
