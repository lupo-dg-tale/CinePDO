<?php

ob_start(); //permet de stocker dans une mémoire tampon le contenu ou partie d'une page 

?>

<h2>Bienvenue sur FilmoCinema</h2>
<br>
<br>
<br>
<img id="accueil" src="./Public/img/accueil.png" alt="camera">


<?php

$titre = "Page d'accueil de FilmoCinema";
$contenu = ob_get_clean(); // permet de récuperer le contenu de la mémoire tampon et de le stocker dans une variable et d'effacer la mémoire tampon
require "View/template.php"; // connexion avec le template sur lequel on veut afficher le contenu
