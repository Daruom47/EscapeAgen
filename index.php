<?php
require_once __DIR__ . "/includes/config.php";
require_once __DIR__ . "/includes/fonctions.php";
require_once __DIR__ . "/class/scenario.class.php";
?>
<!DOCTYPE html>
<html lang="fr">

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
  <link rel="icon" type="image/png" href="./images/favicon/favicon-32x32.png" />
  <title>AGEN ESCAPE - ACCUEIL</title>
</head>

<body>
  <div id="messageFormulaire" class="overlay">
    <div id="overlayBackground"></div>
    <div id="overlayMessage">
      <p>Votre message a bien été envoyé à notre équipe</p>
    </div>
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  </div>
  <div class="container"> <?php include_once __DIR__ . "/includes/navbar.php"; ?> <div class="slogan flex"></div>
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
    <div id="scenariosList" class="flex">
      <div class="subtitleStyle">
        <h2 class="subtitle">NOS SCENARIOS</h2>
      </div>
      <div id="carrusel" class="slider">
        <div id="carrusel-slides" class="slides"> 
          <?php 
            $s = new Scenario(); 
            foreach ($s->getList() as $resultat) :
          ?> <div class="slide">
              <div class="scenario">
                <div class="content">
                  <div class="scenario-title">
                    <p> <?= $resultat["nom"] ?> </p>
                  </div>
                  <a href="./scenario-
													<?= $resultat["id"] ?>">
                    <div class="content-overlay"></div>
                    <img class="content-image" src="
														<?= $resultat["image"] ?>" alt="
														<?= $resultat["nom"] ?>">
                    <div class="content-details fadeIn-bottom">
                      <p class="content-text"> <?= $resultat["short_resume"] ?> </p>
                      <hr class="separator">
                      <div class="scenario-details flex">
                        <div class="flex">
                          <span class="badge info"> <?= DIFFICULTY[$resultat["difficulty"]] ?> </span>
                        </div>
                        <div class="flex">
                          <span class="badge info"> <?= $resultat["min_players"] ?>à <?= $resultat["max_players"] ?> joueurs </span>
                        </div>
                        <div class="flex">
                          <span class="badge info"> <?= $resultat["time_mins"] ?> mins </span>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div> <?php endforeach; ?> </div>
        <button class="btn-prev"></button>
        <button class="btn-next"></button>
      </div>
    </div>
    <div id="nousTrouver" class="nousTrouver flex column">
      <div class="subtitleStyle">
        <h2 class="subtitle">NOUS TROUVER</h2>
      </div>
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
        </div>
      </div> <?php include_once __DIR__ . "/includes/footer.php"; ?>
    </div>
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzXWmL8uaHo4sR7pP6wvOZ8LFMX0hqbWY&callback=initMap"></script>
    <script src="./js/map.js"></script>
    <!-- <script src="./js/scenarios.js"></script> -->
    <script src="./js/carrusel.js"></script>
    <script src="./js/keystroke.js"></script>
    <script src="./js/tel.js"></script>
</body>

</html>