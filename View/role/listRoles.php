<?php

ob_start();

?>
<h2>Nombre de Rôles : <?= $roles->rowCount(); ?></h2>
<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">Nom</th>      
            <th scope="col"id="action">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($role = $roles->fetch()) 
        {
            echo '<tr><td>' . $role['nom_role'] . '</td>';
            echo '<td><button class="bDelete">Supprimer</button> <button class="bMod">Modifier</button></tr>';
        }
        ?>
    </tbody>

<?php

$titre = "Liste des rôles";
$contenu = ob_get_clean();
require "View/template.php";