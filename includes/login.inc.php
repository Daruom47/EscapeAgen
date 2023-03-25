<?php

if(isset($_POST['submit'])){

    //Grabbing the data
    $email = $_POST['email'];
    $password = $_POST['password'];


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