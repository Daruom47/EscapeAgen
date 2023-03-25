<div class="container_nav">
        <div id="div_nav" style="border-radius: 20px;">
          <div id="div-ul">
            <ul id="links_menu">
            <li><a href="./accueil#scenariosList">SCENARIOS</a></li>
            <li><a href="./tarifs">TARIFS</a></li>
            <li><a href="./reserver">RESERVER</a></li>
            <li><a href="./accueil#nousTrouver">NOUS TROUVER</a></li>
          </ul>
          </div>
            <div class="icons">
              <ul id="links_menu">
                  <?php
                  if(isset($_SESSION['nom']))
                  {
                  ?>
                  <li><a href="#"><?php echo $_SESSION['nom']; ?></a></li>
                  <li><a href="/includes/logout.inc.php">SE DECONNECTER</a></li>
                  <?php
                  }
                  else
                  {
                  ?>
                  <li><a href="../template/loginView/login.php">SE CONNECTER</a></li>
                  <li><a href="../template/signUpView/signup.php">S'INSCRIRE</a></li>
                  <?php
                  }
                  ?>
              </ul>
          </div>
        </div>
        <div id="logo">
          <img src="./images/logo.png" alt="img_logo">
        </div>
        <img src="./images/menu-btn1.png" alt="menu_hamburger" class="menu_hamburger">
      </div>