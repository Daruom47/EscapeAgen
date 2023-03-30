<?php
require_once   "../includes/config.php";
require_once   "../includes/fonctions.php";
require_once   "../class/scenario.class.php";
require_once '../templates/admin_head.php';
require_once '../templates/admin_nav.php'; 
$scenario = new Scenario();
?>
    <div class="adminMsg">
        <h1 class="textAnimation">ADMINISTRATION</h1>
        <h2>SCENARIOS</h2>
        
        <?php require_once "../templates/admin_liste_scenarios.php";?>    
        <?php require_once "../templates/admin_form_scenario.php";?>
    </div>

</div>


<?php
require_once '../templates/admin_foot.php'; 
?>