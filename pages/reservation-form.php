<?php

session_start();
require_once('function.php');
require_once('header.php')

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/reservation-form.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <title>Ma salle - Reservation</title>
</head>

<header>
    <?php
    echo $header;
    ?>
</header>
<body>
    <main>
        <?php
        if (isset($_SESSION['id'])) {
            if (isset($_POST['submit'])) {
                reservation($_POST['titre'], $_POST['description'], $_POST['date'], $_POST['heure']);
            }
        }else echo '<div class="container alert alert-info text-info col-6 p-0 mt-5 text-center" style="font-size: 40px" role="alert" >' . "<p>"  . "Merci de vous connecter avant de réserver" . "</p>" . "</div>";

        ?>
        <form method="post" id=booking class="container col-4 mt-5 p-2">
            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre" maxlength ="50" placeholder="Nom de l'évènement">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" maxlength ="150"placeholder="Description de l'évènement"></textarea>
            </div>
            <div class="form-group">
                <label for="date">Date de l'évènement</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>
            <div class="form-group">
                <label for="Heure de début">Sélectionner l'heure de début</label>
                <select class="heure" name="heure">;
                <?php
                option();
                ?>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary" value="valider">Envoyer</button>
        </form>
    </main>
</body>
    <?php
    footer()
    ?>

</html>
