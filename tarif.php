<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Recursive' rel='stylesheet'>

    <link rel="stylesheet" href="./css/overlay.css" />
    <link rel="stylesheet" href="./css/tarif.css">
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/styles.css" />

    <link rel="icon" type="image/png" href="./images/favicon/favicon-32x32.png" />

    <title>AGEN ESCAPE - TARIFS/HORAIRES</title>
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
      <div id="sectionTarifs">
        <div id="tarif-title">
            <h2>NOS TARIFS</h2>
            <h4>Plus vous venez nombreux, plus c'est avanageux !</h4>
        </div>

        <div id="tarif-container">
            <div class="colPlayer">
                <h3>Nombre <br> joueurs</h3>
                
                <div class="divPlayer"><span id="span1">Étudiant</span></div>
                <div class="divPlayer"><span id="span2">3 joueurs et +</span></div>
                <div class="divPlayer"><span id="span3">2 joueurs</span></div>
            </div>
            <div class="colHeureCreuse">
                <h3>Heures<br> creuses</h3> 
                                    
                <div class="divHeureCreuse"><span id="span4"><b>14 €</b> / joueur</span></div>
                <div class="divHeureCreuse"><span id="span5"><b>19 €</b> / joueur</span></div>
                <div class="divHeureCreuse"><span id="span6"><b>29,50 €</b> / joueur</span></div>
            </div>
            <div class="colHeurePleine">
                <h3>Heures<br> pleines</h3>
                
                <div class="divHeurePleine"><span id="span7"><b>23 €</b> / joueur</span></div>
                <div class="divHeurePleine"><span id="span8"><b>23 €</b> / joueur</span></div>
                <div class="divHeurePleine"><span id="span9"><b>35,50 €</b> / joueur</span></div>
            </div>
        </div>

        <div id="tarif-description">
          <p>Heures creuses : <strong>Du lundi au vendredi jusqu'à 18h</strong> 
              <br>
          Heures pleines : <strong>En semaine à partir de 18h et le week-end + jours fériés</strong>
          <br>
          Tarif étudiant : <strong>16 euros par joueur  en heures creuses (pour un groupe de 3 minimum et sur présentation de la carte)</strong>
          <br>
          <br>
              
          <strong>Nous acceptons les moyens de paiements suivants : Carte Bancaire, Espèces, Chèques ANCV, Chèque Bancaire, Pass Culture.</strong></p>

        </div>
        <div id="div-button">
            <a href="reservation.php"><button id="scenario-button">Réserver</button></a>
        </div>
    </div>

    <div id="sectionHoraires">
        <div>
            <h2>NOS HORAIRES</h2>
        </div>
        <div id="div-tab-horaires">
            <div id="div-jours">
                <h4>Jour</h4>
                <div id="jours">
                    <p>Lundi</p>
                    <hr>
                    <p>Mardi</p>
                    <hr>
                    <p>Mercredi</p>
                    <hr>
                    <p>Jeudi</p>
                    <hr>
                    <p>Vendredi</p>
                    <hr>
                    <p>Samedi</p>
                    <hr>
                    <p>Dimanche</p>
                    <hr>
                </div>
            </div>
            <div id="div-horaires">

                    <h4>Horaires</h4>
                
                <div id="horaires">
                    <p>10 h - 21 h 00</p>
                    <hr>
                    <p>10 h - 21 h 00</p>
                    <hr>
                    <p>10 h - 21 h 00</p>
                    <hr>
                    <p>10 h - 21 h 00</p>
                    <hr>
                    <p>10 h - 21 h 00</p>
                    <hr>
                    <p>10 h - 21 h 00</p>
                    <hr>
                    <p>10 h - 21 h 00</p>
                    <hr>
                </div>
            </div>
        </div>
    </div>


    <?php include_once __DIR__. '/includes/footer.php';?> 
    </div>
    <!-- <script src="./js/nav.js"></script> -->
    <script src="./js/formulaire.js"></script>
</body>
</html>