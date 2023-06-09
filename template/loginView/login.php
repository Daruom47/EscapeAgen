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
    <link rel="stylesheet" href="../../css/login.css" />
    <link href='https://fonts.googleapis.com/css?family=Recursive' rel='stylesheet'>
    <link rel="icon" type="image/png" href="./images/favicon/favicon-32x32.png" />
    <title>AGEN ESCAPE - LOGIN</title>
</head>
<body>
<img src="./images/backgrounds/4.png" class="blur">
<div class="login-box">
    <h1>Login</h1>
    <form method="POST" action="../../includes/login.inc.php">
        <div class="user-box">
            <input type="email" id="email" name="email" required="">
            <label>Email</label>
        </div>
        <div class="user-box">
            <input type="password" id="password" name="password" required="">
            <label>Mot de passe</label>
        </div>
        <button class="btn" type="submit" name="submit">
            Se connecter
        </button>
    </form>
    <a href="../../accueil">Retour</a>
</div>
</body>