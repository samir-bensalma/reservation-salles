
<?php
session_start();
require_once('header.php');
require_once('function.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/reservation.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <title>Ma salle - Reservation </title>
</head>
<header>
   <?php
    echo $header;
   ?>
</header>
<body>
    <main>
        <img class="align-self-center" src="../img/planning-banner.png" width=250px height=auto >
        <div id="booking" class="container col-4 mt-5 p-0">
            <?php
            if (isset($_GET['id'])) {
                $id_event=$_GET['id'];
                $pdo = new PDO('mysql:dbname=reservationsalles;host=localhost', 'root', '');
                $query= $pdo -> prepare ("SELECT * FROM utilisateurs RIGHT JOIN reservations ON reservations.id_utilisateur = utilisateurs.id WHERE reservations.id=:id");
                $query->execute(['id' => $id_event]);
                $allresult = $query->fetch(PDO::FETCH_ASSOC);

                echo '<div class=" container text-center col-10 mt-3 mb-3 pt-2 pb-2">';
                echo "<u>Détails de la réservation :</u>" . "<br>";
                echo "<i>Réserver par :</i>" . " " . $allresult['login'] . "<br>";
                echo "<i>Nom de l'évènement :</i>" . " " . $allresult['titre'] . "<br>";
                echo "<i>Description :</i>" . " " . $allresult['description'] . "<br>";
                echo "<i>Du :</i>" . " " . date('d.m.Y H',strtotime($allresult['debut'])) . "h" . "<br>";
                echo "<i>Au :</i>" . " " . date('d.m.Y H',strtotime($allresult['fin'])) . "h";
                echo '</div>';
            } ?>
        </div>
    </main>
</body>
<?php
footer()
?>
</html>