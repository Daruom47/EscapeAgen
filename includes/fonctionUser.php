<?php
function checkFieldsUser($post)
{
    $requiredFields = array("prenom", "mail");

    foreach ($requiredFields as $field) {
        if (empty(trim($post[$field]))) {
            return array("success" => false, "message" => "Le champ $field est obligatoire.");
        } elseif (isset($post[$field]) && !empty(trim($post[$field]))) {
        }
    }

    return array("success" => true);
}