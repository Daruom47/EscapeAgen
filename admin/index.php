<?php
    session_start();
    if (!isset($_SESSION['role']) || $_SESSION['role'] != "admin")
    {
        header("Location: ../template/loginView/login.php");
        exit;
    }
    else
        header("Location: ./scenarios.php");
?>