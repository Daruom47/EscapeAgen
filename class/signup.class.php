<?php
include 'database.php';
class Signup extends Database
{

    protected function setUser($name,$password, $email)
    {
        $stmt = $this->connect()->prepare('INSERT INTO user (nom, mdp, mail) VALUES (?,?,?);');

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
}