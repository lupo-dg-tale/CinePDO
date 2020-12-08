<?php

ob_start();

?>
<h2>Nombre de Réalisateurs : <?= $realisateurs->rowCount(); ?></h2>
<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>       
            <th scope="col"id="action">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($realisateur = $realisateurs->fetch()) 
        {
            echo '<tr><td><a href="index.php?action=detailRealisateurs&id='.$realisateur["id_real"].'">' . $realisateur['nom_realisateur'] . '</a></td>';
            echo '<td>' . $realisateur['prenom_realisateur'] . '</td>';
            echo '<td><button class="bDelete">Supprimer</button> <button class="bMod">Modifier</button></tr>';
        }
        ?>
    </tbody>

<?php

$titre = "Liste des réalisateurs";
$contenu = ob_get_clean();
require "View/template.php";