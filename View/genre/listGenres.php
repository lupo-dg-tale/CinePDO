<?php

ob_start();

?>
<h2>Nombre de Genres : <?= $genres->rowCount(); ?></h2>
<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">Libellé</th>    
            <th scope="col"id="action">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($genre = $genres->fetch()) 
        {
            echo '<tr><td>' . $genre['nom_genre'] . '</td>';
            echo '<td><button class="bDelete">Supprimer</button> <button class="bMod">Modifier</button></tr>';
        }
        ?>
    </tbody>

<?php

$titre = "Liste des genres";
$contenu = ob_get_clean();
require "View/template.php";