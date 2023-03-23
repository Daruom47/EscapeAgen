<?php

class LoginController extends Login
{
    private $email;
    private $password;

    public function __constructController( $email, $password)
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

        $this->getUser($this->password, $this->email);
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