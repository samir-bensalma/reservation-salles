<?php
session_start();
require_once('function.php');
require_once('header.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/planning.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <title>Ma salle - Planning </title>
</head>
<body>
    <header>
       <?php
        echo $header;
       ?>
    </header>
    <main>
        <img class="align-self-center" src="../img/planning-banner.png" width=250px height=auto>
        <table class="table-light container table-bordered col-11 mt-5 mb-2">
        <?php
        $pdo = new PDO('mysql:dbname=reservationsalles;host=localhost', 'root', '');
        $query= $pdo -> prepare ("SELECT * FROM utilisateurs RIGHT JOIN reservations ON reservations.id_utilisateur = utilisateurs.id");
        $query -> execute();
        $allresult = $query -> fetchAll(PDO::FETCH_ASSOC);
        $tab_jour=[];
        $tab_heure=[];
        for ($i=0;$i<=5;$i++){
            $today=date('Y-m-d');
            $jour = date('Y-m-d', strtotime("+".$i."day", strtotime($today)));
            array_push($tab_jour,$jour);
        }
        for ($j=8;$j<=19;$j++){
            $heure = date('H:i:s',strtotime($j.":00:00"));
            array_push($tab_heure,$heure);
        }
        $debut_evenement=date('Y-m-d H:i:s',strtotime("$jour $heure"));

        for ($i=0;isset($tab_jour[$i]);$i++){
            echo "<tr>" . "<th scope=row>" . date('d-m-Y',strtotime($tab_jour[$i]));
            if (date('D',strtotime($tab_jour[$i])) !=='Sat'){
                if (date('D',strtotime($tab_jour[$i])) !=='Sun'){
                    for ($j=0;isset($tab_heure[$j]);$j++){
                        echo "<td>" . date('H', strtotime($tab_heure[$j]))."h";
                        $date_event = date('Y-m-d H:i:s',strtotime($tab_jour[$i] . " " . $tab_heure[$j]));
                        for ($k=0;!empty($allresult[$k]);$k++)
                            if ($allresult[$k]['debut']==$date_event){
                                echo "<br>" . "<h5>" . "Réservé par :   " . " " . $allresult[$k]['login'] . "</h5>";
                                echo "<br>" . "<b>" . "<i>" . "Evènement :" . " " . $allresult[$k]['titre'] . "<i>" . "<b>"
                                ?>
                                <form method=get action="reservation.php">
                                    <input type="hidden" id="id" name="id" value="<?php echo $allresult[$k]['id']?>">
                                    <input type=submit value="Voir la réservation" class="btn btn-outline-info btn-sm">
                                </form>
                                <?php
                                } echo "</td>";
                    }echo  "</td>";
                } else echo "<td colspan=12>" .  "Indisponible" . "</td>" . "</tr>";
            }else echo "<td colspan=12>" .  "Indisponible";
        } echo "</th>" . "</tr>";
        ?>
        </table>
    </main>
</body>
    <?php
    footer()
    ?>
</html>