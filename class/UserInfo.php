<?php

class UserInfo extends Database
{
    public function getUserById($id) {
        $stmt = $this->connect()->prepare('SELECT * FROM user WHERE id = ?;');
        if(!$stmt->execute(array($id)))
        {
            $stmt = null;
            header( 'Location: profile.php?error=stmtfailed');
            exit();
        }
        if($stmt->rowCount() == 0)
        {
            $stmt = null;
            header('location: profile.php?error=profilenotfound');
            exit();
        }
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $user;
    }

    public function updateUser($id, $nom, $prenom, $adresse, $telephone, $mail) {

        $nom = htmlspecialchars(trim($nom), ENT_QUOTES, 'UTF-8');
        $prenom = htmlspecialchars(trim($prenom), ENT_QUOTES, 'UTF-8');
        $adresse = htmlspecialchars(trim($adresse), ENT_QUOTES, 'UTF-8');
        $telephone = htmlspecialchars(trim($telephone), ENT_QUOTES, 'UTF-8');
        $mail = htmlspecialchars(trim($mail), ENT_QUOTES, 'UTF-8');

        if (empty($prenom) || empty($mail)) {
            header('Location: profile.php?error=emptyfields');
            exit();
        } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            header('Location: profile.php?error=invalidmail');
            exit();
        } elseif (!preg_match("/^[0-9]*$/", $telephone)) {
            header('Location: profile.php?error=invalidtelephone');
            exit();
        }

        $stmt = $this->connect()->prepare('UPDATE user SET nom = :nom, prenom = :prenom, adresse = :adresse,
        telephone = :telephone, mail = :mail WHERE id = :id;');

        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':adresse', $adresse);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':mail', $mail);
        $stmt->bindParam(':id', $id);


        if(!$stmt->execute())
        {
            $stmt = null;
            header( 'Location: ../template/profileView/profile.php?error=stmtfailed');
            exit();
        }
        $stmt = null;
    }
}