<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{

    //Grabbing the data
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST["password"], ENT_QUOTES, 'UTF-8');


    //Instantiate SignUpContr Class
    include '../includes/config.php';
    include '../class/login.class.php';
    include '../class/loginController.php';
    $login = new LoginController($email, $password);

    // Running error handlers and user signup

    $login->loginUser();


    //Going back to front page
    header('location: ../index.php?error=none' );
}