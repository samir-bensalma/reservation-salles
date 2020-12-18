<?php

///////// Fonction inscription /////////
function register($login,$password,$cpassword){
    $pdo = new PDO('mysql:dbname=reservationsalles;host=localhost',"root","");
    $login=htmlspecialchars($login);
    $password=htmlspecialchars($password);
    $cpassword=htmlspecialchars($cpassword);
    $hash_password="";
    $msg="";
    $msg=array();

    $query = $pdo -> prepare("SELECT COUNT(*) FROM utilisateurs WHERE login = :login");
    $query -> execute(['login'=>$login]);
    if($query === false){
        die('Erreur de connexion sql');
    }
    $result = $query->fetchColumn();
    if ($result==0) {
        if (empty(trim($login)) || (empty(trim($password))) || (empty(trim($cpassword)))) {
            if (!empty(trim($login))) {
            } else array_push($msg, "Merci de compléter le login");
            //Si c'est le login => message erreur
            if (!empty(trim($password))) {
            } else array_push($msg, "Merci d'entrer un mot de passe");
            //Si c'est le mot de passe => message erreur
            if (!empty(trim($cpassword))) {
            } else array_push($msg, "Merci de confirmer le mot de passe");
            //Si c'est la confirmation du mot de passe => message erreur
        }
    } else array_push($msg, "Le login existe déjà");


    if(!empty(trim(($password)) && !empty(trim($cpassword)))) {
        if ($password != $cpassword) {
            array_push($msg, "les deux mots de passe ne sont pas identiques");
        }
    }
    $count=count($msg);
    if ($count==0) {
        $hash_password = password_hash($password, PASSWORD_BCRYPT);
        $query_insert = $pdo->prepare("INSERT INTO utilisateurs(login,password) VALUES (:login, :password)");
        $query_insert->bindParam(':login', $login);
        $query_insert->bindParam(':password', $hash_password);
        $query_insert->execute();
        $_SESSION['login'] = $login;
        echo '<div class="container alert alert-info text-info col-3 p-0 mt-1 text-center" role="alert" >' . "<p>" . "Bravo, vous êtes bien inscrit" ."<br>" . "Votre login est" . " " . $_SESSION['login'] . "<br>" . "Vous allez être automatiquement redirigé vers l'accueil" . "</p>" . "</div>";
        header('refresh:3, url="../index.php');
    }
    foreach ($msg as $msg_error){
        echo  '<div class="container alert alert-danger text-danger col-3 p-0 mt-1 text-center" role="alert" >' . "<p>" . "<br>" . $msg_error . "<br>" . "<p>" . "</div>";
    }
}

///////// Fonction Connexion /////////
function connexion($login,$password){
    $pdo = new PDO('mysql:dbname=reservationsalles;host=localhost',"root","");
    $login=htmlspecialchars($login);
    $password=htmlspecialchars($password);

    if (!empty($login) || !empty($password)){
        $query = $pdo -> prepare("SELECT * FROM utilisateurs WHERE login = :login");
        $query -> execute(['login'=>$login]);
        $result = $query -> fetch(PDO::FETCH_ASSOC);
        if (isset($result['id'])){
            if (password_verify($password,$result['password'])){
                $_SESSION['login'] = $login;
                $_SESSION['id'] = $result['id'];
                echo '<div class="container alert alert-info text-info col-12 p-0 mt-1 text-center" role="alert" >' . "</p>" . "Bienvenue" . " " . $_SESSION['login'] . " " . "vous êtes connecté" . "<br>" . "Vous allez être automatiquement redirigé vers l'accueil" . "</p>". "</div>";
                header('Refresh: 3;url=../index.php');
            }else echo'<div class="container alert alert-danger text-danger col-12 p-0 mt-1 text-center" role="alert" >' . "<p>" . "Le mot de passe est incorrect" . "</p>" . "</div>";
        }else echo '<div class="container alert alert-danger text-danger col-12 p-0 mt-1 text-center" role="alert" >' . "<p>" . "Le login n'existe pas" . "</p>" . "</div>";
    }else echo '<div class="container alert alert-danger text-danger col-12 p-0 mt-1 text-center" role="alert" >' . "<p>" . "Merci de compléter les deux champs" . "</p>" . "</div>";
}

