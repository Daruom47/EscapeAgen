<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/css/styles.css" />
    <link rel="stylesheet" href="/css/nav.css">
    <link rel="stylesheet" href="/css/profile.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="/images/favicon/favicon-32x32.png">
    <title>AGEN ESCAPE - PROFIL</title>
</head>
<body>
  <div class="container"><?php include_once '../../includes/navbar.php';?>
      <div class="slogan flex"></div>
      <div id="presentationEscape">
          <div class="flex">
              <div id="presentationAnimation">
                  <p class="presentationText"></p>
                  <div class="login-box">
                      <h1>Profil</h1>
                      <form method="POST" action="#">
                          <div class="user-box">
                              <input type="text" id="nom" name="nom" required="">
                              <label>Nom</label>
                          </div>
                          <div class="user-box">
                              <input type="text" id="prenom" name="prenom" required="">
                              <label>Prénom</label>
                          </div>
                          <div class="user-box">
                              <input type="text" id="adresse" name="adresse" required="">
                              <label>Adresse</label>
                          </div>
                          <div class="user-box">
                              <input type="email" id="mail" name="mail" required="">
                              <label>Email</label>
                          </div>
                          <button class="btn" type="submit" name="submit">
                              Enregistrer
                          </button>
                      </form>
                      <a href="./accueil">Retour</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</body>
</html>