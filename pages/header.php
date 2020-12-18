<?php
//////////// Header page accueil ////////////////
if(!isset($_SESSION['login'])){
 $header_accueil='<header class="no_connexion">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Ma Salle</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/inscription.php">Inscription</a>
      </li>
    </ul>
    <form class="form-inline my-auto" method="post">
    <a href="pages/connexion.php"><button class="btn btn-outline-success" name="connexion" value="connexion" type="button">Connexion</button></a>
  </form>
  </div>
</nav>
</header>';
} else $header_accueil= '<header class="connexion">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Ma Salle</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/profil.php">Mon profil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/planning.php">Planning réservation</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="pages/reservation-form.php">Réserver</a>
    </li>
    </ul>
    <form class="form-inline my-auto" method="post">
    <a href="pages/logout.php"><button class="btn btn-outline-danger" name="deconnexion" value="deconnexion" type="button">Deconnexion</button></a>
  </form>
  </div>
</nav>
</header>';


//////////// Header autre page ////////////////

if(!isset($_SESSION['login'])){
 $header='<header class="no_connexion">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Ma Salle</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../index.php">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="inscription.php">Inscription</a>
      </li>
    </ul>
    <form class="form-inline my-auto" method="post">
    <a href="connexion.php"><button class="btn btn-outline-success my-2 my-sm-0" name="connexion" value="connexion" type="button">Connexion</button></a>
  </form>
  </div>
</nav>
</header>';
} else $header= '<header class="connexion"> 
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Ma Salle</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../index.php">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profil.php">Mon profil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="planning.php">Planning réservation</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="reservation-form.php">Réserver</a>
    </li>
    </ul>
    <form class="form-inline my-auto" method="post">
    <a href="logout.php"><button class="btn btn-outline-danger my-2 my-sm-0" name="deconnexion" value="deconnexion" type="button">Deconnexion</button></a>
  </form>
  </div>
</nav>
</header>';
?>
<?php

////////////// Fonction footer ///////////////////////////
function footer(){
?>
<footer id="footer" class="bg-dark text-center text-light">
    <div class="container p-1">
        <div class="row">
            <div class="col-lg-12">
                <p class="m-0" style="font-size: 15px">Reservation salles | La Plateforme, 2 rue d'Hozier 13002 Marseille</p>
            </div>
        </div>
    </div>
</footer>
<?php
}
?>