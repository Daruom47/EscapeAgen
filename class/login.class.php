<?php
require_once "../includes/config.php";
require_once "../includes/fonctions.php";
class Login
{
    protected function getUser($email, $password)
    {

        $stmt = $this->db->prepare('SELECT password FROM user WHERE email = ? OR passwprd = ?;');

        if(!$stmt->execute(array($email, $password)))
        {
            $stmt = null;
            header('location : ../index.php?error=stmtfailed');
            exit();
        }
        if($stmt->rowCount() == 0)
        {
            $stmt = null;
            header('location: ../index.php?error=usernotfound');
            exit();
        }
        $passwordHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password, $passwordHashed[0]['password']);
        if($checkPassword == false)
        {
            $stmt = null;
            header('location: ../index.php?error=wrongpassword');
            exit();
        }elseif ($checkPassword == true){

            $stmt = $this->db->prepare('SELECT password FROM user WHERE email = ? OR passwprd = ?;');

            if(!$stmt->execute(array($email, $password)))
            {
                $stmt = null;
                header('location : ../index.php?error=stmtfailed');
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION['id'] = $user[0]['id'];
            $_SESSION['email'] = $user[0]['email'];
        }

        $stmt = null;



    }

}