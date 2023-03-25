<?php

class SignupController extends Signup
{
    private $name;
    private $email;
    private $password;
    private $passwordRepeat;

    public function __construct($name, $email, $password, $passwordRepeat)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->passwordRepeat = $passwordRepeat;
    }
    public function signupUser()
    {
          if($this->emptyInput() == false)
          {
              header('location: ../index.php?error=emptyinput');
              exit();
          }
          if($this->invalidName() == false)
          {
              header('location: ../index.php?error=username');
              exit();
          }
          if($this->invalidEmail() == false)
          {
              header('location: ../index.php?error=email');
              exit();
          }
          if($this->passwordMatch() == false)
          {
              header('location: ../index.php?error=passwordmatch');
              exit();
          }
          if($this->userIdTakenCheck() == false)
          {
              header('location: ../index.php?error=useroremailtaken');
              exit();
          }

        $this->setUser($this->name, $this->password, $this->email);
    }
    private function emptyInput()
    {

        $result = false;
        if(empty($this->name) || empty($this->email)
            || empty($this->password) || empty($this->passwordRepeat))
        {
            $result = false;

        }
        else{

            $result = true;
        }
        return $result;
    }
    private function invalidName(){
        $result = false;
        if(!preg_match('/^[a-zA-Z0-9]*$/', $this->name))
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }
    private function invalidEmail(){
        $result = false;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL))
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }
    private function passwordMatch(){
        $result = false;
        if($this->password !== $this->passwordRepeat)
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }

    private function userIdTakenCheck(){
        $result = false;
        if(!$this->checkUser($this->email))
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