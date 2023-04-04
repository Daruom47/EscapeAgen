<?php
include_once '../includes/config.php';
class Database
{
    public function connect() {
        try {
            $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return NULL;
        }
    }
}