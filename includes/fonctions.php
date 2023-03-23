<?php 
    function connect()
    {
      try {
        $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
      } catch (PDOException $e) {
        echo $e->getMessage();
        return NULL;
      }
    }
    function checkFields($post, $files)
    {
        $requiredFields = array("nom", "short_resume", "resume_complet", "difficulty", "min_players", "max_players", "time_mins", "display");
        
        foreach ($requiredFields as $field) {
            if (empty(trim($post[$field]))) {
                return array("success" => false, "message" => "Le champ $field est obligatoire.");
            }
        }
        
        $imageFileType = strtolower(pathinfo($files['image']['name'], PATHINFO_EXTENSION));
        $allowedExtensions = array("jpg", "jpeg", "png", "gif");
        $maxFileSize = 5 * 1024 * 1024;
    
        if (!in_array($imageFileType, $allowedExtensions)) {
            return array("success" => false, "message" => "Le format de l'image n'est pas autorisé (jpg, jpeg, png, gif).");
        }
    
        if ($files['image']['size'] > $maxFileSize) {
            return array("success" => false, "message" => "La taille de l'image dépasse la limite autorisée (5 Mo).");
        }
    
        return array("success" => true, "imageFileType" => $imageFileType);
    }
    
  
?>
