<?php

ob_start();
$detailFilm = $films->fetch();

?>
<h2>Détail du film</h2>
<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">Titre du film</th>
            <th scope="col">Note</th>
            <th scope="col">Réalisateur</th>
            <th scope="col">Année</th>
            <th scope="col">Durée</th>
            <th scope="col"id="action">Action</th>
        </tr>
    </thead>
    <tbody>
     
<?php
$titre = "Détails films";
$contenu = ob_get_clean();
require "View/template.php";
