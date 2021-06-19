<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <title>Document</title>
</head>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php?page=accueil">monBoChapo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        
      <li class="nav-item">
          <a class="nav-link" href="index.php?page=boutique">Boutique</a>
        </li>

        <?php if(!isset($_SESSION["type"])){ ?>

            <li class="nav-item">
          <a class="nav-link" href="index.php?page=inscription">Inscription</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="index.php?page=connexion">Connexion</a>
        </li>

        <?php } else {?>

            <li class="nav-item">
          <a class="nav-link" href="index.php?page=compte">Compte</a>
        </li>

            <li class="nav-item">
          <a class="nav-link" href="scripts-php/deconnexion.php">Déconnexion</a>
        </li>
        
        <?php
if($_SESSION["type"]==1){?>

<li class="nav-item">
          <a class="nav-link" href="index.php?page=admin">Admin</a>
        </li>

        <?php } }?>

      </ul>
    </div>
  </div>
</nav>