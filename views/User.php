<?php 


class User   {
    
    private $username ;
    private $email ;
    private  $gender ;
    private $islogin ;
    private $user_id;
    private $avatar ;
    
    static $usermod ;
    
    /**
     * @return mixed
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param mixed $avatar
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return mixed
     */
    public function getIslogin()
    {
        return $this->islogin;
    }

    /**
     * @return mixed
     */
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public static function getUsermod()
    {
        return User::$usermod;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @param mixed $islogin
     */
    public function setIslogin($islogin)
    {
        $this->islogin = $islogin;
    }

    /**
     * @param mixed $user_id
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @param mixed $usermod
     */
    public static function setUsermod($usermod)
    {
        User::$usermod = $usermod;
    }

    function __construct() {
        
    }
    
    
    
    
}
?>