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
        <div class="container_nav">
            <div id="div_nav">
                <div id="div-ul">
                    <ul id="links_menu">

                    </ul>
                </div>
                <div class="icons"></div>
            </div>
            <div id="logo">
                <img src="./images/logo.png" alt="img_logo">
            </div>
            <img src="./images/menu-btn1.png" alt="menu_hamburger" class="menu_hamburger">
        </div>
        <div class="slogan flex">
            <!-- <img alt="Escapez-vous de la routine!" src="./images/slogan.png"> -->
    </div>

    <form class="formReservation"><!-- action="reservation.php" method="post" -->
        <div class="topform">
            <div class="elem-group">
                <label for="name">Nom</label>
                <input type="text" id="name" name="visitor_name" placeholder="Martin Bernard" pattern=[A-Z\sa-z]{3,20} required>
            </div>
            <div class="elem-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="visitor_email" placeholder="martin.bernard@email.com" required>
            </div>
            <div class="elem-group">
                <label for="phone">Téléphone</label>
                <input type="tel" id="phone" name="visitor_phone" placeholder="06 99 15 82 35" required>
            </div>
        </div>
        <div class="midform">
            <div class="elem-group inlined">
                <label for="adult">Adultes</label>
                <input type="number" id="adult" name="total_adults" placeholder="2" min="2" max="6" required>
            </div>
            <div class="elem-group inlined">
                <label for="child">Enfants</label>
                <input type="number" id="child" name="total_children" placeholder="2" min="2" max="6" required>
            </div>
            <div class="elem-group inlined">
                <label for="checkin-date">Jour</label>
                <input type="date" id="checkin-date" name="checkin" required>
            </div>
            <div class="elem-group inlined">
                <label>Heure</label>
                <select class="textarea">
                    <option selected value="0">Horaire</option>
                    <option value="1">10h - 11h</option>
                    <option value="2">11h - 12h</option>
                    <option value="3">13h - 14h</option>
                    <option value="4">14h - 15h</option>
                    <option value="5">15h - 16h</option>
                    <option value="6">16h - 17h</option>
                    <option value="7">17h - 18h</option>
                    <option value="8">18h - 19h</option>
                    <option value="9">19h - 20h</option>
                    <option value="10">20h - 21h</option>
                </select>
            </div>
            <div class="elem-group">
                <label >Scénarios</label>
                <select class="textarea1">
                    <option selected value="0">Scénarios</option>
                    <option value="1">Le Trésor du Shérif</option>
                    <option value="2">Contagion</option>
                    <option value="3">L'envol du phénix</option>
                    <option value="4">Le trésor des Pirates</option>
                    <option value="5">Urgence Spatiale</option>
                    <option value="6">Le Monde Fantastique</option>
                </select>
            </div>
        </div>
        <div class="elem-group">
            <label for="message">Plus d'informations?</label>
            <textarea id="message" name="visitor_message" placeholder="Envoyez un message" required></textarea>
        </div>
        <button type="submit">Réserver</button>
    </form>
    </div>
    <script src="./js/nav.js"></script>

</body>
</html>