///////// Fonction modification du login /////////
function login($login,$password){
    $msg=[];
    $login = htmlspecialchars($login);
    $password = htmlspecialchars($password);
    if (empty(trim($login)) || empty(trim($password))) {
        //Vérifie si l'un des champs est vide => Car nécessité d'entrer le mdp pour modifier login
        if (!empty(trim($login))) {
        } else array_push($msg, "Merci de compléter le login");
        //Si c'est le login => message erreur
        if (empty(trim($password))) {
        } else array_push($msg, "Merci de compléter le mot de passe");
        //Si c'est le login => message erreur
    }
    $count = count($msg);
    // Si le tableau est vide cela signifie que nous pouvons commencer à vérifier les données et les insérer
    if ($count == 0) {
        $pdo = new PDO("mysql:dbname=reservationsalles;host=localhost", 'root', '');
        $query = $pdo->prepare("SELECT password FROM utilisateurs WHERE login=:login");
        $query->execute(['login' => $_SESSION['login']]);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $cpassword = $result['password'];
        //Recherche du mot de passe pour comparaison
        if (password_verify($password, $cpassword)) {
        } else array_push($msg, "Le mot de passe est incorrect");

        $query = $pdo->prepare("SELECT login FROM utilisateurs WHERE login=:login");
        $query->execute(['login' => $login]);
        $result = $query->fetchColumn();
        if (count($msg) == 0) {
            //Recherche si le login proposé est déjà dans la base
            if ($result == false) {
                $update = $pdo->prepare("UPDATE utilisateurs SET login = :login WHERE login = :session ");
                $update->bindParam("login", $login);
                $update->bindParam("session", $_SESSION['login']);
                $update->execute();
                $_SESSION['login'] = $login;
                //Update de la bdd et de la variable de session
                echo '<div class="container alert alert-info text-info col-6 p-0 mt-1 text-center" role="alert" >' . "</p>" .  "Le login à bien été modifié" . "<br>" . "Nouveau login:" . " " . $_SESSION['login'] . "</p>" . "</div>";
            } else array_push($msg, "Le login existe déjà");
        }
    }

    //Affichage du message d'erreur ou de succés
    foreach ($msg as $error) {
        echo  '<div class="container alert alert-danger text-danger col-6 p-0 mt-1 text-center" role="alert" >' . "<p>" . "<br>" . $error . "<br>" . "<p>" . "</div>";

    }
}
///////// Fonction modification du mot de passe /////////
function password($password,$cpassword1,$cpassword2){
    $msg=[];
    $password = htmlspecialchars($password);
    $cpassword1 = htmlspecialchars($cpassword1);
    $cpassword2 = htmlspecialchars($cpassword2);
    if (empty(trim($password)) || empty(trim($cpassword1)) || empty(trim($cpassword2))) {
        //Vérifie si l'un des champs est vide => Car nécessité d'entrer le mdp pour modifier login
        if (empty(trim($password))) {
            array_push($msg, "Merci de confirmer votre mot de passe actuel");
            //Si c'est le login => message erreur
        }
        if (empty(trim($cpassword1))) {
            array_push($msg, "Complétez votre nouveau mot de passe");
            //Si c'est le login => message erreur
        }
        if (empty(trim($cpassword2))) {
            array_push($msg, "Confirmez le nouveau mot de passe");
            //Si c'est le login => message erreur
        }
    }
    $count=count($msg);
    if ($count == 0){
        $pdo = new PDO('mysql:dbname=reservationsalles;host=localhost', 'root', '');
        $query = $pdo->prepare("SELECT password FROM utilisateurs WHERE login=:login");
        $query->execute(['login' => $_SESSION['login']]);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $bdd_password = $result['password'];

        if (password_verify($password,$bdd_password)){
            if ($cpassword1==$cpassword2){
                $cpassword1 = password_hash($cpassword1,PASSWORD_BCRYPT);
                $update = $pdo -> prepare("UPDATE utilisateurs SET password = :password WHERE login = :login");
                $update -> bindParam("password", $cpassword1);
                $update -> bindParam("login", $_SESSION['login']);
                $update -> execute();
                echo '<div class="container alert alert-info text-info col-6 p-0 mt-1 text-center" role="alert" >' . "</p>" . "Le mot de passe a bien été modifié" . "</p>" . "</div>";
            } else array_push($msg,"Les deux nouveaux mots de passe ne sont pas identiques");
        } else array_push($msg,"Le mot de passe est incorrect");
    }
    //Affichage du message d'erreur ou de succés
    foreach ($msg as $error) {
        echo  '<div class="container alert alert-danger text-danger col-6 p-0 mt-1 text-center" role="alert" >' . "<p>" . "<br>" . $error . "<br>" . "<p>" . "</div>";

    }
}

