<?php
include 'dbh.php';
class Signup extends Dbh
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
    protected function checkUser($name, $email)
    {
        $stmt = $this->connect()->prepare('SELECT nom FROM user WHERE nom = ? OR mail = ?;');

        if(!$stmt->execute(array($name,$email))){
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