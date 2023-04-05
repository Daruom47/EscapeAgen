<?php
include 'Database.php';
class Signup extends Database
{

    protected function setUser($name,$password, $email)
    {
        $stmt = $this->connect()->prepare('INSERT INTO user (prenom, mdp, mail) VALUES (?,?,?);');

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($name,$hashedPassword,$email))){
            $stmt = null;
            header("location ../index.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
    protected function checkUser( $email)
    {
        $stmt = $this->connect()->prepare('SELECT mail FROM user WHERE mail = ?;');

        if(!$stmt->execute(array($email))){
            $stmt = null;
            header("location ../index.php?error=stmtfailed");
            exit();
        }
        $resultCheck = false;
        if($stmt->rowCount()> 0){
            $resultCheck = false;

        }
        else {
            $resultCheck = true;
        }
        return $resultCheck;
    }

    protected function getUserId($name)
    {
        $stmt = $this->connect()->prepare('SELECT id FROM user WHERE nom = ?;');

        if($stmt->execute(array($name)))
        {
            $stmt = null;
            header( 'Location: ../template/profileView/profile.php?error=stmtfailed');
            exit();
        }
        if($stmt->rowCount() == 0)
        {
            $stmt = null;
            header('location: ../template/loginView/profile.php?error=profilenotfound');
            exit();
        }
        $profileData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $profileData;
    }
}