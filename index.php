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
        <div class ="listefiltre">
        <div class="filtre">
        <p>Recherche par Difficultée </p>
          <form action="<?= $_SERVER["PHP_SELF"]?>" method = "post">
            <select id="difficulty" name="difficulty" title="Difficulté" required>
              <option value="">Sélectionnez une difficulté</option>
              <?php
                $options = DIFFICULTY;
                foreach ($options as $key => $value) {
                  if ($value != 0)
                  echo '<option value="' . $key . '">' . $value . '</option>';
                }
              ?>
            </select>
            <input type="submit" name="confirmerdifficulte" value="Confirmer"/>
          </form>
        </div>
        <div class="filtre">
        <p>Recherche par nombre de joueurs </p>
          <form action="<?= $_SERVER["PHP_SELF"]?>" method = "post">
            <input type="number" name="min_players" min="1" max="9" value="1" />
            <h3><</h3>
            <input type="number" name="max_players" min="2" max="10" value="10" />
            <input type="submit" name="confirmernumberplayers" value="Confirmer"/>
          </form>
        </div>
      </div>
      <div id="carrusel" class="slider">
        <div id="carrusel-slides" class="slides"> 
          <?php 
            // $s = new Scenario();
            // foreach ($s->getListByDifficulty($onlyDisplayEnabled = true,$_POST['difficulty']) as $resultat) :
            $s = new Scenario();
            foreach ($s->getList($onlyDisplayEnabled = true) as $resultat):
              if (isset($_POST['confirmerdifficulte'])){
                if ($resultat['difficulty'] == $_POST['difficulty']){
                  include('includes/listescenar.php');
              }
            } elseif (isset($_POST['confirmernumberplayers'])){
              if ($resultat['min_players'] >= $_POST['min_players'] && $resultat['max_players'] <= $_POST['max_players']){
                include('includes/listescenar.php');
              }
            } else 
            include('includes/listescenar.php');
            endforeach; ?> </div>
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
    <script src="./js/filtre_scenario.js"></script>
</body>
</html>