<?php
session_start();
require_once '../../class/Database.php';
require_once '../../class/UserInfo.php';
require_once '../../class/UserInfoController.php';

$userController = new UserInfoController();


if (isset($_POST['submit'])) {
    $id = $_SESSION['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $telephone = $_POST['tel'];
    $mail = $_POST['mail'];

    $userController->updateProfile($id, $nom, $prenom, $adresse, $telephone, $mail);
}

$user = $userController->getUserById($_SESSION['id']);


?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/styles.css" />
    <link rel="stylesheet" href="../../css/nav.css">
    <link rel="stylesheet" href="../../css/profile.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="/images/favicon/favicon-32x32.png">
    <title>AGEN ESCAPE - PROFIL</title>
</head>
<body>
  <div class="container"><?php include_once '../../includes/navbar.php';?>
      <div class="slogan flex"></div>
      <div id="presentationEscape">
          <div class="flex">
              <div id="presentationAnimation">
                  <p class="presentationText"></p>
                  <div class="login-box">
                      <h1>Mon profil</h1>
                      <form method="POST" action="#">
                          <?php for ($i=0; $i < count($user); $i++) { ?>
                              <div class="user-box">
                                  <input type="text" id="nom" name="nom"
                                         value="<?php echo $user[$i]['nom'] ? $user[$i]['nom'] : ''; ?>">
                                  <label class="active">Nom</label>
                              </div>
                              <div class="user-box">
                                  <input type="text" id="prenom" name="prenom" required=""
                                         value="<?php echo $user[$i]['prenom'] ? $user[$i]['prenom'] : ''; ?>">
                                  <label class="active">Prenom</label>
                              </div>
                              <div class="user-box">
                                  <input type="text" id="adresse" name="adresse"
                                         value="<?php echo $user[$i]['adresse'] ? $user[$i]['adresse'] : ''; ?>">
                                  <label class="active">Adresse</label>
                              </div>
                              <div class="user-box">
                                  <input type="tel" id="tel" name="tel"
                                         value="<?php echo $user[$i]['telephone'] ? $user[$i]['telephone'] : ''; ?>">
                                  <label class="active">Téléphone</label>
                              </div>
                              <div class="user-box">
                                  <input type="email" id="mail" name="mail" required=""
                                         value="<?php echo $user[$i]['mail'] ? $user[$i]['mail'] : ''; ?>">
                                  <label class="active">Email</label>
                              </div>
                              <button class="btn" type="submit" name="submit">
                                  Enregistrer
                              </button>
                          <?php } ?>
                      </form>
                      <a href="../../accueil">Retour</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</body>
</html>