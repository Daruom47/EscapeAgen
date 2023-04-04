<?php
include 'Database.php';

class Login extends Database
{
    public function getUser($email, $password)
    {
        $stmt = $this->connect()->prepare('SELECT mdp FROM user WHERE mail = ? LIMIT 1;');

        if (!$stmt->execute(array($email))) {
            $stmt = null;
            header('location : ../template/loginView/login.php?error=stmtfailed');
            exit();
        }
        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header('location: ../template/loginView/login.php?error=invalidCredentials');
            exit();
        }

        $passwordHashed = $stmt->fetch(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password, $passwordHashed['mdp']);

        if (!$checkPassword) {
            $stmt = null;
            header('location: ../template/loginView/login.php?error=invalidCredentials');
            exit();
        }


        $stmt = $this->connect()->prepare('SELECT id, prenom FROM user WHERE mail = ? LIMIT 1;');

        if (!$stmt->execute(array($email))) {
            $stmt = null;
            header('location : ../template/loginView/login.php?error=stmtfailed');
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header('location: ../template/loginView/login.php?error=invalidCredentials');
            exit();
        }

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user;
    }


}