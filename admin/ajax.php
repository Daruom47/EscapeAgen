<?php
require_once  "../includes/config.php";
require_once  "../includes/fonctions.php";
require_once  "../class/scenario.class.php";
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($_GET['action']) {
        case 'add_scenario':
            $fieldsAreValid = checkFields($_POST, $_FILES);
            if (!$fieldsAreValid['success']) {
                echo json_encode($fieldsAreValid);
                die();
            }

            $uploadDir = "../images/upload/";
            $randomName = md5(uniqid(rand(), true)) . '.' . $fieldsAreValid['imageFileType'];
            $uploadFile = $uploadDir . $randomName;

            if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                $error = array("message" => "Erreur lors de la sauvegarde de l'image");
                echo json_encode($error);
                die();
            }

            $scenario = array(
                "nom" => $_POST["nom"],
                "image" => substr($uploadFile, 1),
                "short_resume" => $_POST["short_resume"],
                "resume_complet" => $_POST["resume_complet"],
                "difficulty" => $_POST["difficulty"],
                "min_players" => $_POST["min_players"],
                "max_players" => $_POST["max_players"],
                "time_mins" => $_POST["time_mins"],
                "display" => $_POST["display"]
            );

            $scenarioObject = new Scenario();

            try {
                $scenarioObject->add($scenario);
                $success = array("message" => "Scénario ajouté avec succès !");
                echo json_encode($success);
            } catch (PDOException $e) {
                $error = array("message" => "Erreur lors de l'ajout du scénario");
                echo json_encode($error);
            }
            break;

        case 'delete_scenario':
            $idToDelete = isset($_POST['id']) ? $_POST['id'] : null;
            if (!$idToDelete) {
                $error = array("message" => "Veuillez renseigner l'id du scénario à supprimer");
                echo json_encode($error);
                die();
            }

            $scenarioObject = new Scenario();

            try {
                $scenarioObject->delete($idToDelete);
                $success = array("message" => "Scénario supprimé avec succès !");
                echo json_encode($success);
            } catch (PDOException $e) {
                $error = array("message" => "Erreur lors de la suppression du scénario");
                echo json_encode($error);
            }
            break;

        case 'get_scenario':
            $id = $_POST['id'];
            $scenarioObject = new Scenario();

            try {
                $scenario = $scenarioObject->get($id);
                echo json_encode($scenario);
            } catch (PDOException $e) {
                $error = array("message" => "Erreur lors de la récupération du scénario");
                echo json_encode($error);
            }
            break;

        case 'update_scenario':

            $fieldsAreValid = checkFields($_POST, $_FILES);

            if (!$fieldsAreValid) {
                $error = array("message" => "Veuillez remplir tous les champs");
                echo json_encode($error);
                die();
            }

            $id = $_POST['id'];

            $scenarioObject = new Scenario();
            $scenarioToUpdate = $scenarioObject->get($id);

            if (!$scenarioToUpdate) {
                $error = array("message" => "Le scénario à modifier n'existe pas");
                echo json_encode($error);
                die();
            }

            if (!empty($_FILES['image']['name'])) {
                $imageFileType = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                $allowedExtensions = array("jpg", "jpeg", "png", "gif");
                $maxFileSize = 5 * 1024 * 1024;

                if (!in_array($imageFileType, $allowedExtensions)) {
                    $error = array("message" => "Le fichier doit être une image (JPG, JPEG, PNG, GIF)");
                    echo json_encode($error);
                    die();
                }

                if ($_FILES['image']['size'] > $maxFileSize) {
                    $error = array("message" => "Le fichier ne doit pas dépasser 5 Mo");
                    echo json_encode($error);
                    die();
                }

                $uploadDir = "../images/upload/";
                $randomName = md5(uniqid(rand(), true)) . '.' . $imageFileType;
                $uploadFile = $uploadDir . $randomName;

                if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                    $error = array("message" => "Erreur lors de la sauvegarde de l'image");
                    echo json_encode($error);
                    die();
                }

                if (isset($scenarioToUpdate['image']) && file_exists($scenarioToUpdate['image'])) {
                    unlink($scenarioToUpdate['image']);
                }

                $scenarioToUpdate['image'] = substr($uploadFile, 1);
            }


            $scenarioToUpdate['nom'] = $_POST["nom"];
            $scenarioToUpdate['short_resume'] = $_POST["short_resume"];
            $scenarioToUpdate['resume_complet'] = $_POST["resume_complet"];
            $scenarioToUpdate['difficulty'] = $_POST["difficulty"];
            $scenarioToUpdate['min_players'] = $_POST["min_players"];
            $scenarioToUpdate['max_players'] = $_POST["max_players"];
            $scenarioToUpdate['time_mins'] = $_POST["time_mins"];
            $scenarioToUpdate['display'] = $_POST["display"];

            try {
                $scenarioObject->update($scenarioToUpdate);
                $success = array("message" => "Scénario mis à jour avec succès !");
                echo json_encode($success);
            } catch (PDOException $e) {
                $error = array("message" => "Erreur lors de la mise à jour du scénario");
                echo json_encode($error);
            }
            break;
    }
}
