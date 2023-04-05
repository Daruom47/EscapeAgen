<?php
session_start();
require __DIR__ . "/includes/config.php";
require __DIR__ . "/includes/fonctions.php";
require_once __DIR__ . "/class/scenario.class.php";
require_once __DIR__ . "/class/reservations.class.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, user-scalable=no">
    <title>AGEN ESCAPE - RESERVATIONS</title>
    <link rel="stylesheet" href="./css/reservation.css">
    <link rel="stylesheet" href="./css/overlay.css" />
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="./css/nav.css">
    <link href="https://fonts.googleapis.com/css2?family=Recursive&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Recursive' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"> -->
    <link rel="icon" type="image/png" href="./images/favicon/favicon-32x32.png" />
</head>
<body>
    <div id="messageFormulaire" class="overlay">
        <div id="overlayBackground"></div>
        <div id="overlayMessage"><p>Votre message a bien été envoyé à notre équipe</p></div>
        <!-- Button to close the overlay navigation -->
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    </div>
    <div class="container">
    <?php include_once __DIR__. '/includes/navbar.php';?> 
        <div class="slogan flex">
            <!-- <img alt="Escapez-vous de la routine!" src="./images/slogan.png"> -->
    </div>

    <form class="formReservation" method="post"><!-- action="reservation.php" method="post" -->
        <div class="topform">
        <h2 id="titreReservation">Formulaire de réservation</h2>
            <div class="elem-group">
                <label for="name">Nom*</label>
                <input type="text" id="name" name="visitor_name" placeholder="Martin Bernard" pattern=[A-Z\sa-z]{3,20} required>
            </div>
            <div class="elem-group">
                <label for="email">E-mail*</label>
                <input type="email" id="email" name="visitor_email" placeholder="martin.bernard@email.com" required>
            </div>
            <div class="elem-group">
                <label for="phone">Téléphone*</label>
                <input type="tel" id="phone" name="visitor_phone" placeholder="06 99 15 82 35" required>
            </div>
        </div>
        <div class="midform">
            <div class="elem-group inlined">
                <label for="adult">Adultes*</label>
                <input type="number" id="adult" name="total_adults" value="0" min="0" max="10" required>
            </div>
            <div class="elem-group inlined">
                <label for="child">Enfants*</label>
                <input type="number" id="child" name="total_children" value="0" min="0" max="10" required>
            </div>
            <div class="elem-group inlined">
                <label for="checkin-date">Jour*</label>
                <?php
                $timestamp = time() + 3600*24;
                $date_utc = gmdate('Y-m-d',$timestamp);?>
                <input type="date" id="checkin-date" name="jour" required min="<?php echo $date_utc;?>">
            </div>
            <div class="elem-group inlined">
                <label>Heure*</label>
                <select class="textarea" name="heure" required>
                    <option selected value="0">Horaire</option>
                    <option value="10:00:00">10h - 11h</option>
                    <option value="11:00:00">11h - 12h</option>
                    <option value="13:00:00">13h - 14h</option>
                    <option value="14:00:00">14h - 15h</option>
                    <option value="15:00:00">15h - 16h</option>
                    <option value="16:00:00">16h - 17h</option>
                    <option value="17:00:00">17h - 18h</option>
                    <option value="18:00:00">18h - 19h</option>
                    <option value="19:00:00">19h - 20h</option>
                    <option value="20:00:00">20h - 21h</option>
                </select>
            </div>
            <div class="elem-group">
                <label for="scenario">Scénario*</label>
                <select class="textarea1" name="scenario" required>
                    <option selected value="0">Scénarios</option>
                    <?php
                    $s = new Scenario();
                    $vallue = 0;
                    foreach ($s->getList(true) as $resultat){
                        $vallue++;
                        echo '<option value="' .$resultat["id"]. '">' .$resultat["nom"]. '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="elem-group">
            <label for="message">Plus d'informations ?</label>
            <textarea id="message" name="visitor_message" placeholder="Envoyez un message"></textarea>
        </div>
        <button name="Confirmer" id="EnvoieForm" type="submit">Réserver</button>
        <?php
        if(isset($_POST["Confirmer"])){
            $r = new Reservations();
            if($r -> playerlimit($_POST['total_children'],$_POST['total_adults'],$s -> get($_POST['scenario'])["min_players"],$s -> get($_POST['scenario'])["max_players"]) == true){
                if($r -> reservationExist($_POST['scenario'], $_POST['jour'], $_POST['heure']) == false){
                    $r -> insert(($_SESSION['id'] =! null ? $_SESSION['id'] : null),
                    htmlspecialchars($_POST['scenario']),
                    htmlspecialchars($_POST['visitor_name']),
                    htmlspecialchars($_POST['visitor_email']),
                    htmlspecialchars($_POST['visitor_phone']),
                    htmlspecialchars($_POST['total_adults']),
                    htmlspecialchars($_POST['total_children']),
                    htmlspecialchars($_POST['jour']),
                    htmlspecialchars($_POST['heure']),
                    (isset($_POST['visitor_message']) ? $_POST['visitor_message'] : null));
                    echo 'Votre réservation a bien été envoyée, merci et à bientôt !';
                }
                else
                echo 'Ce créneau a déjà été réservé, veuillez en choisir un autre.';
            }
            else
            echo 'Veuillez respecter le nombre de joueurs du scénario "'.$s -> get($_POST['scenario'])["nom"].'" qui doit être compris entre '.$s -> get($_POST['scenario'])["min_players"].' et '.$s -> get($_POST['scenario'])["max_players"].'.';
            }
        ?>
    </form>
    </div>
    <!-- <script src="./js/nav.js"></script> -->
    
</body>
</html>