<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="Public/css/style.css">

    <title><?=$titre?></title>
</head>
<body>

<nav id="nav"class="navbar navbar-expand-lg navbar-light bg-dark">
  <a class="navbar-brand" href="index.php?action=accueil">FilmoCinema</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php?action=listActeurs" style="color:white">LISTE DES ACTEURS <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?action=listFilms" style="color:white">LISTE DES FILMS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?action=listRealisateurs" style="color:white">LISTE DES REALISATEURS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?action=listGenres" style="color:white">LISTE DES GENRES</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?action=listRoles" style="color:white">LISTE DES ROLES</a>
      </li>
  
    </ul>
  </div>
</nav>

<div>
<?= 
$contenu
?>  
</div>  
</body>
</html>