<?php
require_once '../../includes/config.php';
require_once "../../includes/fonctions.php";
$bd = connect();

/*$erreur = "";

if(isset($_POST['submit'])){
    if(!empty($_POST['email']) && !empty($_POST['password'])){
        $email = htmlspecialchars($_POST["email"]);
        $password = $_POST['password'];

        $recupUser = $bd->prepare('SELECT * FROM user WHERE email = ? AND password = ?');
        $recupUser->execute(array($email, $password));

        if($recupUser->rowCount()> 0){
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['id_user'] = $recupUser->fetch()['id_user'];
            header('Location: index.php');
            exit;
        }else{
            $erreur = true;
        }
    }else{
        echo"Veuillez compléter tous les champs";
    }
}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/login.css" />
    <link href='https://fonts.googleapis.com/css?family=Recursive' rel='stylesheet'>
    <link rel="icon" type="image/png" href="./images/favicon/favicon-32x32.png" />
    <title>AGEN ESCAPE - LOGIN</title>
</head>
<body>
<img src="./images/backgrounds/4.png" class="blur">
<div class="login-box">
    <h2>Login</h2>
    <form method="POST" action="login.php">
        <div class="user-box">
            <input type="email" name="email" required="">
            <label>Email</label>
        </div>
        <div class="user-box">
            <input type="password" name="password" required="">
            <label>Mot de passe</label>
        </div>
        <button class="btn" type="submit" name="submit">
            Se connecter
        </button>
    </form>
    <a href="./accueil">Retour</a>
</div>
</body>