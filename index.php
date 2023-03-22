<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/overlay.css" />
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="./css/footer.css" />
    <link rel="stylesheet" href="./css/nav.css">
    <link href='https://fonts.googleapis.com/css?family=Recursive' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<<<<<<<<< Temporary merge branch 1
    <!--XXXXXX <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"> -->
=========
    <!--test <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"> -->
>>>>>>>>> Temporary merge branch 2
    <link rel="icon" type="image/png" href="./images/favicon/favicon-32x32.png" />
    <title>AGEN ESCAPE - ACCUEIL</title>
  </head>
  <body>
    <div id="messageFormulaire" class="overlay">
      <div id="overlayBackground"></div>
      <div id="overlayMessage">
        <p>Votre message a bien été envoyé à notre équipe</p>
      </div>
      <!-- Button to close the overlay navigation -->
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    </div>
    <div class="container"> 
      <?php include_once __DIR__. '/includes/navbar.php';?> 
      <div class="slogan flex">
        <!-- <img alt="Escapez-vous de la routine!" src="./images/slogan.png"> -->
      </div>
      <div id="presentationEscape">
        <div class="welcomeText">
          <h1 class="textAnimation">ESCAPE GAME À AGEN</h1>
          <h2>BIENVENUE CHEZ AGEN ESCAPE !</h2>
        </div>
        <div class="flex">
          <div id="presentationAnimation">
            <p class="presentationText"></p>
          </div>
        </div>
      </div>
<<<<<<<<< Temporary merge branch 1
    <div id ="scenariosList" class="flex">
      <div class="subtitleStyle"><h2 class="subtitle">NOS SCENARIOS</h2></div>
      <div id="carrusel" class="slider">
        <div id="carrusel-slides" class="slides"></div>
        <button class="btn-prev"></button>
        <button class="btn-next"></button>
      </div>
    </div>
    <div id="nousTrouver" class="nousTrouver flex column">
      <div class="subtitleStyle"><h2 class="subtitle">NOUS TROUVER</h2></div>
=========
      <div id="scenariosList" class="flex">
        <div class="subtitleStyle">
          <h2 class="subtitle">NOS SCENARIOS</h2>
        </div>
        <div id="carrusel" class="slider">
          <div id="carrusel-slides" class="slides"></div>
          <button class="btn-prev"></button>
          <button class="btn-next"></button>
        </div>
      </div>
      <div id="nousTrouver" class="nousTrouver flex column">
        <div class="subtitleStyle">
          <h2 class="subtitle">NOUS TROUVER</h2>
        </div>
>>>>>>>>> Temporary merge branch 2
        <div class="map">
          <div id="map"></div>
        </div>
        <div class="informationMap">
          <div class="navigation">
            <p>Nous nous situons <span>7 Rue Paganel, 47000 Agen</span>
            </p>
            <p>Tél: <a id="tel"></a>
            </p>
            <a title="Naviguer avec Google Map" href="https://www.google.com/maps/search/?api=1&query=44.19858834985041,0.6318457930048904" target="_blank">
              <img alt="Icône de Google Map" src="./images/icon_googlemap.png">
            </a>
            <a title="Naviguer avec Waze" href="https://www.waze.com/fr/livemap/directions?to=ll.44.19858834985041%2C0.6318457930048904" target="_blank">
              <img alt="Icône de Waze" src="./images/icon_waze.png">
            </a>
            <!-- <p>(Cliquez sur une icône afin de lancer votre GPS)</p> -->
          </div>
<<<<<<<<< Temporary merge branch 1
      </div>


    </div>
    <!-- <hr> -->
    <div class="footer">
      <div class="copyright">
        <img class="logoFooter" src="./images/logo.png" />
        <p>Copyright © 2020 Agen Escape Mentions légales</p>
        <p>Création graphique <span class="spanNomGroupe">Studio chromatique</span>
        </p>
        <p>Développement  <span class="spanNomGroupe">Studio chromatique</span> Gestion des cookies </p>
        <hr>
        <div class="social">
        </div>
      </div>
      <div class="row input-container">
        <div>
          <div class="styled-input wide">
            <input id="name" type="text" required />
            <label>Nom</label>
          </div>
        </div>
        <div>
          <div class="styled-input wide">
            <input id="email" type="text" required />
            <label>Email</label>
          </div>
        </div>
        <div>
          <div class="styled-input wide">
            <textarea id="message" required></textarea>
            <label>Message</label>
          </div>
        </div>
        <div>
          <div id="formButton" class="btn-lrg submit-btn">Envoyer le message</div>
=========
>>>>>>>>> Temporary merge branch 2
        </div>
      </div>
      <!-- <hr> -->
    <?php include_once __DIR__. '/includes/footer.php';?>
    </div>
<<<<<<<<< Temporary merge branch 1
    </div>
    <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzXWmL8uaHo4sR7pP6wvOZ8LFMX0hqbWY&callback=initMap">
</script>
=========
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzXWmL8uaHo4sR7pP6wvOZ8LFMX0hqbWY&callback=initMap"></script>
>>>>>>>>> Temporary merge branch 2
    <script src="./js/map.js"></script>
    <script src="./js/scenarios.js"></script>
    <script src="./js/carrusel.js"></script>
    <!-- <script src="./js/nav.js"></script> -->
    <script src="./js/keystroke.js"></script>
    <script src="./js/tel.js"></script>
  </body>
</html>