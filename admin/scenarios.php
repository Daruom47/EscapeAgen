<!-- hash("sha256", rtrim($_POST["password"])) -->
<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
require_once   "../includes/config.php";
require_once   "../includes/fonctions.php";
require_once   "../class/scenario.class.php";

$scenario = new Scenario(); 
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/overlay.css" />
    <link rel="stylesheet" href="../css/styles.css" />
    <link rel="stylesheet" href="../css/admin.css" />
    <link rel="stylesheet" href="../css/footer.css" />
    <link rel="stylesheet" href="../css/nav.css">
    <link href='https://fonts.googleapis.com/css?family=Recursive' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="../images/favicon/favicon-32x32.png" />
    <title>AGEN ESCAPE - ADMINISTRATION</title>
</head>

<body>

    <div class="container">
        <div class="container_nav">
            <div id="div_nav" style="border-radius: 20px;">
                <div id="div-ul">
                    <ul id="links_menu">

                        <li><a href="#">SCENARIOS</a></li>
                        <li><a href="#">RESERVATIONS</a></li>
                        <li><a href="#">CLIENTS</a></li>
                    </ul>
                </div>
            </div>
            <div id="logo">
                <img src="../images/logo.png" alt="img_logo">
            </div>
            <img src="../images/menu-btn1.png" alt="menu_hamburger" class="menu_hamburger">
        </div>
        <div class="slogan flex"></div>

        <div class="adminMsg">
            <h1 class="textAnimation">ADMINISTRATION</h1>
            <h2>SCENARIOS</h2>



            <table class="darkTable">
                <thead>
                    <tr>
                        <th></th>
                        <th>NOM</th>

                        <th>GESTION</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td></td>
                        <td>NOM</td>
                        <td>GESTION</td>
                    </tr>
                </tfoot>
                <tbody>
                      <?php foreach ($scenario->getList() as $r) : ?>
                    <tr>
                        <td><img class="preview" src="<?= '.' . $r['image'] ?>"></td>
                        <td><?= $r['nom'] ?></td>
                        <td>Modifier - Supprimer</td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                </tr>
            </table>

        </div>

    </div>

</body>

</html>