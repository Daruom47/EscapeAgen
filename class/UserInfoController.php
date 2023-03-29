<?php

class UserInfoController extends UserInfo {
    public function showProfile($id) {
        $userModel = new UserInfo();
        $user = $userModel->getUserById($id);
        require_once '../template/profileView/profile.php';
    }

    public function updateProfile($id, $nom, $prenom, $adresse, $telephone, $mail) {
        $userModel = new UserInfo();

        if (empty($prenom) || empty($mail)) {
            $error = "Le champ prenom ou mail ne peut pas être vide";
            require_once '../template/profileView/profile.php';
            return;
        }

        $result = $userModel->updateUser($id, $nom, $prenom, $adresse, $telephone, $mail);

        if ($result) {
            $success = "Profil mis à jour avec succès";
        } else {
            $error = "Erreur lors de la mise à jour du profil";
        }
        $user = $userModel->getUserById($id);
        require_once '../../template/profileView/profile.php';
    }
}
?>
