<?php
session_start();
require_once('pages/header.php')
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poiret+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Shade&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <title>Ma salle - Accueil</title>
</head>

<body>
    <header>
        <?php
        echo $header_accueil;
        ?>
    </header>
    <div class="corps">
        <img src="img/header.png">
        <h1>Bienvenue</h1>
        <p class="txt"><b>Si vous cherchez une salle pour organiser un évènement unique, vous êtes au bon endroit!</b></p>
        <p class="txt">Créer un compte ou connectez-vous pour réserver directement en ligne</p>
    </div>
</body>
    <?php footer() ?>
</html>

