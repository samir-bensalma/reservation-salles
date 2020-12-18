<?php
session_start();
require_once('function.php');
require_once('header.php')
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/connexion.css">
    <title>Ma salle - Connexion</title>
</head>

    <header>
        <?php
        echo $header;
        ?>
    </header>
    <body>
        <main>
            <div class="container col-3 mt-5 mb-0">
                <?php
                if (isset($_POST['submit'])){
                    connexion($_POST['login'],$_POST['password']);
                }
                ?>
            </div>

            <div class="container col-4 mt-0 border-0">
            <form method="post" action="" id="form" class="container col-10 pt-4 pb-4">
                <div class="form-group">
                    <label for="Login">Login</label>
                    <input type="text" class="form-control" name="login" id="login" placeholder="Entrez votre login">
                </div>
                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Entrez votre mot de passe">
                </div>
                <button type="submit" name="submit" id="submit" value="valider" class="btn btn-outline-primary">Valider</button>
            </form>
            </div>
        </main>
    </body>
    <?php footer() ?>
</html>