function option()
{
    for ($i = 8; $i <= 18; $i++) {
        echo "<option>" . $heure_debut = date('H', mktime($i)) . ":" . "00" . " " . $heure_fin = date('H', mktime($i+1)) . ":" . "00" . "</option>";
    }

}

///////// Fonction réservation/////////
function reservation($titre,$description,$date,$heure){
    $titre=htmlspecialchars($titre);
    $description=htmlspecialchars($description);
    $date=htmlspecialchars($date);
    $heure=htmlspecialchars($heure);

    $pdo = new PDO('mysql:dbname=reservationsalles;host=localhost', 'root', '');
    $msg=[];
    if (!empty(trim($titre))){
    }else array_push($msg,"Merci j'ajouter un titre à votre évènement");
    if (!empty(trim($description))){
    }else array_push($msg,"Merci j'ajouter une description à votre évènement");
    if (!empty($date)){
    }else array_push($msg,"Merci j'ajouter une description à votre évènementde choisir une date");
    if ($date > date('Y-m-d')){
    } else array_push($msg, "La date selectionnée est inférieure à la date du jour, merci de selectionner une autre date");
    $date_compare=date('D', strtotime($date));
    if($date_compare!='Sat'){
    } else array_push($msg,"Il n'est pas possible de réserver de salle le samedi, veuillez sélectionner un autre jour");
    if($date_compare!='Sun'){
    } else array_push($msg,"Il n'est pas possible de réserver de salle le dimanche, veuillez sélectionner un autre jour");
    if (!empty($heure)){
    }else array_push($msg,"Merci de choisir une heure de début");

    // Vérification que les champs sont bien complétés

    $count=count($msg);
    if ($count==0){
        $heure_debut = substr($heure,0,-6);
        $heure_fin = substr($heure,6,6);
        $debut = $date . " " .  $heure_debut . ":00";
        $fin = $date . " " . $heure_fin . ":00";

        //Extraction de l'heure de début et de fin du select pour concaténation avec la date
        $query = $pdo->prepare("SELECT * FROM reservations WHERE (debut=:debut)");
        $query -> execute(['debut'=>$debut]);
        $result = $query->fetchColumn();
  
        //Contrôle de doublons de réservation
        if (!$result){

            // Si pas de doublons, insertion de la réservation dans la base de données
            $query = $pdo -> prepare("INSERT INTO `reservations`(`titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES (:titre,:description,:debut,:fin,:id_utilisateur)");
            $query -> execute(['titre'=>$titre,'description'=>$description, 'debut'=>$debut,'fin'=>$fin,'id_utilisateur'=>$_SESSION['id']]);
            echo '<div class="container alert alert-info text-info col-3 p-0 mt-1 text-center" role="alert" >' . "</p>" ."Merci" . " " . $_SESSION['login'] . " " . "Votre réservation à bien été prise en compte<br>". "Du". " " . date('d.m.Y H',strtotime($debut)) ."h". " " . "au". " " .date('d.m.Y H',strtotime($fin))."h" . "<p>" . "</div>";
        }else echo '<div class="container alert alert-danger text-danger col-4 p-0 mt-1 text-center" role="alert" >' . "<p>" ."Désolé, ce créneau n'est pas disponible". "</p>" . "</div>";

    }else
        foreach ($msg as $error) {
            echo  '<div class="container alert alert-danger text-danger col-4 p-0 mt-1 text-center" role="alert" >' . "<p>" . "<br>" . $error . "<br>" . "<p>" . "</div>";
            // Affichage des erreurs
    }
}


?>











