<?php

ob_start(); //permet de stocker dans une mémoire tampon le contenu ou partie d'une page 

?>

<h2>Au travail les dl Colmar</h2>
<div>




</div>
<?php

$titre = "Page d'accueil de Filmociné";
$contenu = ob_get_clean(); // permet de récuperer le contenu de la mémoire tampon et de le stocker dans une variable et d'effacer la mémoire tampon
require "template.php"; // connexion avec le template sur lequel on veut afficher le contenu
echo $contenu;