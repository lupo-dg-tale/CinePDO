<?php

ob_start();

$detailActeur = $detailActeurs->fetch();
?>

<h2>Filmographie</h2>
<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Sexe</th>
            <th scope="col">Date de naissance</th>   
        </tr>
    </thead>
    <tbody>
        <?php

echo '<tr><td>' . $detailActeur['nom_acteur'] . '</td>';
echo '<td>' . $detailActeur['prenom_acteur'] . '</td>';
echo '<td>' . $detailActeur['sexe'] . '</td>';
echo '<td>' . $detailActeur['date_naissance'] . '</td></tr>';


?>
</table>
<ul>
    <?php
    if($filmographies->rowCount() == 0) {
        echo "Pas de films pour cet acteur";
    } else{
        while($filmographie = $filmographies->fetch())
        {
            echo '<li>'. $filmographie['titre']. ' ' .$filmographie['nom_role']. '</li>';
        }
    }
?>
</ul>


<?php
$titre = "Filmographie";
$contenu = ob_get_clean();
require "View/template.php";

