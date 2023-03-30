<?php
require_once '../../includes/config.php';
require_once "../../includes/fonctions.php";
$bd = connect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/signup.css" />
    <link href='https://fonts.googleapis.com/css?family=Recursive' rel='stylesheet'>
    <link rel="icon" type="image/png" href="../../images/favicon/favicon-32x32.png" />
    <title>AGEN ESCAPE - LOGIN</title>
</head>
<body>
<img src="../images/backgrounds/4.png" class="blur">
<div class="login-box">
    <h1>Sign Up</h1>
    <form method="POST" action="/includes/signup.inc.php">
        <div class="user-box">
            <input type="text" name="name" id="name" required="">
            <label>Prénom</label>
        </div>
        <div class="user-box">
            <input type="email" name="email" id="email" required="">
            <label>Email</label>
        </div>
        <div class="user-box">
            <input type="password" name="password" id="password" required="">
            <label>Mot de passe</label>
        </div>
        <div class="user-box">
            <input type="password" name="passwordRepeat" id="passwordRepeat" required="">
            <label>Répetez votre mot de passe</label>
        </div>
        <button class="btn" type="submit" name="submit">
            S'inscrire
        </button>
    </form>
    <a href="../../index.php">Retour</a>
</div>
</body>
