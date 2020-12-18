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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/profil.css">
    <title>Reservation salles</title>
</head>
<body>
    <header>
        <?php
        echo $header;
        ?>
    </header>
    <main>
        <div id="gauche">
            <?php
            if (isset($_POST['submit_login'])){
                login($_POST['login'],$_POST['password']);
            }
            ?>
            <div class="container col-10 mt-5 border-0">
                <form action="" method="post" id="form" class="container col-8 pt-4 pb-4">
                    <div class="form-group">
                        <p><b>Votre login actuel:</b> <?php echo $_SESSION['login']?></p>
                        <label for="Login">Nouveau Login</label>
                        <input type="text" class="form-control" name="login" id="login">
                    </div>
                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <button type="submit" name="submit_login" id="submit_login" value="valider" class="btn btn-outline-primary">Valider</button>
                </form>
            </div>
        </div>
        <div id="droite">
            <?php
            if(isset($_POST['submit_pass'])){
                password($_POST['password'],$_POST['cpassword1'],$_POST['cpassword2']);
            }
            ?>
            <div class="container col-10 mt-5 border-0">
                <form action="" method="post" id="form" class="container col-8 pt-4 pb-4">
                    <div class="form-group">
                <label for="password">Entrez votre mot de passe</label>
                <input type="text" class="form-control" name="password" id="password">
            </div>
            <div class="form-group">
                <label for="Password">Nouveau mot de passe</label>
                <input type="password" class="form-control" name="cpassword1" id="cpassword1">
            </div>
            <div class="form-group">
                <label for="Password">Confirmez le nouveau mot de passe</label>
                <input type="password" class="form-control" name="cpassword2" id="cpassword2">
            </div>
            <button type="submit" name="submit_pass" id="submit_pass" value="valider" class="btn btn-outline-primary">Valider</button>
            </form>
        </div>
    </main>
</body>
    <?php
    footer()
    ?>

</html>