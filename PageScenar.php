<?php
require_once __DIR__ . "/includes/config.php";
require_once __DIR__ . "/includes/fonctions.php";
require_once __DIR__ . "/class/scenario.class.php";

$scenario = new Scenario();
    $info = $scenario->get($_GET['scenario']);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/bodystyle.css" />
    <link rel="stylesheet" href="./css/overlay.css" />
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="./css/footer.css" />
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"> -->
    <link rel="icon" type="image/png" href="./images/favicon/favicon-32x32.png" />
    <title>AGEN ESCAPE</title>
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
      </div>
    <!-- BODY -->
    <div class="container0">
        <div class="storycontainer">
            <div class="storyimg"><img src="<?php echo $info['image'];?>"></div>
            <div class="storycontainer2">  
                <div class="storytitle"><?php echo $info['nom'];?></div>
                <div class="synopsis"><?php echo $info['resume_complet'];?></div>
                <div class="storycontainer3">
                    <div class="difficulte">Difficulté <?php echo DIFFICULTY[$info['difficulty']];?></div>
                    <div class="storycontainer4">
                        <div class="min"><?php echo $info['min_players'];?> joueurs minimum</div>
                        <div class="max"><?php echo $info['max_players'];?> joueurs maximum</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="scorebox">
            <div class="tableauscores">TABLEAU DES SCORES</div>
            <table class="leaderboard">
                <th >Classement</th>
                <th class ="lb">Logo</th>
                <th >Team</th>
                <th >Temps</th>
                <tr class ="lb1">
                    <td >1st</td>
                    <td><img src="./images/equipes/logoteam1.png"></td>
                    <td >Crewmate</td>
                    <td class="chrono">47" 23'</td>
                </tr>
                <tr class ="lb2">
                    <td >2nd</td>
                    <td ><img src="./images/equipes/logoteam2.png"></td>
                    <td >Crewmate</td>
                    <td class="chrono">47" 23'</td>
                </tr>
                <tr class ="lb3">
                    <td>3rd</td>
                    <td><img src="./images/equipes/logoteam3.png"></td>
                    <td>Scooby-dudes</td>
                    <td class="chrono">47" 23'</td>
                </tr>
                <tr class ="lb4">
                    <td>4th</td>
                    <td><img src="./images/equipes/logoteam4.png"></td>
                    <td>Crewmate</td>
                    <td class="chrono">47" 23'</td>
                </tr>
                <tr class ="lb5">
                    <td>5th</td>
                    <td><img src="./images/equipes/logoteam5.png"></td>
                    <td>Crewmate</td>
                    <td class="chrono">47" 23'</td>
                </tr>
                <tr class ="lb6">
                    <td>6th</td>
                    <td><img src="./images/equipes/logoteam6.png"></td>
                    <td>Crewmate</td>
                    <td class="chrono">47" 23'</td>
                </tr>
                <tr class ="lb7">
                    <td>7th</td>
                    <td><img src="./images/equipes/logoteam7.png"></td>
                    <td>Crewmate</td>
                    <td class="chrono">47" 23'</td>
                </tr>
                <tr class ="lb8">
                    <td>8th</td>
                    <td><img src="./images/equipes/logoteam8.png"></td>
                    <td>Crewmate</td>
                    <td class="chrono">47" 23'</td>
                </tr>
                <tr class ="lb9">
                    <td>9th</td>
                    <td><img src="./images/equipes/logoteam9.png"></td>
                    <td>Crewmate</td>
                    <td class="chrono">47" 23'</td>
                </tr>
                <tr class ="lb10">
                    <td>10th</td>
                    <td><img src="./images/equipes/logoteam10.png"></td>
                    <td>Crewmate</td>
                    <td class="chrono">47" 23'</td>
                </tr>
            </table>
        </div>
    </div>
    <!-- FOOTER -->
    <?php include_once __DIR__. '/includes/footer.php';?> 
      <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly" defer></script> -->
      <!-- <script src="./js/carrusel.js"></script> -->
      <!-- <script src="./js/nav.js"></script> -->
      <!-- <script src="./js/scenarios.js"></script> -->
      <script src="./js/bodyscript.js"></script>
      <!-- <script src="./js/keystroke.js"></script> -->
      <script src="./js/formulaire.js"></script>
 </body>
</html>