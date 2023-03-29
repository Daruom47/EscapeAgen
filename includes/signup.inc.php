<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{

    //Grabbing the data
    $name = htmlspecialchars($_POST["name"], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST["password"], ENT_QUOTES, 'UTF-8');
    $passwordRepeat = htmlspecialchars($_POST["passwordRepeat"], ENT_QUOTES, 'UTF-8');

    //Instantiate SignUpContr Class
    include '../includes/config.php';
    include '../class/signup.class.php';
    include '../class/signupController.class.php';
    $signup = new SignupController($name, $email, $password, $passwordRepeat);

    // Running error handlers and user signup

    $signup->signupUser();


    //Going back to front page
    header('location: ../index.php?error=none' );
}