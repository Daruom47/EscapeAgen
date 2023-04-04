<?php
session_start();
require_once '../class/Database.php';
require_once '../templates/admin_head.php';
require_once '../templates/admin_nav.php';
require_once '../class/UserInfo.php';


$userInfo = new UserInfo();
$users = $userInfo->getAllUsers();


?>
    <div class="adminMsg">
        <h1 class="textAnimation">ADMINISTRATION</h1>
        <h2>Utilisateurs</h2>
        <?php require_once "../templates/admin_liste_user.php";?>
        <?php require_once "../templates/admin_form_user.php";?>

    </div>

<?php
require_once '../templates/admin_foot_user.php';
?>