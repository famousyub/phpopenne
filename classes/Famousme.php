<?php
namespace classes;

class Famousme
{
    
    private $username ;
    private $email ;
    private static $scope;
    private $password ;
    
    private $islogin ;
    private $cuurentuser;
    
    private $urlme;
    
    
    
    
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
    public static function getScope()
    {
        return Famousme::$scope;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
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
    public function getCuurentuser()
    {
        return $this->cuurentuser;
    }

    /**
     * @return mixed
     */
    public function getUrlme()
    {
        return $this->urlme;
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
     * @param mixed $scope
     */
    public static function setScope($scope)
    {
        Famousme::$scope = $scope;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param mixed $islogin
     */
    public function setIslogin($islogin)
    {
        $this->islogin = $islogin;
    }

    /**
     * @param mixed $cuurentuser
     */
    public function setCuurentuser($cuurentuser)
    {
        $this->cuurentuser = $cuurentuser;
    }

    /**
     * @param mixed $urlme
     */
    public function setUrlme($urlme)
    {
        $this->urlme = $urlme;
    }

    function __construct(){
        
    }
    
    public static function  loginUser($url , $data){
        
        $r = array();
        $me= array();
        if(!empty($data)){
            $r["data"] = $data;
        }
        
        if(!empty($url)){
            $r["url"]=$url;
        }
        
        foreach($data as $key =>$value){
            
            if( $value instanceof  MeUser){
                $d = new MeUser();
                $d->setUsername($value["username"]);
                $me["username"]=$d->getUsername();
            }
            
        }
        
        self::$scope= $me["username"];
        
    }
    
    
    
    
    
}

