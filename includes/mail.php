<?php
    $champs = ['name','email','message'];
    $error = false;
    foreach($champs as $champ) {
        if(!isset($_POST[$champ])) {
            $error = true;
            break;
        }
    };
    // die($error);
    if ($error)
        die(false);


        $expediteur_nom = "AGEN-ESCAPE"; 
        $expediteur_email = "www-data@vps.stevenbarbe.fr"; 
        
        $destinataire = trim($_POST['email']); 
        $sujet = "[Agen-Escape] Votre message a bien été recu"; 
        $message = "Bonjour ".$_POST['name'].",\n\nnous avons bien reçu votre message, vous recevrez une réponse sous peu";
        
        $header = "From: ".$expediteur_nom." <".$expediteur_email.">\r\n";
        $header .= "Disposition-Notification-To:mail@stevenbarbe.fr";
        
        die(mail($destinataire, $sujet, $message, $header)); 
        
    
?>