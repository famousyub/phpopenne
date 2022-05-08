<?php
namespace classes;

class UserLogin
{
    
    
    /**
     * @return mixed
     */
    public function getUsernameOrEmail()
    {
        return $this->usernameOrEmail;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $usernameOrEmail
     */
    public function setUsernameOrEmail($usernameOrEmail)
    {
        $this->usernameOrEmail = $usernameOrEmail;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    function __construct() {
        
    }
    
    private $usernameOrEmail ;
    private $password ;
    
    
    
    
}

