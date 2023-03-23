<?php

if(isset($_POST['submit'])){

    //Grabbing the data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['passwordRepeat'];

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