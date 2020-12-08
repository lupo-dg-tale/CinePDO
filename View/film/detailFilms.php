<?php

ob_start();
$detailFilm = $detailFilms->fetch();
?>
<h2><?= $detailFilm['titre']; ?></h2>
<div class="">
    <div class="row">
        <div class="col-sm-3">
            <?php
            echo '<img src="'.$detailFilm['affiche']. '"/>'; 
            ?>
        </div>
        <div class="col-sm-9">
            <?php

            echo 'Note du film: ' . $detailFilm['note'] . '<br>';
            echo 'Réalisateur: ' . $detailFilm['realisateur'] . '<br>';
            echo 'Année de sortie: ' . $detailFilm['annee'] . '<br>';
            echo 'Durée du film: ' . $detailFilm['duree'] . '<br>';
            echo 'Genre: ' . $detailFilm['nom_genre'] . '<br>';
            ?>
        </div>
        <div class="col-sm-12">
            <h3>Synopsis</h3>

            <?php
            echo $detailFilm['synopsis'];
            ?>
        </div>
        <div class="col-sm-12">
            <h3>Casting</h3>
            <ul>
                <?php
                while ($castingFilm = $castingFilms->fetch()) 
                {
                    echo '<li>' . $castingFilm['acteur'] . ' dans le rôle de ' .$castingFilm['nom_role']. '</li>';
                }
                ?>
            </ul>
        </div>
    </div>
    <?php

    $titre = "Détails Film";
    $contenu = ob_get_clean();
    require "View/template.php";
