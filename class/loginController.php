<?php
session_start();
class LoginController extends Login
{
    private $email;
    private $password;

    public function __construct( $email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function loginUser()
    {
        if ($this->emptyInput() == false) {
            header('location: ../index.php?error=emptyinput');
            exit();
        }
        $user = $this->getUser($this->email, $this->password);

        $_SESSION['id'] = $user['id'];
        $_SESSION['prenom'] = $user['prenom'];
        $_SESSION['role'] = $user['role'];

        $page = ($_SESSION['role'] == 'admin'? './../admin/scenarios.php' : './../index.php');
        header('location: ' . $page) ;
        exit;
    }

    private function emptyInput()
    {
        $result = false;
        if (empty($this->email) || empty($this->password))
        {
            $result = false;

        }
        else
        {

            $result = true;
        }
        return $result;
    }
}