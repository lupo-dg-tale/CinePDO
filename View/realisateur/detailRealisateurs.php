<?php

ob_start();

$detailRealisateur = $detailRealisateurs->fetch();
?>

<h2>Filmographie</h2>
<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Date de naissance</th>   
        </tr>
    </thead>
    <tbody>
        <?php

echo '<tr><td>' . $detailRealisateur['nom_realisateur'] . '</td>';
echo '<td>' . $detailRealisateur['prenom_realisateur'] . '</td>';
echo '<td>' . $detailRealisateur['date_naissance'] . '</td></tr>';


?>
</table>
<ul>
    <?php

    if ($filmoReals->rowCount() == 0) {
        echo 'Pas de films pour ce réalisateur';
    } else {
        while($filmoReal = $filmoReals->fetch())
        {
        echo '<li>'. $filmoReal['titre'].' sortie en '.$filmoReal['annee'].'</li>';
        }
    }
    
   
?>
</ul>


<?php
$titre = "Filmographie";
$contenu = ob_get_clean();
require "View/template.php";