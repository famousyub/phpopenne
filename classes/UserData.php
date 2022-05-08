<?php 

class UserData {
    
    
    function __construct($username , $email , $gender,$photo){
        
        $this->email = $email ;
        $this->username =$username ;
        $this->gender = $gender ;
        $this->photoprofiles = $photo;
        
    }
    
    
    private $username ;
    private $email ;
    private $gender ;
    private $photoprofiles;
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
    public function getPhotoprofiles()
    {
        return $this->photoprofiles;
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
     * @param mixed $photoprofiles
     */
    public function setPhotoprofiles($photoprofiles)
    {
        $this->photoprofiles = $photoprofiles;
    }

    
    
    
}

?>