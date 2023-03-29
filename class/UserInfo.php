<?php

class UserInfo extends Database
{
    public function getUserById($id) {
        $stmt = $this->connect()->prepare('SELECT * FROM user WHERE id = ?;');
        if(!$stmt->execute(array($id)))
        {
            $stmt = null;
            header( 'Location: ../template/profileView/profile.php?error=stmtfailed');
            exit();
        }
        if($stmt->rowCount() == 0)
        {
            $stmt = null;
            header('location: ../template/profileView/profile.php?error=profilenotfound');
            exit();
        }
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $user;
    }

    public function updateUser($id, $nom, $prenom, $adresse, $telephone, $mail) {
        $stmt = $this->connect()->prepare('UPDATE user SET nom = ?, prenom = ?, adresse = ?,
        telephone = ?, mail = ? WHERE id = ?;');
        if(!$stmt->execute(array($nom, $prenom, $adresse, $telephone, $mail, $id)))
        {
            $stmt = null;
            header( 'Location: ../template/profileView/profile.php?error=stmtfailed');
            exit();
        }
        $stmt = null;
    }
}