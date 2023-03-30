<?php

class UserInfoController extends UserInfo {
    public function showProfile($id) {
        $userInfo = new UserInfo();
        $user = $userInfo->getUserById($id);
        require_once '../template/profileView/profile.php';
    }

    public function updateProfile($id, $nom, $prenom, $adresse, $telephone, $mail) {
        $userInfo = new UserInfo();

        if (empty($prenom) || empty($mail)) {
            $error = "Le champ prenom ou mail ne peut pas être vide";
            require_once '../template/profileView/profile.php';
            return;
        }

        $result = $userInfo->updateUser($id, $nom, $prenom, $adresse, $telephone, $mail);

        if ($result) {
            $success = "Profil mis à jour avec succès";
        } else {
            $error = "Erreur lors de la mise à jour du profil";
        }
        $user = $userInfo->getUserById($id);
        require_once '../../template/profileView/profile.php';
    }
}
?>
