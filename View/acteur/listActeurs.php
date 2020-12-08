<?php

ob_start(); //permet de stocker dans une mémoire tampon le contenu ou partie d'une page 

?>
<h2>Liste des acteurs</h2>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

<?php

while($acteur = $acteurs->fetch())
{
echo '<tr><td><a href="index.php?action=detailActeurs&id='.$acteur["id_acteur"].'">' . $acteur['nom_acteur'] . '</a></td>';
echo '<td>'.$acteur['prenom_acteur'].'</td>';  
echo '<td><button class="bDelete">Supprimer</button> <button class="bMod">Modifier</button></tr>'; 
}

$titre = "Liste des acteurs"; //le contenu de cette variable est appelé dans le <title> du template.php
$contenu = ob_get_clean(); // permet de récuperer le contenu de la mémoire tampon et de le stocker dans une variable et d'effacer la mémoire tampon
require "View/template.php"; // connexion avec le template sur lequel on veut afficher le contenu
