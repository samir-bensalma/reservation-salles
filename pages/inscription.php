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
        <title>Ma salle - Inscription</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
              integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/inscription.css">
    </head>

    <header>
      <?php
      echo $header;
      ?>
    </header>
    <body>
    <main>
        <div>
            <div id="error_msg" class="container col-12">
            <?php
            if (!isset($_SESSION['login'])) {
            if (isset($_POST['submit'])) {
            register($_POST['login'], $_POST['password'], $_POST['cpassword']);
            }
            ?>
            </div>
        </div>
      <div class="container col-4 border-0 mt-5">
        <form action="" method="post" id="form" class="container pt-4 pb-4">
          <div id="form-1" class="form-group">
            <label>Login</label>
            <input type="text" class="form-control" name="login" placeholder="Entrez votre login">
          </div>
          <div class="form-group">
            <label>Mot de passe</label>
            <input type="password" class="form-control" name="password" placeholder="Entrez votre mot de passe">
          </div>
            <div class="form-group">
                <label>Confirmez le mot de passe</label>
                <input type="password" class="form-control" name="cpassword" placeholder="Entrez votre mot de passe">
            </div>
            <button type="submit" class="btn btn-outline-primary" name="submit" value="valider">Valider</button>
        </form>
      </div>
      <?php
        }
        elseif ($_SESSION['login']){
                echo '<div class="container alert alert-info text-info col-6 p-0 mt-5 text-center" style="font-size: 40px" role="alert" >' . "<p>"  . "Vous êtes déjà connecté" . "</p>" . "</div>";
            }
        ?>
    </main>
    </body>
    <?php
    footer();
    ?>
</html>



