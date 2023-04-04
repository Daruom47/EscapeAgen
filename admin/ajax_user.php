<?php
require_once '../class/Database.php';
require_once  "../class/UserInfo.php";
require_once  '../includes/fonctionUser.php';

header('Content-Type: application/json');
if (isset($_POST['action'])) {
    switch ($_POST['action']) {

        case 'delete_user':
            $idToDelete = isset($_POST['id']) ? $_POST['id'] : null;
            if (!$idToDelete) {
                $error = array("message" => "Veuillez renseigner l'id de l'utilisateur à supprimer");
                echo json_encode($error);
                die();
            }
            $userObject = new UserInfo();
            try {
                $userObject->deleteUser($idToDelete);
                $success = array("message" => "Utilisateur supprimé avec succès! 😄");
                echo json_encode($success);
            } catch (PDOException $e) {
                $error = array("message" => "Erreur lors de la suppression de l'utilisateur 😢");
                echo json_encode($error);
            }
            break;

        case 'get_user':
            $id = $_POST['id'];
            $userObject = new UserInfo();

            try {
                $user = $userObject->getUser($id);
                echo json_encode($user);
            } catch (PDOException $e) {
                $error = array("message" => "Erreur lors de la récupération de l'utilisateur 😢");
                echo json_encode($error);
            }
            break;

        case 'update_user':

            $fieldsAreValid = checkFieldsUser($_POST);

            if (!$fieldsAreValid) {
                $error = array("message" => "Veuillez remplir les champs 'prenom' et 'mail' 📝 ");
                echo json_encode($error);
                die();
            }

            $id = $_POST['id'];

            $userObject = new UserInfo();
            $userToUpdate = $userObject->getUser($id);
            // die(var_dump($_FILES));
            if (!$userToUpdate) {
                $error = array("message" => "L'utilisateur à modifier n'existe pas 🤔 ");
                echo json_encode($error);
                die();
            }

            $userToUpdate['nom'] = $_POST["nom"];
            $userToUpdate['prenom'] = $_POST["prenom"];
            $userToUpdate['adresse'] = $_POST["adresse"];
            $userToUpdate['telephone'] = $_POST["telephone"];
            $userToUpdate['mail'] = $_POST["mail"];
            $userToUpdate['role'] = $_POST["role"];

            try {
                $userObject->updateUserAdmin($userToUpdate);
                $success = array("message" => "Utilisateur mis à jour avec succès 😄 !");
                echo json_encode($success);
            } catch (PDOException $e) {
                $error = array("message" => "Erreur lors de la mise à jour de l'utilisateur 😢 ");
                echo json_encode($error);
            }
            break;
    }
    }else {
        $error = array("message" => "Le paramètre 'action' est manquant dans la requête POST.");
        echo json_encode($error);

}
